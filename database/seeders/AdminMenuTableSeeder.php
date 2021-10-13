<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'created_at' => '2020-10-10 15:06:20',
                'extension' => '',
                'icon' => 'feather icon-bar-chart-2',
                'id' => 1,
                'order' => 1,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Index',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => '/',
            ),
            1 => 
            array (
                'created_at' => '2020-10-10 15:06:15',
                'extension' => '',
                'icon' => 'feather icon-shield',
                'id' => 2,
                'order' => 3,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Maintenance',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'maintenance/records',
            ),
            2 => 
            array (
                'created_at' => '2021-02-02 15:32:23',
                'extension' => '',
                'icon' => 'feather icon-list',
                'id' => 3,
                'order' => 2,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Todo Records',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'todo/records',
            ),
            3 => 
            array (
                'created_at' => NULL,
                'extension' => '',
                'icon' => NULL,
                'id' => 4,
                'order' => 4,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Assets',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2020-10-10 15:06:25',
                'extension' => '',
                'icon' => 'feather icon-user-check',
                'id' => 5,
                'order' => 10,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Organization',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'organization/users',
            ),
            5 => 
            array (
                'created_at' => '2020-10-04 10:22:42',
                'extension' => '',
                'icon' => 'feather icon-check-circle',
                'id' => 6,
                'order' => 11,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Check',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'check/records',
            ),
            6 => 
            array (
                'created_at' => '2020-10-10 15:06:23',
                'extension' => '',
                'icon' => 'feather icon-zap',
                'id' => 7,
                'order' => 13,
                'parent_id' => 36,
                'show' => 1,
                'title' => 'Vendor Records',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'vendor/records',
            ),
            7 => 
            array (
                'created_at' => '2020-12-14 19:38:17',
                'extension' => '',
                'icon' => 'feather icon-trending-down',
                'id' => 9,
                'order' => 15,
                'parent_id' => 36,
                'show' => 1,
                'title' => 'Depreciation Rules',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'depreciation/rules',
            ),
            8 => 
            array (
                'created_at' => '2020-10-10 15:06:25',
                'extension' => '',
                'icon' => 'feather icon-monitor',
                'id' => 11,
                'order' => 5,
                'parent_id' => 4,
                'show' => 1,
                'title' => 'Device',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'device/records',
            ),
            9 => 
            array (
                'created_at' => '2021-02-02 14:09:30',
                'extension' => '',
                'icon' => 'feather icon-server',
                'id' => 12,
                'order' => 6,
                'parent_id' => 4,
                'show' => 1,
                'title' => 'Part',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'part/records',
            ),
            10 => 
            array (
                'created_at' => '2021-02-02 14:09:45',
                'extension' => '',
                'icon' => 'feather icon-disc',
                'id' => 13,
                'order' => 7,
                'parent_id' => 4,
                'show' => 1,
                'title' => 'Software',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'software/records',
            ),
            11 => 
            array (
                'created_at' => '2021-02-02 14:09:37',
                'extension' => '',
                'icon' => 'feather icon-activity',
                'id' => 14,
                'order' => 9,
                'parent_id' => 4,
                'show' => 1,
                'title' => 'Service',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'service/records',
            ),
            12 => 
            array (
                'created_at' => '2021-02-02 15:32:04',
                'extension' => '',
                'icon' => 'feather icon-codepen',
                'id' => 15,
                'order' => 8,
                'parent_id' => 4,
                'show' => 1,
                'title' => 'Consumable',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => 'consumable/records',
            ),
            13 => 
            array (
                'created_at' => '2020-12-14 19:38:17',
                'extension' => '',
                'icon' => 'feather icon-layers',
                'id' => 16,
                'order' => 16,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Tools',
                'updated_at' => '2021-05-13 08:10:38',
                'uri' => '',
            ),
            14 => 
            array (
                'created_at' => '2020-12-14 19:38:17',
                'extension' => '',
                'icon' => '',
                'id' => 17,
                'order' => 17,
                'parent_id' => 16,
                'show' => 0,
                'title' => 'Chemex App',
                'updated_at' => '2021-05-13 08:10:38',
                'uri' => 'tools/chemex_app',
            ),
            15 => 
            array (
                'created_at' => '2020-12-14 19:38:17',
                'extension' => '',
                'icon' => '',
                'id' => 18,
                'order' => 18,
                'parent_id' => 16,
                'show' => 1,
                'title' => 'QRCode Generator',
                'updated_at' => '2021-05-13 08:10:38',
                'uri' => 'tools/qrcode_generator',
            ),
            16 => 
            array (
                'created_at' => NULL,
                'extension' => '',
                'icon' => 'feather icon-file-text',
                'id' => 36,
                'order' => 12,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Additional Options',
                'updated_at' => '2021-03-07 10:08:53',
                'uri' => NULL,
            ),
            17 => 
            array (
                'created_at' => '2021-03-18 16:13:49',
                'extension' => '',
                'icon' => 'feather icon-settings',
                'id' => 37,
                'order' => 21,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Setting',
                'updated_at' => '2021-05-13 08:11:00',
                'uri' => 'site/setting',
            ),
        ));
        
        
    }
}