<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseRestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chemex:db-restore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '恢复数据库';

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
        // 数据库迁移
        $this->call('migrate');

        // 恢复自定义字段
        $this->call('chemex:db-restore-custom-column');

        // 恢复数据
        $this->call('db:seed');

        return 0;
    }
}
