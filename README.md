# Attariya Hospital — Laravel 12 + Filament 4 integration

**Status:** Development integration package, **not yet production-certified**.

This ZIP is a **source overlay**, not an installed Laravel release. It intentionally does not include `vendor/`, `.env`, credentials, or a pre-created administrator. A fresh Laravel 12 skeleton and Composer dependency installation are required.

## What is implemented

- Existing premium branding, assets, HTML markup and main JavaScript retained
- 37 original page templates converted into Blade views; principal public routes are defined
- MySQL migrations and Eloquent models:
  Doctors, Departments, Services, Facilities, Gallery Images, News Posts, Appointments, Contact Inquiries, Site Settings
- Nine Filament 4 CRUD resources under `/admin`
- Restricted admin login using `users.is_admin` (no public admin signup)
- Dynamic **home doctors / departments / services / news**, and editable homepage hero copy
- Dynamic doctor, service, department details, lists, news, gallery, facilities
- POST-backed appointment and inquiry forms with CSRF, validation, throttling and stored records
- Basic database seed of the doctors, departments and services discovered in the original provided website

## Windows / XAMPP setup

Prerequisites:
- PHP **8.2+** with `intl`, `mbstring`, `pdo_mysql`, `fileinfo`, `openssl`, `zip`, `gd`
- Composer and MySQL
- A terminal in the XAMPP `htdocs` folder

### Step 1: Create a clean Laravel 12 skeleton

```powershell
cd E:\xampp\htdocs
composer create-project "laravel/laravel:^12.0" attariya-hospital
```

### Step 2: Copy this package into that skeleton

Extract this package ZIP. Copy **all files and folders inside** `attariya-hospital-laravel` into `E:\xampp\htdocs\attariya-hospital`, choosing **Replace** when Windows asks.

Do **not** copy `.env` from another project. Keep the fresh skeleton's `config/` and framework-generated files. The ZIP's `.env.example` is a reference.

### Step 3: Install dependencies

```powershell
cd E:\xampp\htdocs\attariya-hospital
composer update
php artisan key:generate
```

If Filament commands need asset publication after installing:

```powershell
php artisan filament:assets
```

### Step 4: Configure MySQL

Create an empty MySQL database named `attariya_hospital` using phpMyAdmin, then edit `.env`:

```dotenv
APP_NAME="Attariya Hospital"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attariya_hospital
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=database
CACHE_STORE=database
FILESYSTEM_DISK=public
```

### Step 5: Migrate and seed

```powershell
php artisan migrate --seed
php artisan storage:link
```

Seed data is imported from the provided **previous frontend**, not independently medical-verified. Get approval before publishing.

### Step 6: Create the FIRST administrator

```powershell
php artisan hospital:create-admin
```

This asks for your own administrator name, email, and a password (minimum 12 characters). No default admin password is included.

### Step 7: Run

```powershell
php artisan serve
```

Public website: `http://127.0.0.1:8000`

Admin login: `http://127.0.0.1:8000/admin`

## Editing content

- **Doctors:** `/admin` > Doctors
- **Departments:** `/admin` > Departments
- **Services / Cath Lab:** `/admin` > Services. Set `is_featured` on Cath Lab.
- **Gallery / Facilities:** `/admin` > Gallery Images / Facilities. Upload properly consented authentic images.
- **News:** `/admin` > News Posts. Set `is_published` and a past or current `published_at`.
- **Appointments & inquiries:** Their own private Filament resources.
- **Hero text:** `/admin` > Site Settings, modify `hero_line_1`, `hero_line_2`, `hero_line_3`, `hero_description`.

**Important:** Uploaded records are not medical or scheduling confirmations. The hospital must approve clinical content, photos, schedules, contact and emergency details.

## What is NOT production-complete

- Composer dependencies cannot be installed or runtime-tested in the current isolated environment.
- There is no external SMTP, SMS, WhatsApp, calendar sync, or automatic confirmation. Appointment requests are saved with status `pending`; staff should review the dashboard.
- Static supporting pages (About, Health Articles, Contact page text, Privacy Policy) still need comprehensive CMS editing. The legal privacy notice is a placeholder to review before live use.
- Full professionally reviewed Nepali translation is not implemented.
- Multi-role policies, audited activity log, MFA, backup scheduling, real deployment, comprehensive accessibility test and external penetration testing remain.
- Some site images are illustrative rather than approved hospital photos. Do not publish as authentic hospital photography.
- Filament UI dependency compatibility and end-to-end browser testing must be done locally after Composer installation.

## Deployment gate checklist

Before public deployment:
1. Get hospital signoff on public medical content, doctor profiles, contact information and emergency hours.
2. Remove/test placeholder photographs and unpublished services.
3. Verify all dynamic pages and appointment/contact submissions in the actual PHP/MySQL environment.
4. Configure real mail notifications (if required) and define a staff response workflow.
5. Add proper admin role policies, MFA where possible, and audit logs.
6. Protect patient contact details, limit retention, and obtain privacy/legal review.
7. Use HTTPS, `APP_DEBUG=false`, `APP_ENV=production`, correct `APP_URL`, secure credentials, backups, monitoring.
8. Confirm that only `public/` is web-accessible and `.env`/storage are not exposed.
9. Set server permissions, optimize caches and test after deployment.

## Structural notes

`resources/views/pages` contains the converted original UI.
`resources/views/dynamic` contains database-bound detail / directory views.
`resources/views/layouts/site.blade.php` holds the shared navigation/footer.
`app/Filament/Resources` contains nine CRUD resources.
`database/seeders/DatabaseSeeder.php` contains initial website-derived seed content.

Do not use `migrate:fresh` on an existing live system; it deletes stored records.
