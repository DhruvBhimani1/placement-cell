<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('branch_year')->truncate();
        DB::table('branches')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $branchesData = [
            'Computer Engineering' => ['intake' => 60, 'years' => [2022, 2023, 2024]],
            'Information Technology' => ['intake' => 60, 'years' => [2022, 2023, 2024]],
            'Electronics & Communication Engineering' => ['intake' => 60, 'years' => [2022, 2023, 2024]],
            'Mechanical Engineering' => ['intake' => 120, 'years' => [2022, 2023, 2024]],
            'Civil Engineering' => ['intake' => 60, 'years' => [2022, 2023, 2024]],
            'Production Engineering' => ['intake' => 60, 'years' => [2022]],
        ];

        foreach ($branchesData as $name => $data) {
            $branch = Branch::create(['name' => $name]);
            foreach ($data['years'] as $year) {
                DB::table('branch_year')->insert([
                    'branch_id' => $branch->id,
                    'year' => $year,
                    'sanctioned_intake' => $data['intake'],
                ]);
            }
        }
    }
}