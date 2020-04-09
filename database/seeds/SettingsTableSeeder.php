<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'Sell your soul',
            'about' => '<h2>We\'re agency of hell and we buy souls.</h2>',
            'services' => '<p>– buy your soul.</p>',
            'color' => 'red',
            'email' => 'admin@example.com'
        ]);
    }
}
