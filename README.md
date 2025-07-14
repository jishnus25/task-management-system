Task Management System
A modular Laravel-based Task Management System with separate user and admin panels, robust authentication, image uploads, and modern, scalable code architecture using DTOs, service, repository, and action patterns.

🚀 Features
User Panel:
View and update assigned tasks
Upload and view task images
Filter and paginate tasks by status and date
Bootstrap 5 responsive UI
Admin Panel:
Manage all users and tasks
Assign tasks to users
Upload and view task images
Filter and paginate all tasks
Modular, clean dashboard
Authentication:
Separate guards for users and admins
Secure login/logout flows
CSRF protection
Modern Architecture:
Uses DTOs for all filtering/search
Service and repository layers for business logic
Action classes for create/update
Clean, maintainable controllers
🛠️ Installation
Clone the Repository
sh
git clone https://github.com/yourusername/task-management-system.git
cd task-management-system
Install Dependencies
sh
composer install
npm install && npm run dev
Copy and Configure .env
sh
cp .env.example .env
Set your database credentials in .env
Configure MAIL_ settings if you want email notifications
Generate Application Key
sh
php artisan key:generate
Run Migrations
sh
php artisan migrate
Seed the Database
sh
php artisan db:seed
This will create default admin and user accounts.
👤 Default Credentials
Role	Email	Password
Admin	admin@example.com	password
User	user@example.com	password
Change these passwords after your first login!

📦 Usage
User Panel:
Visit /user to login as a user.
View, filter, and update your assigned tasks.
Upload images for your tasks.
Admin Panel:
Visit /admin to login as an admin.
Manage all users and tasks.
Assign tasks, upload images, and use advanced filters.
💡 Code Structure
app/Http/Controllers/: Slim controllers, delegate logic to services/actions
app/Services/: Business logic
app/Repositories/: Query logic for tasks/users
app/Actions/: Encapsulated create/update logic
app/DataTransferObjects/: DTOs for filtering and data transfer
resources/views/: Modular Blade layouts for user/admin
📝 Customization
Task Statuses:
Easily extendable via TaskConstants class.
Pagination:
Controlled via CommonConstants::PAGINATION_LIMIT.
Image Uploads:
Images stored in storage/app/public/tasks.
Run php artisan storage:link if images do not display.
