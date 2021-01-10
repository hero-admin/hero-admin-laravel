<?php

namespace App\Console\Commands\HeroApp;

use Illuminate\Console\Command;

class Install extends Command
{
	/**
	 * The name and signature of the console command.
	 * Hero App Install Command
	 *
	 * @var string
	 */
	protected $signature = 'hero:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install Hero APP';

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
		$this->info('Install Hero APP...');

		$this->info('Copy .env file...');
		exec('php -r "file_exists(\'.env\') || copy(\'.env.example\', \'.env\');"');

		$this->info('Success Install');
		return 0;
	}
}
