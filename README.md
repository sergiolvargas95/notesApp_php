# NotesApp

## Description

This project is a web application developed in **pure PHP**, designed using **Object-Oriented Programming (OOP)** and the **MVC architecture** (Model-View-Controller). Its primary purpose is to demonstrate how to build scalable and well-organized applications, making it ideal for both academic and professional projects using PHP.

The application uses **MySQL** as a relational database to store and manage information efficiently, ensuring a clear separation between business logic, presentation, and data access. It is the perfect solution for those looking to learn best practices in PHP development or to create customizable applications from scratch.

### **What makes this project unique?**
- **Clean and modular code:** Leverages the advantages of OOP to structure the code in a reusable and extensible manner.
- **MVC architecture:** Ensures a clear separation between the layers of business logic, presentation, and data.
- **Compatible and lightweight:** Operates without external dependencies or frameworks, ensuring compatibility with any modern PHP server.
- **Ready for learning:** Documented and structured to facilitate understanding, ideal for students or developers looking to grow their skills.

## Project Structure
```bash
NOTESAPP/
│── src/
│   │── config/
│   │   └── .env
│   │── controllers/
│   │   │── AuthController.php
│   │   └── NoteController.php
│   │── lib/
│   │   │── Controller.php
│   │   │── Database.php
│   │   │── Model.php
│   │   │── routes.php
│   │   │── SessionManager.php
│   │   └── View.php
│   │── models/
│   │   │── Note.php
│   │   └── User.php
│   │── public/
│   │   │── images/
│   │   │   └── basura-llena.png
│   │   │── js/
│   │   │   └── scripts.js
│   |──views/
│   |   │── create/
│   │   |   └── index.php
│   |   │── home/
│   │   |   └── index.php
│   │   |── login/
│   │   |   └── index.php
│   │   |── modals/
│   │   |   └── deleteModal.php
│   |   │── register/
│   │   |   └── layout.php
│   │── app.php
│── vendor/
│── .gitignore
│── .htaccess
│── composer.json
│── composer.lock
│── index.php
│── README.md
│── schema.sql
```

## Prerequisites
- PHP >= 8
- Composer
- MySQL >= 8

