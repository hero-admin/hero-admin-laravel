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

		$this->copyEnv();

		$this->generateKey();

		$this->migrate();

		$this->seed();

		$this->info('Success Install');

		return 0;
	}

	private function copyEnv(): void
	{
		$this->info('Copy .env file...');

		$envPath        = base_path('.env');
		$envExamplePath = base_path('.env.example');

		if (file_exists($envPath)) {
			$this->confirm('The file already exists, do you want to continue?')
				? copy($envExamplePath, $envPath)
				: null;
		} else {
			copy($envExamplePath, $envPath);
		}
	}

	private function generateKey(): void
	{
		$this->info('Generate app key...');
		$this->call('key:generate');
	}

	private function migrate(): void
	{
		$this->confirm('Migrate the table?')
			? $this->migrateTable()
			: null;
	}

	protected function migrateTable(): void
	{
		$this->info('Migrate all table...');
		$this->call('migrate');
	}

	private function seed(): void
	{
		$this->confirm('Seed the data to table?')
			? $this->seedTable()
			: null;
	}

	protected function seedTable(): void
	{
		$this->info('Seed all data...');
		$this->call('db:seed');
	}
}