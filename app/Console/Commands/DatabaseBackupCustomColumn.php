<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackupCustomColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:db-backup-custom-column';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '备份自定义字段数据';

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
        $this->info('开始导出数据（自定义字段）：');
        $this->call('iseed', ['tables' => 'custom_columns', '--force' => true, '--clean' => true]);
        $this->info('导出完成。');

        return 0;
    }
}
