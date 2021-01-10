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

		$this->copy_env();

		$this->generate_key();

		$this->migrate();

		$this->seed();

		$this->info('Success Install');

		return 0;
	}

	private function copy_env(): void
	{
		$this->info('Copy .env file...');
		exec('php -r "file_exists(\'.env\') || copy(\'.env.example\', \'.env\');"');
	}

	private function generate_key(): void
	{
		$this->info('Generate app key...');
		exec('php artisan key:generate --ansi');
	}

	private function migrate(): void
	{
		$this->confirm('Migrate the table?')
			? $this->migrate_table()
			: null;
	}

	protected function migrate_table(): void
	{
		$this->info('Migrate all table...');
		exec('php artisan migrate');
	}

	private function seed(): void
	{
		$this->confirm('Seed the data to table?')
			? $this->seed_table()
			: null;
	}

	protected function seed_table(): void
	{
		$this->info('Seed all data...');
		exec('php artisan db:seed');
	}
}