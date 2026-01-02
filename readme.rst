#######################################################
Cleanliness & Fuel Management System (CFMS) Dashboard
#######################################################

CFMS is a web application designed to streamline the management of cleanliness schedules and monitor fuel consumption. Built with **CodeIgniter 3**, this system provides an integrated platform for operational tracking and reporting.

*******************
Key Features
*******************

- **Fuel Monitoring:** Track fuel usage logs, refueling history, and efficiency metrics.
- **Cleanliness Management:** Schedule and monitor cleaning tasks with a checklist-based system.
- **Interactive Dashboard:** Real-time data visualization for quick operational insights.
- **Role-Based Access:** Management of users with different levels of access (Admin, Supervisor, etc.).

**************************
Technical Specifications
**************************

- **Framework:** CodeIgniter 3.1.x
- **Language:** PHP 8.x (Compatible with PHP 5.6+)
- **Database:** MySQL / MariaDB
- **Frontend:** Bootstrap 4

*******************
Installation Guide
*******************

1. **Clone the Project**
   .. code-block:: bash

      git clone https://github.com/afafirmansyah/web-application-CodeIgniter3.git

2. **Database Setup**
   - Create a new database named ``db_cleanliness_fuel`` (or your preferred name).
   - Import the ``database.sql`` file provided in the root directory into your MySQL server.

3. **Configure Database Connection**
   - Open ``application/config/database.php``.
   - Update your database credentials:
     
     .. code-block:: php

        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'your_database_name',

4. **Set Base URL**
   - Open ``application/config/config.php``.
   - Set your local URL:
     
     .. code-block:: php

        $config['base_url'] = 'http://localhost/web-application-CodeIgniter3/';

5. **Launch**
   - Access the application in your browser via your local server (XAMPP/WAMP).

*******
License
*******

This project is licensed under the MIT License - see the `license.txt` file for details.

*********
Contact
*********

**Ahmad Fauzi Firmansyah**
- **GitHub:** `afafirmansyah <https://github.com/afafirmansyah>`_
- **LinkedIn:** `ahmad-fauzi-firmansyah <https://linkedin.com/in/ahmad-fauzi-firmansyah/>`_
