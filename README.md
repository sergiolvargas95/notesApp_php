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
## Componentes principales
- `controllers/`: Handle requests and coordinate logic between model and view.
- `models/`: Represent data and business logic of the application.
- `views/`: Render the interface and display data to the user.
- `lib/`: Contains helper classes like Database and Sessions.
- `public/`: Stores static files like images and JavaScript scripts.
- `config/`: Configuration files, including environment variables.
- `vendor/`: Third-party libraries managed by Composer.
- `schema.sql/`: Defines the database structure.
- `index.php/`: Main entry point of the application.
- `composer.json/`: Manages project dependencies with PHP Composer.

## Databases
This project uses MySQL as the SQL database management system. MySQL works with relational databases, it uses multiple tables that are interconnected with each other to store information and organize it correctly.

### Database Structure
- `users`: Contains the id, username, email, password and creation date fields.
- `notes`: Contains the fields id, title, content, creation date and the id of the user who created the note.

![image](https://github.com/user-attachments/assets/aac38595-61a4-4853-97d3-425fc0d6eb2d)

### One-to-many associations
- We have a one-to-many association where a user can have many notes, but a note can only be associated with one user.

# Installation Guide

## Prerequisites
To set up and run this project, ensure you have the following installed:
- **PHP 8.3 or higher**: Required for running the application. Install via official PHP website or package manager.
- **Composer (dependency manager for PHP)**: Required for managing project dependecies. Install from getcomposer.org and verify with `composer --version`.
- **MySQL 8 or higher**: Required for database management.
- **Database Setup**: import the `schema.sql` file into MySQL and configure database connection settings in the `.env` file inside `config/`.
- **Project Setup**:
  - clone de repository   
    ```sh
      git clone https://github.com/sergiolvargas95/notesApp_php.git
      cd NotesApp
    ```
  - install dependecies
    ```sh
    composer install
    ```
  - run the project
    ```sh
    php -S localhost:8000
    ```

# Usege Guide
1. **Login Screen 🔐**
  - The app starts withe a login form, enter your username and passowrd to access. If you do not have an account created, you can access the registration view and create a new account. If you do not have an account created, you can access the registration view and create a new account. The _password_hash method_ is used to encrypt the password and save it to the database. This uses the bcrypt algorithm, which is derived from classes based on the Blowfish encryption. This algorithm uses adaptive hashing techniques, making it highly resistant to brute force attacks.
    
  ![login_notes](https://github.com/user-attachments/assets/2d184829-a9fa-4616-928f-b450b6c36ccf)

2. **Home Screen (Notes List) 🏠**
  - The home page shows all the notes created by the user, each note shows its title and content, if we click on the title we can edit it, the trash icon can delete each note.

  ![home_notes](https://github.com/user-attachments/assets/d4018523-fef4-47a8-9018-4de11e6929ff)

3. **Create Note Screen 📝**
  - Through the navigation bar we can create new notes, we fill in the title and content fields, and then we create our new note and return to the list.
   
   ![createnote](https://github.com/user-attachments/assets/0a5a1625-f0cb-4967-95fd-efa09770e04b)

