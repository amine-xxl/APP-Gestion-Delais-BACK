# CHANGELOG

All notable changes to this project are documented here.

---

## [1.0.0] - 2026-04-05

### Added

**Core API**
* Full CRUD for `courriers` (index, store, show, update, destroy)
* Auto-calculated `priority` field (`urgent` if `delais_recu <= 7`, else `normal`)
* `status` defaults to `pending` on every new entry
* `reminder_sent` boolean flag to prevent duplicate email reminders
* `/api/courriers/reminders` endpoint — returns courriers due in exactly 5 days

**Database**
* MySQL migration for `courriers` table with fields:
  `n_garde`, `date_garde`, `sujet`, `date_recu`, `limite_recu`,
  `delais_recu`, `reponse`, `n_reponse`, `date_reponse`,
  `priority`, `status`, `reminder_sent`, `timestamps`
* Date casting (`Y-m-d`) on all date fields to prevent ISO timestamp issues

**Email Reminders**
* `SendReminders` Artisan command — sends Gmail alerts 5 days before deadline
* LTR Unicode mark (`\u200E`) applied to `n_garde` to fix RTL/LTR display in email
* Date formatted as `Y-m-d` in email body (removes `00:00:00` suffix)
* Gmail SMTP configured with SSL peer verification disabled for Windows compatibility
* `MAIL_TO` kept separate from `MAIL_USERNAME` for clean sender/receiver separation
* Laravel Scheduler configured in `routes/console.php` — runs daily at 08:00

**Routing & Middleware**
* Manual API route definitions (no `apiResource`) for full control
* CORS configured to allow `http://localhost:3000`
* `HandleCors` middleware registered in `bootstrap/app.php`
* `api.php` registered in `bootstrap/app.php` routing config
* `web.php` serves React build via `file_get_contents(public_path('index.html'))`

**Launch Scripts**
* `StartSetas.example.bat` — launches MySQL + Laravel + browser with visible terminal
* `StartSetas.example.vbs` — silent background launch, no terminal windows
* Both scripts tracked as `.example` files; real scripts ignored via `.gitignore`

**Configuration**
* `.env.example` with full SETAS-specific template
* `config/cors.php` published and configured
* `config/mail.php` with SSL stream options for Windows SMTP compatibility
* `composer.json` set to `^8.2` for compatibility with client PC PHP version

### Fixed
* PHP version mismatch on client PC — downgraded requirement from `^8.4` to `^8.2`
* Gmail SSL error on Windows — disabled `verify_peer` and `verify_peer_name`
* `.env` `MAIL_PASSWORD` wrapped in quotes to handle spaces in App Password
* Duplicate `create_courriers_table` migration removed (leftover from `migrate:fresh`)
* `reminders` route placed before `{id}` route to prevent Laravel treating it as an ID

### Notes
* Requires PHP >= 8.2 and XAMPP (Apache + MySQL)
* Tested with Laravel 11, MySQL 8, PHP 8.2 on Windows 10/11
* React build output goes in `public/` — run `npm run build` in FrontEnd folder
* `StartSetas.bat` / `StartSetas.vbs` must be created from `.example` files with correct local paths
* Windows Task Scheduler must be configured separately for daily reminder execution

---

## Release Description for GitHub

**SETAS Backend v1.0.0**

Initial production-ready release of the SETAS (Système de Suivi et de Traitement des Affaires) backend — built for the Direction Régionale du Ministère des Habous et des Affaires Islamiques de Fès.

Includes full correspondence management API, automated Gmail reminders, Laravel Scheduler, CORS configuration, React build serving, and Windows-ready launch scripts.
