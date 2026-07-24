<div align="center">

# 🏥 Hospital Management System (HMS)

### A Complete Hospital Management System built using CodeIgniter, PHP & MySQL

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FF9A00?style=for-the-badge&logo=xampp&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

A modern Hospital Management System developed using **PHP CodeIgniter Framework**, **MySQL**, **Bootstrap**, and **XAMPP**.

This project helps hospitals manage patients, doctors, departments, employees, wards, prescriptions, visitor records, appointments, and many more hospital operations from a single dashboard.

---

⭐ If you like this project, don't forget to Star this repository!

</div>

---

# 📖 Overview

Hospital Management System (HMS) is a web-based application designed to simplify and digitize hospital management processes.

It provides a centralized dashboard where hospital staff can efficiently manage patient records, doctor information, employee details, departments, wards, prescriptions, visitor records, and hospital resources.

This project is continuously being improved and new features will be added in future updates.

---

# ✨ Features

## 👨‍⚕️ Doctor Management
- Add Doctor
- Update Doctor
- Delete Doctor
- View Doctor Details

---

## 🏥 Hospital Management
- Hospital Information
- Department Management
- Ward Management
- Bed Management

---

## 👨‍💼 Employee Management
- Employee Records
- Shift Assignment
- Employee Shift Matrix

---

## 👨‍⚕️ Patient Management

- Patient Registration
- Patient Admission
- Patient Assignment
- Patient In/Out Records
- Patient Prescription
- Patient Treatment
- Patient Operation

---

## 🧾 Visitor Management

- Add Visitors
- Update Visitor
- View Visitor Information

---

## ⚙️ Other Modules

- Inventory Management
- Supplier Management
- Shift Master
- Dashboard
- Authentication
- Session Management

---

# 🛠 Tech Stack

| Technology | Used |
|------------|------|
| PHP | ✅ |
| CodeIgniter 3 | ✅ |
| MySQL | ✅ |
| Bootstrap | ✅ |
| HTML5 | ✅ |
| CSS3 | ✅ |
| JavaScript | ✅ |
| XAMPP | ✅ |

---

# 📂 Project Structure

```
Hospital-Management-System-CodeIgniter
│
├── application/
├── build/
├── cyber_security/
├── dist/
├── docs/
├── pages/
├── plugins/
├── system/
├── uploads/
├── index.php
├── README.md
└── db_hms.sql
```

---

# ⚙️ Installation Guide

## Step 1

Install

- XAMPP
- PHP
- MySQL

---

## Step 2

Clone the repository

```bash
git clone https://github.com/ChiragBorse/Hospital-Management-System-CodeIgniter.git
```

or download the ZIP file.

---

## Step 3

Open your XAMPP installation directory.

Example:

```
C:\xampp\htdocs\
```

---

## Step 4

Create a folder named

```
hms
```

inside

```
htdocs
```

Your folder structure should look like this:

```
C:\xampp\htdocs\hms
```

---

## Step 5

Copy **ALL project files** from this repository into the

```
hms
```

folder.

The folder should contain files like

```
application/
system/
uploads/
plugins/
index.php
README.md
```

Do **NOT** create another folder inside `hms`.

Correct structure:

```
htdocs
    │
    └── hms
        │
        ├── application
        ├── system
        ├── plugins
        ├── uploads
        ├── index.php
        └── ...
```

---

# 🗄 Database Setup

This repository includes

```
db_hms.sql
```

Import this SQL file into phpMyAdmin.

---

## Database Import

Open

```
http://localhost/phpmyadmin
```

Create a new database named

```
db_hms
```

After creating it

Click

```
Import
```

Select

```
db_hms.sql
```

Click

```
Go
```

Wait until importing is completed.

---

# ⚙ Database Configuration

Open

```
application/config/database.php
```

Update database credentials if necessary.

Example

```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'db_hms',
'dbdriver' => 'mysqli',
```

---

# ▶ Run Project

Start

- Apache
- MySQL

from XAMPP Control Panel.

Open your browser

```
http://localhost/hms
```

The Hospital Management System should now be running successfully.

---

# 📷 Screenshots

You can add screenshots here.

Example

```
screenshots/dashboard.png
screenshots/patient.png
screenshots/doctor.png
```

---

# 🚀 Future Improvements

This project is actively being developed.

Upcoming features include:

- REST APIs
- Appointment Scheduling
- Billing System
- Laboratory Module
- Pharmacy Module
- Reports
- PDF Export
- Notifications
- Responsive UI Improvements
- Security Enhancements
- Performance Optimization
- Dashboard Analytics
- Role Based Access Control
- Multi Hospital Support

More exciting features will be added in future updates.

---

# 🤝 Contributing

Contributions are welcome!

If you would like to improve this project:

1. Fork the repository

2. Create a new branch

```
git checkout -b feature-name
```

3. Commit your changes

```
git commit -m "Added New Feature"
```

4. Push your branch

```
git push origin feature-name
```

5. Open a Pull Request

---

# 🐞 Report Issues

Found a bug?

Please open an Issue in this repository with:

- Bug Description
- Steps to Reproduce
- Expected Behaviour
- Screenshots (if available)

---

# 📌 Version

Current Version

```
v1.0.0
```

Status

```
🟢 Active Development
```

---

# 👨‍💻 Author

## Chirag Borse

🎓 Master of Computer Applications (MCA)

💻 Full Stack Developer

☁ Cloud Computing Enthusiast

🤖 AI & Machine Learning Enthusiast

🔗 GitHub

https://github.com/ChiragBorse

---

# 📄 License

This project is released under the MIT License.

Feel free to use, modify, and contribute while giving appropriate credit.

---

<div align="center">

## ⭐ If you found this project useful, please consider giving it a Star ⭐

Made with ❤️ by **Chirag Borse**

</div>
