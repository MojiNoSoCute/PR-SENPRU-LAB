# Creating Public Interface Features with Sample Data

## Current Implementation Status

The application currently has a basic public interface that displays program information. The implementation includes:

1. A `PublicController` that fetches the first program record
2. An `index.blade.php` view that displays program details
3. Basic styling with Bootstrap and custom CSS

However, the full set of public interface features required by the functional requirements is not yet implemented.

## Required Public Interface Features

According to the functional requirements, the public interface should include:

1. Program information (currently implemented)
2. Career opportunities after graduation
3. Faculty member information with positions
4. Laboratory details with images
5. Student activities with images and dates
6. Faculty research works
7. Student works/projects
8. Alumni information with roles
9. Course introduction videos (YouTube embed)

## Implementation Approach

### 1. Create Models and Database Tables

First, we need to create models and migrations for each entity:

```bash
# Create models with migrations
php artisan make:model Activity -m
php artisan make:model FacultyMember -m
php artisan make:model CareerOpportunity -m
php artisan make:model Laboratory -m
php artisan make:model StudentWork -m
php artisan make:model Alumnus -m
php artisan make:model Video -m
php artisan make:model FacultyResearch -m
php artisan make:model Media -m
```

### 2. Define Database Schema

Update the migration files to match the schema defined in `erd.md`:

For example, the `create_activities_table.php` migration:
```php
Schema::create('activities', function (Blueprint $table) {
    $table->id('activity_id');
    $table->foreignId('program_id')->constrained('programs', 'program_id');
    $table->string('title_th');
    $table->text('description_th')->nullable();
    $table->date('activity_date')->nullable();
    $table->timestamps();
});
```

### 3. Define Model Relationships

In each model, define the relationships:

```php
// In Program.php
public function activities()
{
    return $this->hasMany(Activity::class, 'program_id', 'program_id');
}

public function facultyMembers()
{
    return $this->hasMany(FacultyMember::class, 'program_id', 'program_id');
}

// Similar relationships for other entities...
```

### 4. Create Sample Data Seeders

Create seeders for sample data:

```bash
php artisan make:seeder ActivitySeeder
php artisan make:seeder FacultyMemberSeeder
# ... create seeders for other entities
```

Example seeder for activities:
```php
// ActivitySeeder.php
public function run()
{
    $program = Program::first();
    
    if ($program) {
        $program->activities()->createMany([
            [
                'title_th' => 'โครงการแนะแนวระดับมัธยมศึกษา',
                'description_th' => 'กิจกรรมแนะแนวสำหรับนักเรียนระดับมัธยมศึกษาที่สนใจศึกษาต่อในสาขาวิชาวิศวกรรมซอฟต์แวร์',
                'activity_date' => '2025-03-15',
            ],
            [
                'title_th' => 'งานวันเปิดบ้านคณะ',
                'description_th' => 'กิจกรรมเปิดบ้านให้นักเรียนและผู้ปกครองได้เข้าชมสภาพแวดล้อมของคณะและหลักสูตร',
                'activity_date' => '2025-07-20',
            ],
        ]);
    }
}
```

### 5. Update Public Controller

Modify the `PublicController` to fetch all required data:

```php
// PublicController.php
public function index()
{
    $program = Program::first();
    $updatedAt = $program?->updated_at;
    
    // Fetch related data
    $activities = $program ? $program->activities()->orderBy('activity_date', 'desc')->get() : collect();
    $facultyMembers = $program ? $program->facultyMembers()->get() : collect();
    $careerOpportunities = $program ? $program->careerOpportunities()->get() : collect();
    $laboratories = $program ? $program->laboratories()->get() : collect();
    $studentWorks = $program ? $program->studentWorks()->get() : collect();
    $alumni = $program ? $program->alumni()->get() : collect();
    $videos = $program ? $program->videos()->get() : collect();
    
    return view('index', compact(
        'program', 
        'updatedAt',
        'activities',
        'facultyMembers',
        'careerOpportunities',
        'laboratories',
        'studentWorks',
        'alumni',
        'videos'
    ));
}
```

### 6. Update Public View

Modify the `index.blade.php` to display all the new sections:

```html
<!-- Add new sections in the view -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">อาชีพหลังสำเร็จการศึกษา</h2>
        <div class="row g-4">
            @foreach($careerOpportunities as $opportunity)
            <div class="col-lg-6">
                <div class="info-card">
                    <h3 class="info-title">{{ $opportunity->title_th }}</h3>
                    <p>{{ $opportunity->description_th }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Similar sections for faculty, laboratories, activities, etc. -->
```

## Sample Data Definitions

### Career Opportunities Sample Data
```php
[
    [
        'title_th' => 'นักพัฒนาซอฟต์แวร์',
        'title_en' => 'Software Developer',
        'description_th' => 'พัฒนาและบำรุงรักษาซอฟต์แวร์ต่างๆ ทั้งในรูปแบบเว็บ โมบายล์ และเดสก์ท็อป',
        'description_en' => 'Develop and maintain various software including web, mobile, and desktop applications'
    ],
    [
        'title_th' => 'ผู้ควบคุมโครงการซอฟต์แวร์',
        'title_en' => 'Software Project Manager',
        'description_th' => 'วางแผน กำกับ ดูแล และบริหารโครงการพัฒนาซอฟต์แวร์ให้เป็นไปตามกำหนดเวลาและงบประมาณ',
        'description_en' => 'Plan, supervise, and manage software development projects to meet time and budget constraints'
    ]
]
```

