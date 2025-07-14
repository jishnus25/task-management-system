Task Management System
A modular Laravel-based Task Management System with user and admin panels, robust authentication, image uploads, and clean architecture using DTOs, services, repositories, and actions.

🚀 Key Features
User Panel

View, filter, and update assigned tasks

Upload and view task images

Bootstrap 5 responsive UI

Admin Panel

Manage users and tasks

Assign tasks and view uploads

Filter and paginate tasks

Authentication

Separate guards for users and admins

Secure login/logout with CSRF protection

Architecture

DTOs for filtering and data transfer

Service + Repository + Action pattern

Slim controllers for better maintenance

🛠️ Installation
sh
Copy
Edit
git clone https://github.com/yourusername/task-management-system.git
cd task-management-system
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
Set up your .env with:

DB credentials

MAIL_ config for email (optional)

👤 Default Logins
Role	Email	Password
Admin	admin@example.com	password
User	user@example.com	password

Change passwords after first login.


