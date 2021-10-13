<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:db-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '备份数据库数据';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->call('chemex:db-backup-custom-column');
        $this->info('开始导出数据：');
        foreach ($this->tables() as $table) {
            $this->call('iseed', ['tables' => $table, '--force' => true, '--clean' => true]);
        }
        $this->info('导出完成。');

        return 0;
    }

    public function tables(): array
    {
        return [
            'admin_extension_histories',
            'admin_extensions',
            'admin_menu',
            'admin_permission_menu',
            'admin_permissions',
            'admin_role_menu',
            'admin_role_permissions',
            'admin_role_users',
            'admin_roles',
            'admin_settings',
            'admin_users',
            'check_records',
            'check_tracks',
            'column_sorts',
            'consumable_categories',
            'consumable_records',
            'consumable_tracks',
            'departments',
            'depreciation_rules',
            'device_categories',
            'device_records',
            'device_tracks',
            'failed_jobs',
            'jobs',
            'maintenance_records',
            'notifications',
            'part_categories',
            'part_records',
            'part_tracks',
            'service_issues',
            'service_records',
            'service_tracks',
            'software_categories',
            'software_records',
            'software_tracks',
            'todo_histories',
            'todo_records',
            'vendor_records',
        ];
    }
}
