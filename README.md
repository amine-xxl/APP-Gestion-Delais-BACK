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
└── console.php                   # Scheduler
config/
└── mail.php                      # Gmail SMTP config
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
| GET | `/api/courriers/{id}` | Get single courrier |
| PUT | `/api/courriers/{id}` | Update courrier |
| DELETE | `/api/courriers/{id}` | Delete courrier |
| GET | `/api/courriers/reminders` | Get courriers due in 5 days |

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
├── priority         # urgent / normal (auto-calculated)
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

Scheduled daily at 08:00 via Laravel Scheduler + Windows Task Scheduler.

---

## 👨‍💻 Author
**Mohammed-Amine Rhazi**  
- **My Email:** mohammedaminerhazi@gmail.com
- **My GitHub Profile:** https://github.com/amine-xxl

Réalisé pour le Chef de Service de l'Enseignement Traditionnel et des Affaires Sociales  
© 2026 Application de Suivi des Délais — SETAS
