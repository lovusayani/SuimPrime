# SuimPrime Project Overview

## 📋 Project Summary

**SuimPrime** is a comprehensive **video streaming platform** built with **Laravel 12** (backend) and **Vue.js 3** (frontend). It's a full-featured movie/content management and streaming system with subscription plans, pay-per-view options, user authentication, and admin dashboard.

**Repository**: [SuimPrime](https://github.com/lovusayani/SuimPrime)
**Owner**: lovusayani
**Current Branch**: main
**Status**: Active Development

---

## 🏗️ Tech Stack

### Backend
- **Framework**: Laravel 12
- **Language**: PHP 8.2+
- **Database**: MySQL (primary), SQLite (testing)
- **ORM**: Eloquent
- **Authentication**: Laravel Sanctum (API tokens)
- **Package Manager**: Composer

### Frontend
- **Framework**: Vue.js 3
- **Build Tool**: Vite 7
- **CSS Framework**: Tailwind CSS 4 + Bootstrap 5.3
- **UI Components**: Bootstrap, Phosphor Icons
- **Router**: Vue Router 4
- **HTTP Client**: Axios
- **Carousels**: Slick Carousel, Vue Slick Carousel, Swiper

### Development Tools
- **Testing**: PHPUnit 11.5
- **Linting**: Laravel Pint
- **Code Quality**: Collision
- **Task Runner**: Concurrently

---

## 📁 Project Structure

```
suimprime.com/
├── app/
│   ├── Console/
│   │   └── Commands/                    # Artisan commands
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/                   # Admin panel controllers (16 files)
│   │   │   │   ├── MovieController.php
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── UserController.php
│   │   │   │   ├── PlanController.php
│   │   │   │   ├── GenreController.php
│   │   │   │   ├── ActorController.php
│   │   │   │   ├── DirectorController.php
│   │   │   │   ├── CouponController.php
│   │   │   │   ├── PayPerViewHistoryController.php
│   │   │   │   ├── TmdbController.php
│   │   │   │   ├── MediaController.php
│   │   │   │   ├── SettingsController.php
│   │   │   │   ├── ContentController.php
│   │   │   │   ├── PlanLimitationController.php
│   │   │   │   └── VastAdController.php
│   │   │   ├── Api/                     # API controllers for frontend (7 files)
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── MovieController.php
│   │   │   │   ├── PaymentController.php
│   │   │   │   ├── SettingsController.php
│   │   │   │   └── SubscriptionController.php
│   │   │   └── Controller.php            # Base controller
│   │   ├── Middleware/                  # Custom middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── IsAdmin.php
│   │   │   ├── CheckSubscription.php
│   │   │   ├── CustomCors.php
│   │   │   ├── EncryptCookies.php
│   │   │   └── VerifyCsrfToken.php
│   ├── Models/                          # Eloquent models (23 models)
│   │   ├── User.php
│   │   ├── Movie.php
│   │   ├── Actor.php
│   │   ├── Director.php
│   │   ├── Genre.php
│   │   ├── Plan.php
│   │   ├── Coupon.php
│   │   ├── UserSubscription.php
│   │   ├── MoviePayPerView.php
│   │   ├── PayPerViewHistory.php
│   │   ├── PaymentTransaction.php
│   │   ├── PaymentGateway.php
│   │   ├── Currency.php
│   │   ├── UserWatchlist.php
│   │   ├── UserViewingHistory.php
│   │   ├── MovieQuality.php
│   │   ├── MovieSubtitle.php
│   │   ├── MovieSeoSetting.php
│   │   ├── MoviePosterTv.php
│   │   ├── Media.php
│   │   ├── Setting.php
│   │   ├── Content.php
│   │   ├── TmdbData.php
│   │   └── VastAd.php
│   ├── Services/
│   │   └── Payment/
│   │       └── CashfreeService.php      # Payment gateway integration
│   └── Providers/
│       └── AppServiceProvider.php       # Service provider configuration
│
├── bootstrap/
│   ├── app.php                          # Application bootstrap
│   ├── providers.php                    # Service provider configuration
│   └── cache/                           # Cache files
│
├── config/                              # Configuration files
│   ├── app.php                          # App configuration
│   ├── auth.php                         # Authentication config
│   ├── cache.php                        # Cache configuration
│   ├── database.php                     # Database configuration
│   ├── filesystems.php                  # File storage configuration
│   ├── logging.php                      # Logging configuration
│   ├── mail.php                         # Mail configuration
│   ├── queue.php                        # Queue configuration
│   ├── sanctum.php                      # Sanctum configuration
│   ├── services.php                     # Third-party services
│   └── session.php                      # Session configuration
│
├── database/
│   ├── factories/
│   │   └── UserFactory.php              # Model factory for testing
│   ├── migrations/                      # Database migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2025_10_19_173921_create_personal_access_tokens_table.php
│   │   ├── 2025_10_22_133105_create_currencies_table.php
│   │   └── ... (more migrations)
│   └── seeders/                         # Database seeders
│
├── public/                              # Web-accessible directory
│   ├── index.php                        # Application entry point
│   ├── robots.txt
│   ├── assets/                          # Static assets
│   ├── build/                           # Compiled Vite assets
│   ├── storage/                         # Storage symlink
│   └── vendor/                          # Vendor assets
│
├── resources/
│   ├── css/                             # Stylesheets
│   │   ├── app.css
│   │   └── frontend.css
│   ├── js/
│   │   ├── app.js                       # Backend (admin) JS
│   │   ├── frontend/
│   │   │   └── app.js                   # Frontend (user) Vue entry
│   │   ├── utility.js
│   │   ├── backend.js
│   │   ├── media.js
│   │   ├── file_media.js
│   │   └── import-export.min.js
│   ├── lang/                            # Internationalization
│   │   ├── en/
│   │   │   └── auth.php
│   │   └── ar/
│   │       └── auth.php
│   └── views/                           # Blade templates
│       ├── layouts/
│       │   ├── admin.blade.php
│       │   └── partials/
│       │       ├── navbar.blade.php
│       │       ├── sidebar.blade.php
│       │       └── footer.blade.php
│       └── admin/
│           ├── movies/
│           │   ├── create.blade.php
│           │   ├── edit.blade.php
│           │   ├── index.blade.php
│           │   └── partials/
│           │       ├── general.blade.php
│           │       ├── video.blade.php
│           │       ├── quality.blade.php
│           │       ├── subtitles.blade.php
│           │       └── seo.blade.php
│           ├── genres/
│           ├── coupon/
│           ├── media-library/
│           ├── payperview/
│           ├── vastads/
│           ├── settings/
│           ├── dashboard.blade.php
│           └── login.blade.php
│
├── routes/
│   ├── web.php                          # Web routes (Blade views)
│   ├── api.php                          # API routes (JSON responses)
│   └── console.php                      # Artisan commands
│
├── storage/
│   ├── app/                             # File storage
│   ├── framework/                       # Framework cache & sessions
│   ├── logs/                            # Application logs
│   └── pail/                            # Pail logs
│
├── tests/
│   ├── Unit/                            # Unit tests
│   ├── Feature/                         # Feature tests
│   └── TestCase.php                     # Base test class
│
├── vendor/                              # Composer dependencies
├── node_modules/                        # NPM dependencies
│
├── .env                                 # Environment configuration (Production)
├── .env.example                         # Environment template
├── .envBAK                              # Backup environment file
├── .gitignore                           # Git ignore rules
├── .editorconfig                        # Editor configuration
├── .gitattributes                       # Git attributes
├── composer.json                        # PHP dependencies
├── composer.lock                        # Locked PHP dependencies
├── package.json                         # Node dependencies
├── package-lock.json                    # Locked Node dependencies
├── vite.config.js                       # Vite build configuration
├── phpunit.xml                          # PHPUnit configuration
├── artisan                              # Laravel CLI
│
└── MOVIE_FIELDS_UPDATE.md               # Pending movie fields update documentation
```

---

## 📊 Core Models & Database Schema

### User Management
- **User**: Main user model with authentication
- **UserSubscription**: Subscription relationships for users
- **UserWatchlist**: Users' saved movies
- **UserViewingHistory**: Users' viewing history

### Content Management
- **Movie**: Core movie/content model
- **MoviePayPerView**: Pay-per-view offerings
- **MovieQuality**: Video quality options
- **MovieSubtitle**: Subtitle files
- **MovieSeoSetting**: SEO metadata
- **MoviePosterTv**: Poster/thumbnail images
- **Media**: Uploaded media files
- **Content**: Generic content type

### Catalog
- **Genre**: Movie categories
- **Actor**: Actor information
- **Director**: Director information

### Subscription & Billing
- **Plan**: Subscription plans
- **PlanLimitation**: Plan feature limits
- **Coupon**: Discount codes
- **Currency**: Supported currencies
- **PaymentGateway**: Payment provider configuration
- **PaymentTransaction**: Transaction records
- **PayPerViewHistory**: Pay-per-view purchase history

### Additional
- **TmdbData**: TMDB integration
- **Setting**: Application settings
- **VastAd**: Video advertising

---

## 🚀 API Routes

### Authentication
- `POST /api/auth/register` - User registration
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout

### Content Discovery
- `GET /api/home` - Homepage data
- `GET /api/movies` - List movies
- `GET /api/movies/{id}` - Movie details

### Subscriptions
- `GET /api/subscriptions` - Available plans
- `POST /api/subscriptions/subscribe` - Subscribe to plan
- `GET /api/subscriptions/current` - Current subscription

### Payments
- `POST /api/payment/initiate` - Initiate payment
- `POST /api/payment/callback` - Payment callback

### Settings
- `GET /api/settings` - Application settings

---

## 🔐 Database Configuration

```properties
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laraveldb
DB_USERNAME=laraveldb
DB_PASSWORD=Password
```

**Testing Database**: SQLite (in-memory)

---

## 🛠️ Admin Controllers (16 controllers)

| Controller | Purpose |
|-----------|---------|
| MovieController | CRUD for movies, video management |
| AuthController | Admin login/authentication |
| DashboardController | Admin dashboard stats |
| UserController | User management |
| PlanController | Subscription plan management |
| GenreController | Genre management |
| ActorController | Actor management |
| DirectorController | Director management |
| CouponController | Coupon management |
| PayPerViewHistoryController | PPV transaction tracking |
| TmdbController | TMDB API integration |
| MediaController | Media library management |
| SettingsController | App settings management |
| ContentController | Generic content management |
| PlanLimitationController | Plan feature limits |
| VastAdController | Video ad management |

---

## 🎨 Frontend Features

### Vue.js 3 Application
- **Router**: Multi-page navigation with Vue Router
- **UI Components**: Bootstrap 5.3 + custom components
- **Icons**: Phosphor Icons
- **Carousels**: Slick, Vue Slick, Swiper
- **Date Picker**: Flatpickr
- **Select Dropdowns**: Select2
- **HTTP Client**: Axios

### Key Frontend Pages
- Home/Landing
- Movie Details
- Search & Filter
- Subscription Plans
- User Dashboard
- Watchlist
- Payment Checkout

---

## 📦 Key Dependencies

### Backend (Composer)
- `laravel/framework: ^12.0`
- `laravel/sanctum: ^4.2` (API authentication)
- `laravel/tinker: ^2.10.1` (REPL)
- `laravel/pail: ^1.2.2` (Log viewer)
- `laravel/pint: ^1.24` (Code style)

### Frontend (NPM)
- `vue: ^3.5.22`
- `vue-router: ^4.5.1`
- `@tailwindcss/vite: ^4.0.0`
- `bootstrap: ^5.3.8`
- `axios: ^1.12.2`
- `swiper: ^12.0.2`
- `vite: ^7.0.4`

---

## 🔄 Npm Scripts

```bash
npm run dev    # Start Vite dev server
npm run build  # Build production assets
```

---

## 🚀 Composer Scripts

```bash
composer setup      # Full project setup
composer dev        # Run all dev services concurrently
composer test       # Run PHPUnit tests
```

**Dev Script Details**:
Runs simultaneously:
- `php artisan serve` (Laravel server on :8000)
- `php artisan queue:listen` (Queue worker)
- `php artisan pail` (Real-time logs)
- `npm run dev` (Vite dev server)

---

## ⚙️ Configuration Files

### Environment (`.env`)
```properties
APP_NAME=SuimPrime
APP_ENV=local
APP_DEBUG=true
APP_URL=https://suimprime.com/
DB_CONNECTION=mysql
SESSION_DRIVER=cookie
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### Key Services
- **Session**: Cookie-based (not database)
- **Cache**: Database-backed
- **Queue**: Database-backed
- **Filesystem**: Local storage

---

## 📝 Pending Tasks

### MOVIE_FIELDS_UPDATE.md
Updates required to Movie model for new fields:
- `video_upload_type`
- `video_url`
- `video_file`
- `embed_code`
- `enable_quality`
- `enable_subtitle`
- `language`
- `content_rating`
- `duration`
- `release_date`
- `IMDb_rating`

**Files to update**:
1. `app/Models/Movie.php` - Update `$fillable`
2. `app/Http/Controllers/Admin/MovieController.php` - Update `create()` method
3. `resources/views/admin/movies/create.blade.php` - Add form fields

---

## 🔒 Security Features

- **CORS**: Custom CORS middleware
- **CSRF**: Token verification
- **Authentication**: Sanctum for API authentication
- **Encryption**: Cookie encryption
- **Validation**: Request validation in controllers

---

## 🧪 Testing

**Framework**: PHPUnit 11.5.3
**Config**: `phpunit.xml`
**Test Dirs**:
- `tests/Unit/` - Unit tests
- `tests/Feature/` - Feature/integration tests

**Database**: SQLite (in-memory) for tests

---

## 📊 Project Statistics

- **Total PHP Files**: 384+
- **Total JS Files**: 540+
- **Models**: 23
- **Controllers**: 23 (16 Admin + 7 API)
- **Middleware**: 6
- **Views**: 50+ Blade templates
- **API Routes**: 15+
- **Web Routes**: Multiple

---

## 🌐 Domain Configuration

**Production**: `https://suimprime.com/`
**Local**: `http://127.0.0.1:8000`
**Session Domain**: `.suimprime.com`

---

## 📚 Key Features Overview

✅ **User Management**
- Registration & Login
- Profile management
- Subscription tracking
- Watchlist
- Viewing history

✅ **Content Management**
- Movie CRUD
- Multi-quality video support
- Subtitle management
- SEO settings
- Movie metadata (actors, directors, genres)

✅ **Subscription System**
- Multiple subscription plans
- Plan limitations
- Coupon codes
- Currency support

✅ **Payment Integration**
- Cashfree payment gateway
- Transaction tracking
- Pay-per-view system

✅ **Admin Dashboard**
- Content management
- User management
- Plan management
- Analytics & statistics
- Settings configuration

✅ **Video Streaming**
- Multiple video hosting options (file upload, URL, embed)
- Quality selection
- Subtitle support
- Video advertisements (VAST)

---

## 🔗 Important Notes

1. **Frontend/Backend Split**: Separate Vue.js frontend and Blade admin views
2. **API-First Design**: REST API for all frontend operations
3. **Payment Integration**: Cashfree service configured for payments
4. **TMDB Integration**: Movie data import from TMDB
5. **Media Management**: Centralized media library system
6. **Multi-language Support**: English and Arabic translations available

---

## 📝 Files Generated: `PROJECT_OVERVIEW.md`

This comprehensive overview has been saved to your project root for future reference.
