# PR-SENPRU-LAB Project Context

## Project Overview

This is a Laravel 12-based web application for course promotion, specifically designed for the Software Engineering program. The system has two main user interfaces:

1. **Public View** (`/`) - Displays program information to students, parents, and interested parties
2. **Admin Panel** (`/program`) - Allows administrators to manage program information

The project follows the Laravel framework conventions and uses:
- PHP 8.2+
- SQLite database (configured in `database/database.sqlite`)
- Bootstrap 5 for styling
- Blade templating engine
- Vite with TailwindCSS for asset management

## Key Features

### Public Features
- Display program information (name, degree, credits, language, tuition, curriculum year)
- Responsive design that works on all device sizes
- Last updated timestamp display

### Admin Features
- User authentication (login/logout)
- Single program management (create/update)
- Form validation for all program fields

## Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── PublicController.php    # Handles public page display
│       ├── AuthController.php      # Handles authentication
│       └── ProgramController.php   # Handles program management
├── Models/
│   ├── Program.php                 # Program Eloquent model
│   └── User.php                    # User Eloquent model
routes/
├── web.php                         # All web routes
database/
├── migrations/                    # Database schema definitions
├── seeders/                       # Sample data seeders
│   ├── ProgramSeeder.php          # Sample program data
│   └── AdminUserSeeder.php        # Admin user (admin@example.com / secret)
resources/
├── views/                         # Blade templates
│   ├── index.blade.php            # Public page
│   ├── auth/                      # Authentication views
│   ├── programs/                  # Program management views
│   └── layouts/                   # Base layout templates
├── css/                           # CSS assets
└── js/                            # JavaScript assets
```

## Getting Started

### Requirements
- PHP >= 8.2
- Composer
- Node.js and npm
- SQLite3

### Setup Instructions

1. Install PHP dependencies:
   ```bash
   composer install
   ```

2. Create environment file and generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Ensure SQLite database file exists:
   ```bash
   touch database/database.sqlite
   ```

4. Run database migrations:
   ```bash
   php artisan migrate --force
   ```

5. Seed sample data:
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   php artisan db:seed --class=ProgramSeeder
   ```

6. Install frontend dependencies:
   ```bash
   npm install
   ```

7. Run development server:
   ```bash
   php artisan serve
   ```

### Admin Access
- URL: `/login`
- Email: `admin@example.com`
- Password: `secret`

### Development Commands

- Run development server: `php artisan serve`
- Run Vite dev server: `npm run dev`
- Build assets for production: `npm run build`
- Run tests: `php artisan test` or `composer test`
- Create migration: `php artisan make:migration`
- Create seeder: `php artisan make:seeder`
- Create controller: `php artisan make:controller`

## Database Schema

The database design follows the ER diagram defined in `erd.md`, which includes a central PROGRAMS table with multiple related entities.

### Core Tables

#### Programs Table
- `program_id` (Primary Key)
- `program_name_th` (string, required)
- `program_name_en` (string)
- `degree_th` (string)
- `degree_en` (string)
- `credits_required` (smallInteger)
- `language_th` (text, nullable)
- `tuition_fee` (decimal, nullable)
- `curriculum_year` (year, nullable)
- `created_at`/`updated_at` (timestamps)

#### Users Table
- `user_id` (Primary Key)
- `name` (string)
- `email` (string, unique)
- `password` (string)
- `created_at`/`updated_at` (timestamps)

### Related Entities

#### Activities Table
- `activity_id` (Primary Key)
- `program_id` (Foreign Key)
- `title_th` (string)
- `description_th` (text)
- `activity_date` (date)
- `created_at`/`updated_at` (timestamps)

