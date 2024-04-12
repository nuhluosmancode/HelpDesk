# City Council Help Desk System

Welcome to the City Council Help Desk System! This web-based system is designed to streamline support requests and improve communication within the city council departments.

## Features

- **Ticket Submission**: City council employees can easily submit support tickets for their inquiries or issues.
- **Ticket Assignment**: Tickets are automatically assigned to the appropriate department or personnel based on the category.
- **Ticket Tracking**: Employees can track the status and progress of their submitted tickets.
- **Knowledge Base**: Access to a knowledge base for common issues and solutions.
- **Dashboard**: An overview dashboard for administrators to manage tickets and monitor performance.

## Getting Started

### Installation

To install and run the City Council Help Desk System locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/nuhluosmancode/HelpDesk.git

    Place the project files in your web server's root directory (e.g., htdocs for XAMPP, www for WAMP).

    Create a MySQL database for the application.

    Import the SQL file database_scripts/helpdesk.sql into your MySQL database.

    Configure the database connection:
        Open config.php file in the includes directory.
        Update the database connection details ($dbHost, $dbUsername, $dbPassword, $dbName).

    Start your web server.

    Access the application in your web browser at http://localhost/HelpDesk.

Usage

    Employee: Log in with your employee credentials to submit a new ticket, view existing tickets, and search the knowledge base.
    Administrator: Log in with administrator credentials to manage tickets, assign tickets to departments, and monitor system performance.

Technologies Used

    Frontend: HTML, CSS, JavaScript, Bootstrap
    Backend: PHP
    Database: MySQL

Folder Structure

    assets/: Contains CSS, JavaScript, and image files.
    includes/: Contains PHP files for database connection and other utility functions.
    pages/: Contains PHP files for different pages like ticket submission, ticket list, etc.
    database_scripts/: Contains SQL scripts for setting up the database.
