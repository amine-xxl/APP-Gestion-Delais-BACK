# SETAS — Backend 🇲🇦

### Système de Suivi et de Traitement des Affaires — المندوبية الإقليمية للشؤون الإسلامية بفاس

---

## � Table of Contents

- [About](#-about)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Installation](#-installation)
- [Environment Variables](#-environment-variables)
- [API Endpoints](#-api-endpoints)
- [Database Schema](#-database-schema)
- [Automated Reminders](#-automated-reminders)
- [Launch Scripts](#-launch-scripts)
- [Known Issues](#-known-issues)
- [Contributing](#contributing)
- [License](#license)

---

## �📌 About

Laravel REST API backend for the SETAS correspondence management system.
Handles CRUD operations, automated Gmail reminders, and deadline tracking for the **Ministère des Habous et des Affaires Islamiques — Fès**.

> 💡 Sensitive data is kept in `.env` and launch scripts, which are ignored. Example files (`.env.example`, `StartSetas.example.*`) are tracked.

---

## 🚀 Tech Stack

| Technology        | Usage                                   |
| ----------------- | --------------------------------------- |
| Laravel 11        | Backend framework                       |
| MySQL             | Database                                |
| PHP 8.x           | Server language (^8.2 in composer.json) |
| Carbon            | Date manipulation                       |
| Laravel Scheduler | Automated reminders                     |
| Gmail SMTP        | Email notifications                     |

---

## 📁 Project Structure

```
app/
├── Models/
│   └── Courrier.php
├── Http/Controllers/
│   └── CourrierController.php
├── Console/Commands/
│   └── SendReminders.php

database/
├── migrations/
│   └── xxxx_create_courriers_table.php

routes/
├── api.php
├── web.php
└── console.php

config/
└── mail.php

public/
└── (React build files)

# Startup scripts (tracked as examples)
StartSetas.example.bat
StartSetas.example.vbs
.env.example
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
php artisan serve --port=8000
```

---

## 🌍 Environment Variables

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

| Method | Endpoint                   | Description                 |
| ------ | -------------------------- | --------------------------- |
| GET    | `/api/courriers`           | Get all courriers           |
| POST   | `/api/courriers`           | Create new courrier         |
| GET    | `/api/courriers/reminders` | Get courriers due in 5 days |
| GET    | `/api/courriers/{id}`      | Get single courrier         |
| PUT    | `/api/courriers/{id}`      | Update courrier             |
| DELETE | `/api/courriers/{id}`      | Delete courrier             |

---

## 🗄️ Database Schema

```
courriers
├── id
├── n_garde
├── date_garde
├── sujet
├── date_recu
├── limite_recu
├── delais_recu
├── reponse
├── n_reponse
├── date_reponse
├── priority
├── status
├── reminder_sent
└── timestamps
```

---

## ⏰ Automated Reminders

```bash
php artisan reminders:send
```

Scheduled daily via Windows Task Scheduler:

* Program: `C:\path\to\php\php.exe`
* Arguments: `artisan reminders:send`
* Start in: `C:\path\to\project\BackEnd`

---

## 🚀 Launch Scripts

### StartSetas.example.bat

```bat
@echo off
title SETAS - Démarrage
start "" "C:\path\to\xampp\mysql_start.bat"
timeout /t 5 /nobreak > nul
start "" cmd /k "cd /d C:\path\to\project\BackEnd && C:\path\to\php\php.exe artisan serve --port=8000"
timeout /t 8 /nobreak > nul
start "" "http://localhost:8000"
```

### StartSetas.example.vbs

```vbs
Set oShell = CreateObject("WScript.Shell")
oShell.Run "C:\path\to\xampp\mysql_start.bat", 0, False
WScript.Sleep 5000
oShell.Run "cmd /c ""cd /d C:\path\to\project\BackEnd && C:\path\to\php\php.exe artisan serve --port=8000""", 0, False
WScript.Sleep 8000
oShell.Run "http://localhost:8000", 1, False
```

> Rename by Removing the `.example` extension from files after editing paths for local usage.

---

## 🐞 Known Issues

* Ensure PHP >= 8.2. Laravel 12 requires PHP 8.2 or higher.
* MySQL connection must be properly configured in `.env`.
* Gmail credentials require app-specific passwords (2FA must be enabled).
* Scheduled tasks require Windows Task Scheduler or cron setup.

---

## 📜 CHANGELOG

See [`CHANGELOG.md`](CHANGELOG.md) for version history and release notes.

---

## 🤝 Contributing

We welcome contributions! Please see [`CONTRIBUTING.md`](CONTRIBUTING.md) for guidelines on how to contribute to this project.

---

## 📄 License

This project is licensed under the **MIT License** — see the [`LICENSE`](LICENSE) file for details.

---

## 👨‍💻 Author

**Mohammed-Amine Rhazi**

Réalisé pour le Chef de Service de l'Enseignement Traditionnel et des Affaires Sociales

© 2026 Application de Suivi des Délais — SETAS

---

## 🔗 Links

- [CHANGELOG](CHANGELOG.md)
- [CONTRIBUTING](CONTRIBUTING.md)
- [LICENSE](LICENSE)
