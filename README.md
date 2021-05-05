![Gluten Status](https://img.shields.io/badge/Gluten-Free-green.svg)
![Eco Status](https://img.shields.io/badge/ECO-Friendly-green.svg)

# Task manager-CRUD-Aplication-@Bit.lt

Application built using laravel framework. To access all of the features you must register and login.

## Description:
CRUD (create, read, update, delete)
-   Tasks table:
    -   Add new tasks.
    -   Edit existing tasks.
    -   Delete tasks.
    -   Filter tasks by a specific status.
    -   All of the inputs ar validated with regex patterns. Only letters and numbers.

-   Statuses table:
    -   Add new status.
    -   Edit status.
    -   Delete status.
    -   All of the inputs ar validated with regex patterns. Only letters and numbers. If you delete one status all of the tasks using that status will be deleted too.

## Launch instructions:
-   If you do not have composer installed on your system, install it (installation instructions [here](https://getcomposer.org/download)).
-   Clone this repository or download it as a ZIP package.
-   Open it with Visual Studio Code or your preferred code editor.
-   Import 'egz1.sql' into your MySql server.
-   Rename **'.env.example'** file to **'.env'** inside of the project's root directory and configure the database information.
-   Using GitBash, CMD or other terminal in your code editor:
    -   if composer is installed locally: run **php <'path to composer.phar file location'>/composer.phar install**
    -   if composer is installed on your system globally: run **composer install**
-   If you chose to import 'sprint5.sql', in terminal:
    -   Run **php artisan key:generate**
    -   Run **php artisan serve**
-   Press on the link in the terminal after running 'php artisan serve'.

## Author:

[Justas Gud.](https://github.com/Justas383)
 
