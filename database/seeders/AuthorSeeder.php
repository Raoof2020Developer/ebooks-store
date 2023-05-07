<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'فاطمة عمراني']);
        Author::create(['name' => 'طلال الحمراني']);
        Author::create(['name' => 'أحمد الأنصاري']);
        Author::create(['name' => 'إسماعيل القحطاني']);
        Author::create(['name' => 'محمد الفاتح']);
        Author::create(['name' => 'هارون الرشيد ']);
    }
}
