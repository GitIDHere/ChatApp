<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ClearCache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the artisan and composer cache';

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
     * @return mixed
     */
    public function handle()
    {
		Artisan::call('config:clear');
		Artisan::call('cache:clear');

		exec('composer dump-autoload');

		Artisan::call('view:clear');
		Artisan::call('route:clear');

		$this->info('Cache cleared');
    }
}
