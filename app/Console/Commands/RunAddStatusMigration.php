<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunAddStatusMigration extends Command
{
    protected $signature = 'migrate:add-status';
    protected $description = 'Run the migration to add status field to bookings table';

    public function handle()
    {
        $this->info('Running migration to add status field to bookings table...');
        Artisan::call('migrate', [
            '--path' => 'database/migrations/2023_06_15_000000_add_status_to_bookings_table.php',
            '--force' => true,
        ]);
        $this->info('Migration completed successfully.');
    }
}
