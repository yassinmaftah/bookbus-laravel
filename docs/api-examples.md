# SATAS Bus - API & Route Reference

This document provides a comprehensive reference of all routes, request payloads, response structures, and controller behaviors in the SATAS Bus application.

---

## 1. Public Routes

### 1.1 Home / Trip Search
- **Endpoint:** `GET /`
- **Controller:** `App\Http\Controllers\SearchController@searchIndex`
- **Description:** Renders the landing page and returns matching trips based on city filters.
- **Query Parameters:**
  | Parameter | Type | Required | Description | Example |
  |---|---|---|---|---|
  | `ville_depart` | integer | No | Departure City ID (`villes.id`) | `1` (Casablanca) |
  | `ville_arrivee` | integer | No | Arrival City ID (`villes.id`) | `2` (Rabat) |
  | `date_voyage` | date (Y-m-d) | No | Travel date | `2026-11-05` |

**Sample Request:**
```http
GET /?ville_depart=1&ville_arrivee=2&date_voyage=2026-11-05 HTTP/1.1
Host: localhost:8005
```

**Response Attributes Provided to View:**
- `villes`: Collection of all active cities in Morocco.
- `voyages`: Collection of matching `Programme` records with loaded `bus` and `route` relationships.
- `segment`: The active `Segment` between the departure and arrival stations containing distance, duration, and price.

---

### 1.2 Information Pages
| Method | Route | Description |
|---|---|---|
| `GET` | `/about` | Company background, fleet statistics, and quality standards |
| `GET` | `/faq` | Accordion FAQ covering bookings, baggage, cancellations |
| `GET` | `/contact` | Contact form & office locations |
| `POST` | `/contact` | Sends inquiries with name, email, subject, message |
| `GET` | `/terms` | Terms of service and ticket usage policies |
| `GET` | `/privacy` | Privacy policy and user data protection |

**Sample Contact Submission:**
```http
POST /contact HTTP/1.1
Content-Type: application/x-www-form-urlencoded

_token=csrf_token_here&name=Yassine+Maftah&email=yassine%40example.com&subject=Booking+Inquiry&message=Can+I+change+my+seat+after+booking%3F
```

---

## 2. Authentication Routes (`Laravel Breeze`)

| Method | Route | Name | Middleware | Description |
|---|---|---|---|---|
| `GET` | `/login` | `login` | `guest` | Displays login form |
| `POST` | `/login` | - | `guest` | Authenticates user sessions |
| `GET` | `/register` | `register` | `guest` | Displays registration form |
| `POST` | `/register` | - | `guest` | Registers new passenger accounts |
| `POST` | `/logout` | `logout` | `auth` | Invalidates session |

---

## 3. Passenger Reservation & Account Routes

All routes in this group require the `auth` middleware.

### 3.1 Customer Dashboard
- **Endpoint:** `GET /dashboard`
- **Controller:** `App\Http\Controllers\ReservationController@dashboard`
- **Description:** Lists authenticated user's reservations ordered by creation date descending.

**Sample Response View Data:**
```json
[
  {
    "id": 14,
    "user_id": 2,
    "programme_id": 48,
    "nombre_places": 2,
    "status": "payé",
    "date_reservation": "2026-11-01 12:00:00",
    "programme": {
      "id": 48,
      "jour_depart": "2026-11-05",
      "heure_depart": "08:30:00",
      "heure_arrivee": "11:30:00",
      "route": {
        "id": 12,
        "nom": "Casablanca - Marrakech"
      },
      "bus": {
        "id": 5,
        "matricule": "45892-A-15",
        "capacite": 50
      }
    }
  }
]
```

---

### 3.2 Payment Form
- **Endpoint:** `GET /reservation/{programme_id}?passengers={count}`
- **Controller:** `App\Http\Controllers\ReservationController@showPaymentForm`
- **Description:** Calculates trip cost based on segment pricing and passenger count.

---

### 3.3 Payment Processing (Simulation)
- **Endpoint:** `POST /reservation`
- **Controller:** `App\Http\Controllers\ReservationController@processPayment`
- **Form Data:**
  ```http
  POST /reservation HTTP/1.1
  Content-Type: application/x-www-form-urlencoded

  _token=csrf_token&programme_id=48&passengers=2&card_holder=John+Doe&card_number=4000123456789010&expiry_date=12%2F28&cvv=123
  ```
- **Validation Rules:**
  - `card_number`: Required, 16 numeric digits
  - `cvv`: Required, 3 numeric digits
  - `expiry_date`: Required
  - `card_holder`: Required string
  - Capacity check: Maximum 50 seats per bus (rejects with error if full)

---

### 3.4 PDF Ticket Download
- **Endpoint:** `GET /ticket/{id}/download`
- **Controller:** `App\Http\Controllers\ReservationController@downloadTicket`
- **Engine:** `barryvdh/laravel-dompdf`
- **Response Header:** `Content-Type: application/pdf`
- **Filename:** `ticket-satas-{id}.pdf`

---

### 3.5 Reservation Cancellation
- **Endpoint:** `DELETE /reservation/{id}/cancel`
- **Controller:** `App\Http\Controllers\ReservationController@cancel`
- **Behavior:** Updates status to `annulé` and triggers refund confirmation message.

---

## 4. Administration Routes (`auth` + `admin` Middleware)

Prefix: `/admin`

### 4.1 Admin Analytics Dashboard
- **Endpoint:** `GET /admin/dashboard`
- **Metrics Calculated:**
  - `total_reservations`: Total count of bookings across all trips
  - `today_reservations`: Bookings created today
  - `total_revenue`: Estimated gross revenue (`count * avg_rate`)
  - `total_buses`: Fleet inventory count
  - `recent_reservations`: Last 10 reservations with linked user and trip data

### 4.2 Fleet Management
- **Endpoint:** `GET /admin/buses`
- **Description:** Paginated view (20/page) of buses, license matricules, and assigned scheduled programmes count.

### 4.3 Network Routes Management
- **Endpoint:** `GET /admin/routes`
- **Description:** Paginated view (20/page) of transit corridors, station hops, segments, distance, and base tariffs.

### 4.4 Global Bookings Management
- **Endpoint:** `GET /admin/reservations`
- **Description:** Paginated overview of all passenger bookings with passenger details and real-time status.
