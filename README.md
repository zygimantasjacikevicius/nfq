# Project Title

An app that allows you to assign students to groups in a project.

## Description

A user is able to create new projects, add the amount of groups each project will have and add the amount of students in each group. The user is also able to assign students to groups, all of this information is saved to a MySQL database.

The App is build using Laravel framework.


### Installing

* git clone git@github.com:zygimantasjacikevicius/nfq.git
* turn on your server, I'm using XAMPP
* Create a database named nfq
* Rename the .env.example file to .env file.
* run command: php artisan migrate:fresh this should create the necessary database tables.

### Executing program

* In your browser go to: http://localhost/nfq/public/projects this will open the main app window. From here you can create projects, assign students, etc.

