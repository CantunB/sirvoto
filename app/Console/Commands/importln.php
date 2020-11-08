<?php

namespace SIRVOTO\Console\Commands;

use Illuminate\Console\Command;
use DB;
class importln extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:importln';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa el archivo sql con nombre LN en la tabla electores ';

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
        DB::unprepared(file_get_contents('database/migrations/LN.sql'));
    }
}
