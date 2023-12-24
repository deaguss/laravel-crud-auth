<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Schema::disableForeignKeyConstraints();
        // Card::truncate();
        // Schema::enableForeignKeyConstraints();

        while (DB::table("cards")->count() >= 0 && DB::table("cards")->count() <= 10) {
            DB::table('cards')->insert([
                'uuid' => Str::uuid(),
                'member_id' => rand(1, 10),
                'active' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
