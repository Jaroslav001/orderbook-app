<?php

namespace App\Console\Commands;

use App\Api\Cryptowat;
use App\Http\Controllers\SnapshotController;
use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch orderbook from cryptowat.ch and save the snapshot to DB';

    /**
     * The SnapshotController implementation.
     *
     * @var SnapshotController
     */
    protected $snapshotController;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SnapshotController $snapshotController)
    {
        parent::__construct();
        $this->snapshotController = $snapshotController;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {   // TODO - check if snapshot is returned

        $snapshot = $this->snapshotController->store();         
        $this->info($snapshot->textInfo);
    }
}
