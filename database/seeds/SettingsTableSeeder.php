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
        \App\Setting::create([
           'site_name' => "Thilina's Blog",
            'address' => 'Matara, Sri Lanka',
            'contact_number' => '74367934569',
            'contact_email' => 'info@thilina_blog.com'
        ]);
    }
}
