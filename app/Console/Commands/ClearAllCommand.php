<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will call php artisan ( migrate, tenant:migrate, optimize:clear, config:cache ) commands in single command.';

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
    public function handle()
    {
        $this->call('migrate');
        $this->call('optimize:clear');
        $this->call('route:cache');
        $this->call('config:cache');
        $this->call('config:clear');
        $this->call('cache:clear');
    }
}
