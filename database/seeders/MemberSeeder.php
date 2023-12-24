<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Member::truncate();
        // Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 10; $i++) {
            DB::table('members')->insert([
                'username' => Str::random(16),
                'email' => Str::random(16).'@gmail.com',
                'no_hp' => Str::random(15),
                'gender' => rand(0, 1),
                'alamat' => Str::random(16),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
