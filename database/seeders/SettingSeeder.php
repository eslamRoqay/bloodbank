<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'site_name_ar' => 'Bloodbank',
            'site_name_en' => 'bloodbank',
            'phone' => '8484858845855',
            'email' => 'info@eggs-plus.com',
            'logo' => 'uploads/setting/blood_white.png',
            'login_pg' => 'uploads/setting/blood_dark.png',
            'logo_login' => 'uploads/setting/blood_dark.png',
            'location' => null,
            'facebook' => 'https://www.facebook.com',
            'twitter' => null,
            'instagram' => null,
            'pinterest' => null,
            'snapchat' => null,
            'telegram' => null,
            'youtube' => null,
            'address_ar' => 'bloodbank bloodbank',
            'address_en' => 'bloodbank bloodbank',
            'sm_description_ar' => 'bloodbank description about application',
            'sm_description_en' => 'bloodbank description about application',
            'copyright' => 'جميع الحقوق محفوظة منصة bloodbank، تنفيذ و تطوير بواسطة',
            'copyright_link_text' => 'bloodbank',
            'copyright_link' => 'http://www.google.com',

            'terms_ar' => 'terms_ar',
            'terms_en' => 'terms_en',
            'privacy_ar' => 'privacy_ar',
            'privacy_en' => 'privacy_en',
            'usage_ar' => 'usage_ar',
            'usage_en' => 'usage_en',
            'about_ar' => 'about_ar',
            'about_en' => 'about_en',
            'delivery_cost' => '200',
            'cash_on_delivery' => '0',
        ];


        Setting::setMany($data);
    }
}
