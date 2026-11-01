#!/bin/sh
set -e

cd /var/www/html

# Initialize .env if missing
if [ ! -f .env ]; then
    echo "[Entrypoint] .env not found, copying from .env.example..."
    cp .env.example .env
fi

# Ensure environment variables from container override .env
if [ -n "$DB_CONNECTION" ]; then
    sed -i "s/^DB_CONNECTION=.*/DB_CONNECTION=$DB_CONNECTION/" .env 2>/dev/null || echo "DB_CONNECTION=$DB_CONNECTION" >> .env
fi
if [ -n "$DB_HOST" ]; then
    grep -q "^DB_HOST=" .env && sed -i "s/^DB_HOST=.*/DB_HOST=$DB_HOST/" .env || echo "DB_HOST=$DB_HOST" >> .env
fi
if [ -n "$DB_PORT" ]; then
    grep -q "^DB_PORT=" .env && sed -i "s/^DB_PORT=.*/DB_PORT=$DB_PORT/" .env || echo "DB_PORT=$DB_PORT" >> .env
fi
if [ -n "$DB_DATABASE" ]; then
    grep -q "^DB_DATABASE=" .env && sed -i "s/^DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" .env || echo "DB_DATABASE=$DB_DATABASE" >> .env
fi
if [ -n "$DB_USERNAME" ]; then
    grep -q "^DB_USERNAME=" .env && sed -i "s/^DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" .env || echo "DB_USERNAME=$DB_USERNAME" >> .env
fi
if [ -n "$DB_PASSWORD" ]; then
    grep -q "^DB_PASSWORD=" .env && sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" .env || echo "DB_PASSWORD=$DB_PASSWORD" >> .env
fi
if [ -n "$SESSION_DRIVER" ]; then
    grep -q "^SESSION_DRIVER=" .env && sed -i "s/^SESSION_DRIVER=.*/SESSION_DRIVER=$SESSION_DRIVER/" .env || echo "SESSION_DRIVER=$SESSION_DRIVER" >> .env
fi
if [ -n "$APP_URL" ]; then
    grep -q "^APP_URL=" .env && sed -i "s|^APP_URL=.*|APP_URL=$APP_URL|" .env || echo "APP_URL=$APP_URL" >> .env
fi

# Ensure storage directories exist with proper permissions
mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chmod -R 777 storage bootstrap/cache

# Generate APP_KEY if empty
if ! grep -q "^APP_KEY=base64:" .env && [ -z "$APP_KEY" ]; then
    echo "[Entrypoint] Generating application key..."
    php artisan key:generate --force
fi

# Handle MySQL/MariaDB connection wait
if [ "$DB_CONNECTION" = "mysql" ] && [ -n "$DB_HOST" ]; then
    echo "[Entrypoint] Waiting for database connection at $DB_HOST:${DB_PORT:-3306}..."
    MAX_TRIES=40
    TRIES=0
    until nc -z -w2 "$DB_HOST" "${DB_PORT:-3306}" || [ $TRIES -ge $MAX_TRIES ]; do
        TRIES=$((TRIES + 1))
        echo "[Entrypoint] Waiting for database ($TRIES/$MAX_TRIES)..."
        sleep 2
    done
    if [ $TRIES -ge $MAX_TRIES ]; then
        echo "[Entrypoint] ERROR: Timed out waiting for database."
        exit 1
    fi
    echo "[Entrypoint] Database is reachable!"
fi

# Handle SQLite if configured
if [ "$DB_CONNECTION" = "sqlite" ]; then
    mkdir -p database
    touch database/database.sqlite
fi

# Run migrations and seed data
echo "[Entrypoint] Running database migrations..."
php artisan migrate --force

echo "[Entrypoint] Checking seed status..."
# Run base seeders if no cities exist yet
VILLE_COUNT=$(php artisan tinker --execute="echo App\Models\Ville::count();" 2>/dev/null || echo "0")
if [ "$VILLE_COUNT" = "0" ] || [ -z "$VILLE_COUNT" ]; then
    echo "[Entrypoint] Seeding initial data (Cities, Buses, Routes)..."
    php artisan db:seed --force
fi

# Ensure Admin and Test users exist
ADMIN_COUNT=$(php artisan tinker --execute="echo App\Models\User::where('role', 'admin')->count();" 2>/dev/null || echo "0")
if [ "$ADMIN_COUNT" = "0" ] || [ -z "$ADMIN_COUNT" ]; then
    echo "[Entrypoint] Seeding admin user (admin@satasbus.ma)..."
    php artisan db:seed --class=AdminSeeder --force || true
fi

TEST_USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::where('email', 'test@test.com')->count();" 2>/dev/null || echo "0")
if [ "$TEST_USER_COUNT" = "0" ] || [ -z "$TEST_USER_COUNT" ]; then
    echo "[Entrypoint] Seeding test customer user (test@test.com)..."
    php artisan db:seed --class=TestDataSeeder --force || true
fi

# Clear and optimize caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "[Entrypoint] SATAS Bus platform ready. Starting application..."
exec "$@"
