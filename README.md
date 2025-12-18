# Gamikey

## Frontend assets

- Tailwind CSS (with the `@tailwindcss/forms` plugin) is precompiled to `public/css/app.css`. Alpine.js and Axios are loaded from CDNs in `resources/views/layouts/app.blade.php` and `resources/views/layouts/guest.blade.php`, so no Vite build is required at runtime.
- Admin and storefront assets continue to load from the existing `public/frontend` and `public/backend` bundles plus CDN helpers (Toastr, DataTables, SweetAlert2, etc.).

If you need to rebuild the Tailwind stylesheet locally after making design changes, install Node dependencies and run:

```bash
npm install
npm run build:css
```

## Requirements

- PHP 8.x with the extensions Laravel expects.
- Composer for PHP dependency installation.
- A configured database (see `.env.example` for connection keys). The sample `gamikey.sql` dump can be used to seed data.

## Local setup

1. Install PHP dependencies:
   ```bash
   composer install
   ```
2. Copy environment defaults and generate an app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure database credentials in `.env`, then migrate/import data as needed.

## Running the app

Serve the application with PHP:

```bash
php artisan serve
```

Static assets are already available in `public/`, so no Node/Vite watcher is needed.

## Testing

Run the Laravel test suite with:

```bash
php artisan test
```
