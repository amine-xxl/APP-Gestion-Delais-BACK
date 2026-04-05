# SETAS — Backend 🇲🇦
### Système de Suivi et de Traitement des Affaires — المندوبية الإقليمية للشؤون الإسلامية بفاس

---

## 📌 About
Laravel REST API backend for the SETAS correspondence management system.  
Handles all CRUD operations, automated Gmail reminders, and deadline tracking for the **Ministère des Habous et des Affaires Islamiques** — Fès regional office.

---

## 🚀 Tech Stack
| Technology | Usage |
|------------|-------|
| Laravel 11 | Backend framework |
| MySQL | Database |
| PHP 8.x | Server language |
| Carbon | Date manipulation |
| Laravel Scheduler | Automated reminders |
| Gmail SMTP | Email notifications |

---

## 📁 Project Structure
```
app/
├── Models/
│   └── Courrier.php              # Courrier model with fillable & casts
├── Http/Controllers/
│   └── CourrierController.php    # CRUD + reminders controller
├── Console/Commands/
│   └── SendReminders.php         # Daily reminder command
database/
├── migrations/
│   └── xxxx_create_courriers_table.php
routes/
├── api.php                       # API routes
├── web.php                       # Serves React build
└── console.php                   # Scheduler
config/
└── mail.php                      # Gmail SMTP config
public/
└── (React build files)           # Built frontend served here
StartSetas.bat                    # Launch script (shows terminal)
StartSetas.vbs                    # Launch script (silent, no terminal)
```

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/your-username/APP-Gestion-Delais-BACK.git

# Navigate to the project
cd APP-Gestion-Delais-BACK

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Start the server
php artisan serve
```

---

## 🌍 Environment Variables
Configure your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=setas
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_gmail@gmail.com
MAIL_PASSWORD="your_app_password"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_gmail@gmail.com
MAIL_TO=director_email@gmail.com
MAIL_FROM_NAME="SETAS"
```

---

## 📡 API Endpoints
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/courriers` | Get all courriers |
| POST | `/api/courriers` | Create new courrier |
| GET | `/api/courriers/reminders` | Get courriers due in 5 days |
| GET | `/api/courriers/{id}` | Get single courrier |
| PUT | `/api/courriers/{id}` | Update courrier |
| DELETE | `/api/courriers/{id}` | Delete courrier |

---

## 🗄️ Database Schema
```
courriers
├── id
├── n_garde          # Correspondence number
├── date_garde       # Correspondence date
├── sujet            # Subject
├── date_recu        # Reception date
├── limite_recu      # Deadline date (auto-calculated)
├── delais_recu      # Deadline in days
├── reponse          # Response text
├── n_reponse        # Response number
├── date_reponse     # Response date
├── priority         # urgent / normal (auto-calculated from delais_recu)
├── status           # pending / answered / archived
├── reminder_sent    # Boolean (default: false)
└── timestamps
```

---

## ⏰ Automated Reminders
Daily reminder command that sends Gmail alerts for courriers due in 5 days:
```bash
php artisan reminders:send
```

Scheduled daily at 08:00 via **Windows Task Scheduler**:
- Program: `C:\xampp\php\php.exe`
- Arguments: `artisan reminders:send`
- Start in: `C:\xampp\Setas App\BackEnd`

---

## 🚀 Launch Scripts

### `StartSetas.bat` — Launch with visible terminal
Double-click to start MySQL + Laravel and open the browser.  
A terminal window stays open showing the Laravel server logs.

```bat
@echo off
title SETAS - Démarrage
start "" "C:\xampp\mysql_start.bat"
timeout /t 5 /nobreak > nul
start "" cmd /k "cd /d C:\xampp\Setas App\BackEnd && C:\xampp\php\php.exe artisan serve --port=8000"
timeout /t 8 /nobreak > nul
start "" "http://localhost:8000"
```

### `StartSetas.vbs` — Silent launch (recommended for director)
Double-click to start everything **silently in the background** — no terminal windows, browser opens automatically.

```vbs
Set oShell = CreateObject("WScript.Shell")
oShell.Run "C:\xampp\mysql_start.bat", 0, False
WScript.Sleep 5000
oShell.Run "cmd /c ""cd /d C:\xampp\Setas App\BackEnd && C:\xampp\php\php.exe artisan serve --port=8000""", 0, False
WScript.Sleep 8000
oShell.Run "http://localhost:8000", 1, False
```

> **Director's daily routine:** Double-click `StartSetas.vbs` on the desktop → browser opens automatically → app is ready ✅

---

## 👨‍💻 Author
**Mohammed-Amine Rhazi**  
Réalisé pour le Chef de Service de l'Enseignement Traditionnel et des Affaires Sociales  
© 2026 Application de Suivi des Délais — SETAS
