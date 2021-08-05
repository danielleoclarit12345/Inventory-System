
Inventory System

Used to develop: Laravel, Composer, Git Bash, Xampp, VSCode, Bootstrap, Browser

HOW TO RUN INVENTORY SYSTEM:

- Clone the system from github by typing "git clone -b master --single-branch https://github.com/danielleoclarit12345/Inventory-System.git" in git bash
- Make sure to place the cloned system inside C:\xampp\htdocs
- Run the XAMPP control panel and start MySQL and Apache
- Open the browser and go to http://localhost/phpmyadmin/ to create the database
- Click the new to create a database.
- Name the database "inventory".
- Click import to import the inventory.sql file.
- Click choose file and select the file that can be found inside the Inventory-System folder.
- Click go
- Open vscode then open the Inventory-System folder
- Type in the vscode terminal and run this commands: composer install, copy .env.example .env, php artisan key:generate, php artisan migrate, php artisan serve
- Open browser then copy and paste this link http://localhost:8000

Created this system :

- Danielle Oclarit
- Honey Grace Nalimot
- Paolo Olais
- John Dave Nacorda
- Shenna Mae Polancos
   
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.