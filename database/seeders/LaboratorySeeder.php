<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Laboratory;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->laboratories()->createMany([
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
            ]);
        }
    }
}