### Faculty Members Sample Data
```php
[
    [
        'name_th' => 'ดร.สมชาย ใจดี',
        'name_en' => 'Dr. Somchai Jaidee',
        'position_th' => 'หัวหน้าสาขา',
        'position_en' => 'Head of Department',
        'email' => 'somchai@example.com',
        'phone' => '02-123-4567',
        'biography_th' => 'จบปริญญาเอกจากมหาวิทยาลัยชั้นนำด้านวิศวกรรมซอฟต์แวร์ มีประสบการณ์ในการสอนและการวิจัยมากกว่า 10 ปี',
        'biography_en' => 'PhD graduate from a leading university in software engineering with over 10 years of teaching and research experience'
    ]
]
```

### Activities Sample Data
```php
[
    [
        'title_th' => 'โครงการแนะแนวระดับมัธยมศึกษา',
        'description_th' => 'กิจกรรมแนะแนวสำหรับนักเรียนระดับมัธยมศึกษาที่สนใจศึกษาต่อในสาขาวิชาวิศวกรรมซอฟต์แวร์',
        'activity_date' => '2025-03-15'
    ],
    [
        'title_th' => 'แข่งขันพัฒนาแอปพลิเคชัน',
        'description_th' => 'การแข่งขันพัฒนาแอปพลิเคชันสำหรับนักศึกษาภายในคณะ ร่วมกับบริษัทเทคโนโลยีชั้นนำ',
        'activity_date' => '2025-05-10'
    ]
]
```

### Laboratories Sample Data
```php
[
    [
        'name_th' => 'ห้องปฏิบัติการพัฒนาเว็บและโมบายล์',
        'name_en' => 'Web and Mobile Development Lab',
        'description_th' => 'ห้องปฏิบัติการที่มีอุปกรณ์ทันสมัยสำหรับพัฒนาแอปพลิเคชันเว็บและโมบายล์',
        'description_en' => 'Modern laboratory equipped for web and mobile application development'
    ],
    [
        'name_th' => 'ห้องปฏิบัติการปัญญาประดิษฐ์',
        'name_en' => 'Artificial Intelligence Lab',
        'description_th' => 'ห้องปฏิบัติการสำหรับการวิจัยและพัฒนาด้านปัญญาประดิษฐ์และแมชชีนเลิร์นนิ่ง',
        'description_en' => 'Laboratory for artificial intelligence and machine learning research and development'
    ]
]
```

### Alumni Sample Data
```php
[
    [
        'name_th' => 'นางสาวกนกวรรณ สุขสบาย',
        'name_en' => 'Ms. Kanokwan Sukasabai',
        'graduation_year' => 2020,
        'current_position_th' => 'หัวหน้าทีมนักพัฒนา',
        'current_position_en' => 'Development Team Lead',
        'company_th' => 'บริษัทเทคโนโลยีไทย',
        'company_en' => 'Thai Technology Co., Ltd.',
        'biography_th' => 'ทำงานในตำแหน่งหัวหน้าทีมนักพัฒนา รับผิดชอบการพัฒนาแอปพลิเคชันระดับองค์กร'
    ]
]
```

### Videos Sample Data
```php
[
    [
        'title_th' => 'แนะนำหลักสูตรวิศวกรรมซอฟต์แวร์',
        'title_en' => 'Introduction to Software Engineering Program',
        'description_th' => 'วิดีโอแนะนำหลักสูตรและการเรียนการสอนในสาขาวิชาวิศวกรรมซอฟต์แวร์',
        'video_url' => 'https://www.youtube.com/embed/example123',
        'is_featured' => true
    ]
]
```

## Implementation Steps

1. **Create Models and Migrations**: Create all required models with appropriate migrations
2. **Run Migrations**: Apply the database schema changes
3. **Define Relationships**: Set up proper relationships between models
4. **Create Seeders**: Create seeders with sample data
5. **Update Controller**: Modify PublicController to fetch all required data
6. **Update Views**: Enhance the index.blade.php to display all sections
7. **Add Styling**: Implement CSS for new sections
8. **Test**: Verify all features work correctly

## Testing with Sample Data

After implementing the features, you can seed the database with sample data:

```bash
php artisan db:seed --class=ActivitySeeder
php artisan db:seed --class=FacultyMemberSeeder
# ... seed other entities
```

Then access the public interface at `/` to see all the new features with sample data.

## Future Enhancements

1. **Media Management**: Implement polymorphic media relationships for images
2. **Pagination**: Add pagination for sections with many items
3. **Search**: Implement search functionality across all entities
4. **Filtering**: Add filtering options for activities by date, faculty by position, etc.
5. **Responsive Gallery**: Create a responsive image gallery for activities and laboratories
6. **Video Gallery**: Implement a video gallery for course introduction videos