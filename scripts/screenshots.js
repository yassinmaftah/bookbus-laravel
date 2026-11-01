/**
 * Automated Screenshot Generator for SATAS Bus Platform
 * Powered by Playwright
 *
 * Runs headless inside Docker container to capture high-resolution
 * evidence of all public, authenticated, and administrative flows.
 */

const { chromium } = require('playwright');
const path = require('path');
const fs = require('fs');

const BASE_URL = process.env.BASE_URL || 'http://localhost:8005';
const SCREENSHOTS_DIR = path.join(__dirname, '..', 'docs', 'screenshots');

if (!fs.existsSync(SCREENSHOTS_DIR)) {
  fs.mkdirSync(SCREENSHOTS_DIR, { recursive: true });
}

async function capture() {
  console.log(`Starting automated screenshot capture against ${BASE_URL}...`);
  const browser = await chromium.launch({
    headless: true,
    args: ['--no-sandbox', '--disable-setuid-sandbox']
  });

  const context = await browser.newContext({
    viewport: { width: 1440, height: 900 },
    deviceScaleFactor: 2
  });

  const page = await context.newPage();

  const saveShot = async (name) => {
    const filePath = path.join(SCREENSHOTS_DIR, name);
    await page.waitForTimeout(600);
    await page.screenshot({ path: filePath, fullPage: false });
    console.log(`[Captured] ${name}`);
  };

  try {
    // 1. Landing Page
    console.log('Visiting Home...');
    await page.goto(`${BASE_URL}/`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(1000);
    await saveShot('01-home.png');

    // 2. Search Results
    console.log('Testing Trip Search (Casablanca -> Rabat)...');
    await page.goto(`${BASE_URL}/?ville_depart=1&ville_arrivee=2`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(1000);
    await saveShot('02-search-results.png');

    // 3. Login Page
    console.log('Visiting Login...');
    await page.goto(`${BASE_URL}/login`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('03-login.png');

    // 4. Register Page
    console.log('Visiting Register...');
    await page.goto(`${BASE_URL}/register`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('04-register.png');

    // 5. Customer Login & User Flow
    console.log('Logging in as Customer (test@test.com)...');
    await page.goto(`${BASE_URL}/login`, { waitUntil: 'domcontentloaded' });
    await page.fill('input[name="email"]', 'test@test.com');
    await page.fill('input[name="password"]', 'password');
    await page.click('form button[type="submit"]');
    await page.waitForTimeout(1000);

    // User Dashboard
    console.log('Visiting Customer Dashboard...');
    await page.goto(`${BASE_URL}/dashboard`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(1000);
    await saveShot('07-user-dashboard.png');

    // User Profile
    console.log('Visiting Customer Profile...');
    await page.goto(`${BASE_URL}/profile`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('08-user-profile.png');

    // Booking Flow (Reservation checkout)
    console.log('Visiting Reservation Payment Checkout...');
    await page.goto(`${BASE_URL}/reservation/1?passengers=2`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(1000);
    await saveShot('05-booking-payment.png');

    // Submit payment simulation
    console.log('Simulating Payment Submission...');
    try {
      await page.fill('input[name="card_holder"]', 'Yassine Maftah');
      await page.fill('input[name="card_number"]', '4000123456789010');
      await page.fill('input[name="expiry_date"]', '2027-05');
      await page.fill('input[name="cvv"]', '123');
      await page.click('button:has-text("Payer")');
      await page.waitForTimeout(2000);
      await saveShot('06-booking-success.png');
    } catch (e) {
      console.warn('Payment note:', e.message);
    }

    // 6. Admin Authentication & Dashboard
    console.log('Logging in as Administrator (admin@satasbus.ma)...');
    await context.clearCookies();
    await page.goto(`${BASE_URL}/login`, { waitUntil: 'domcontentloaded' });
    await page.fill('input[name="email"]', 'admin@satasbus.ma');
    await page.fill('input[name="password"]', 'admin123');
    await page.click('form button[type="submit"]');
    await page.waitForTimeout(1000);

    // Admin Dashboard
    console.log('Visiting Admin Dashboard...');
    await page.goto(`${BASE_URL}/admin/dashboard`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(1000);
    await saveShot('09-admin-dashboard.png');

    // Admin Buses Management
    console.log('Visiting Admin Bus Fleet...');
    await page.goto(`${BASE_URL}/admin/buses`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('10-admin-buses.png');

    // Admin Routes Management
    console.log('Visiting Admin Routes...');
    await page.goto(`${BASE_URL}/admin/routes`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('11-admin-routes.png');

    // Admin Reservations Management
    console.log('Visiting Admin Reservations...');
    await page.goto(`${BASE_URL}/admin/reservations`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('12-admin-reservations.png');

    // 7. Public Content Pages
    console.log('Visiting FAQ...');
    await page.goto(`${BASE_URL}/faq`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('13-faq.png');

    console.log('Visiting About...');
    await page.goto(`${BASE_URL}/about`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('14-about.png');

    console.log('Visiting Contact...');
    await page.goto(`${BASE_URL}/contact`, { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(800);
    await saveShot('15-contact.png');

    console.log('✅ All screenshots captured successfully in docs/screenshots/');
  } catch (error) {
    console.error('Error during screenshot generation:', error);
  } finally {
    await browser.close();
  }
}

capture();
