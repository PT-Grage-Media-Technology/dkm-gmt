<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropDatabase extends Command
{
    protected $signature = 'db:drop {name}';

    protected $description = 'Drop a MySQL database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = $this->argument('name');

        config(['database.connections.mysql.database' => null]);

        $query = "DROP DATABASE IF EXISTS $database";

        DB::statement($query);

        $this->info("Database '$database' dropped successfully");
    }
}
