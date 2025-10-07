# 🏠 Property Project API

A Laravel-based RESTful API for managing properties and brokers.  
Includes authentication, authorization, and complete CRUD operations for users, brokers, and properties.

---

## 🚀 Features

- 🔐 Authentication & Authorization (Register, Login, Logout)
- 🧑‍💼 Brokers Management (CRUD)
- 🏘️ Properties Management (CRUD)
- 🧾 JSON API Responses
- 🧰 Postman Collection for testing

---

## ⚙️ Installation Guide

### 1️⃣ Clone the repository
```bash
git clone https://github.com/yourusername/property-project.git

cd property-project

composer install
npm install && npm run dev

php artisan key:generate

DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

php artisan migrate --seed

php artisan serve

```
