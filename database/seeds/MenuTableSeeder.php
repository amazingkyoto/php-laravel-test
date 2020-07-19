<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $menus = new \App\Menu;
        // $menus->title = "Libraries";
        // $menus->save();

        // DB::table('menus')->insert([

        Menu::create([
            "title" => "Libraries",
            "url" => "libraries",
            "iconClass" => "fas fa-fw fa-archive",
            "status" => "ACTIVE",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        Menu::create([
            "title" => "Books",
            "url" => "books",
            "iconClass" => "fas fa-fw fa-book-open",
            "status" => "ACTIVE",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        $this->command->info("Menu has been Inserted!");
    }
}
