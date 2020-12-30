# Todo List API!

**Todo** list is an API created using **Symfony 5** and **API Platform 2**. The application provides a poweful API for frontends to consume and manage task. The api supports **CRUD** operations. Please feel free to use as you need. 

#### Request and Response Formats:

 - JSON
 - JSON-LD

#### Supported Operations:
- CREATE
- READ
- PUT
- PATCH
- DELETE

# Installation

   
**Download project and install dependencies** 
    > git clone https://github.com/project/repository project_folder
    > cd project_folder
    > composer install (downloads the dependencies)
    > touch .env.local (add database url - copy DSN string from .env and manipulate)
    > touch .env.test (if you want to run tests better create a test database here)
  
  **Run Migrations**
  
    > bin/console doctrine:database:create (create database)
    > bin/console doctrine:migrations:migrate (run database migrations)
    > bin/console doctrine:fixtures:load (creates sample data - optional)
    > bin/console doctrine:database:create --env=test (create test database - optional)
    > bin/console doctrine:schema:update (creates test schema - optional)
   
  **Run Project**

    > symfony serve (if you've symfony cli installed)	
Otherwise point your webserver to public folder of the project because index.php lives there

Now you should see an api with documenations on **/api**