#### Faculty Members Table
- `faculty_id` (Primary Key)
- `program_id` (Foreign Key)
- `name_th` (string)
- `name_en` (string)
- `position_th` (string)
- `position_en` (string)
- `email` (string)
- `phone` (string)
- `biography_th` (text)
- `biography_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Faculty Research Table
- `research_id` (Primary Key)
- `faculty_id` (Foreign Key)
- `title_th` (string)
- `title_en` (string)
- `description_th` (text)
- `description_en` (text)
- `publication_date` (date)
- `created_at`/`updated_at` (timestamps)

#### Career Opportunities Table
- `opportunity_id` (Primary Key)
- `program_id` (Foreign Key)
- `title_th` (string)
- `title_en` (string)
- `description_th` (text)
- `description_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Laboratories Table
- `lab_id` (Primary Key)
- `program_id` (Foreign Key)
- `name_th` (string)
- `name_en` (string)
- `description_th` (text)
- `description_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Student Works Table
- `work_id` (Primary Key)
- `program_id` (Foreign Key)
- `title_th` (string)
- `title_en` (string)
- `description_th` (text)
- `description_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Alumni Table
- `alumnus_id` (Primary Key)
- `program_id` (Foreign Key)
- `name_th` (string)
- `name_en` (string)
- `position_th` (string)
- `position_en` (string)
- `company_th` (string)
- `company_en` (string)
- `biography_th` (text)
- `biography_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Videos Table
- `video_id` (Primary Key)
- `program_id` (Foreign Key)
- `title_th` (string)
- `title_en` (string)
- `url` (string)
- `description_th` (text)
- `description_en` (text)
- `created_at`/`updated_at` (timestamps)

#### Media Table (Polymorphic)
- `media_id` (Primary Key)
- `mediaable_id` (integer)
- `mediaable_type` (string)
- `file_path` (string)
- `file_type` (string)
- `is_cover` (boolean)
- `created_at`/`updated_at` (timestamps)

### Relationships

The database follows these key relationships:
- One program can have many activities, faculty members, career opportunities, laboratories, student works, alumni, and videos
- Each faculty member can have multiple research entries
- Media is polymorphically related to programs, activities, faculty members, alumni, and student works

## Class Diagram

The application follows an object-oriented design as specified in `class.md`, with the following key classes:

### Program Class
- `program_id: int`
- `program_name_th: string`
- `program_name_en: string`
- `degree_th: string`
- `degree_en: string`
- `credits_required: smallint`
- `language_th: text`
- `tuition_fee: decimal`
- `curriculum_year: year`

### Activity Class
- `activity_id: int`
- `program_id: int`
- `title_th: string`
- `description_th: text`
- `activity_date: date`

### FacultyMember Class
- `faculty_id: int`
- `program_id: int`
- `name_th: string`
- `name_en: string`
- `position_th: string`
- `position_en: string`
- `email: string`
- `phone: string`
- `biography_th: text`
- `biography_en: text`

### CareerOpportunity Class
- `career_id: int`
- `program_id: int`
- `title_th: string`
- `title_en: string`
- `description_th: text`
- `description_en: text`

### Laboratory Class
- `lab_id: int`
- `program_id: int`
- `name_th: string`
- `name_en: string`
- `description_th: text`
- `description_en: text`
- `equipment_th: text`
- `equipment_en: text`

### StudentWork Class
- `work_id: int`
- `program_id: int`
- `title_th: string`
- `title_en: string`
- `description_th: text`
- `description_en: text`
- `year: year`

### Alumnus Class
- `alumni_id: int`
- `program_id: int`
- `name_th: string`
- `name_en: string`
- `graduation_year: year`
- `current_position_th: string`
- `current_position_en: string`
- `company_th: string`
- `company_en: string`
- `biography_th: text`
- `biography_en: text`

### Video Class
- `video_id: int`
- `program_id: int`
- `title_th: string`
- `title_en: string`
- `description_th: text`
- `description_en: text`
- `video_url: string`
- `thumbnail_path: string`

### FacultyResearch Class
- `research_id: int`
- `faculty_id: int`
- `title_th: string`
- `title_en: string`
- `description_th: text`
- `description_en: text`
- `publication_date: date`

### Media Class
- `media_id: int`
- `mediaable_id: int`
- `mediaable_type: string`
- `file_path: string`
- `file_type: string`
- `is_cover: boolean`

### Class Relationships

The class diagram defines these relationships:
- Program has 0..* Activities
- Program has 0..* FacultyMembers
- Program has 0..* CareerOpportunities
- Program has 0..* Laboratories
- Program has 0..* StudentWorks
- Program has 0..* Alumni
- Program has 0..* Videos
- Program has 0..* Media
- FacultyMember has 0..* FacultyResearch
- FacultyMember has 0..* Media
- Activity has 0..* Media
- Alumnus has 0..* Media

## Development Conventions

### Code Style
- Follow PSR-12 coding standards
- Use Laravel conventions for naming and structure
- Controllers should be kept thin with logic delegated to models/services
- Use request validation in controllers

### Views
- Use Blade templating engine
- Extend layouts for consistent page structure
- Use form validation error handling
- Implement responsive design with Bootstrap

### Testing
- Unit tests in `tests/Unit/`
- Feature tests in `tests/Feature/`
- Run tests with `php artisan test`

## Public Interface Features

The public interface of the application needs to display various types of information as specified in `function-requirement.txt`. A detailed guide for implementing these features is available in `public_interface_guide.md`, which includes:

1. **Implementation approach** for all required public features:
   - Career opportunities
   - Faculty member information
   - Laboratory details
   - Student activities
   - Faculty research works
   - Student works/projects
   - Alumni information
   - Course introduction videos

2. **Sample data definitions** for each entity type to populate the database with realistic content

3. **Step-by-step implementation instructions** for:
   - Creating models and database tables
   - Defining model relationships
   - Creating sample data seeders
   - Updating controllers and views
   - Testing with sample data

The guide provides comprehensive information on how to extend the current basic program information display to a full-featured course promotion system.

### Adding New Fields to Program
1. Create new migration to add columns to `programs` table
2. Update `fillable` array in `app/Models/Program.php`
3. Update validation rules in `ProgramController@update`
4. Update form in `resources/views/programs/edit.blade.php`
5. Update display in `resources/views/index.blade.php`

### Adding New Admin Pages
1. Create new controller with `php artisan make:controller`
2. Add routes in `routes/web.php`
3. Create views in `resources/views/`
4. Add navigation links as needed

### Deployment Considerations
- Set proper file permissions for `storage/` and `bootstrap/cache/` directories
- Configure environment variables in `.env` for production
- Run `php artisan config:cache` and `php artisan route:cache` for production
- Ensure `database/database.sqlite` is writable

## Troubleshooting

### Common Issues
1. **Database not found**: Ensure `database/database.sqlite` exists and is writable
2. **No program data**: Seed database with `php artisan db:seed --class=ProgramSeeder`
3. **Login not working**: Ensure admin user exists with `php artisan db:seed --class=AdminUserSeeder`
4. **Assets not loading**: Run `npm install` and `npm run dev` or `npm run build`

### Useful Debug Commands
```bash
# Check routes
php artisan route:list

# Check database
sqlite3 database/database.sqlite ".schema"

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

## Project Phases Documentation

This project includes detailed documentation in:
- `phase1.md` - Setup guide and project overview
- `phase2.md` - Detailed installation and usage guide
- `function-requirement.txt` - Functional requirements specification
- `public_interface_guide.md` - Guide for creating public interface features with sample data

These documents provide comprehensive instructions for setting up, running, and maintaining the application.