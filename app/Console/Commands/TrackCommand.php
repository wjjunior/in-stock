<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;

class TrackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track all product stock';

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
    public function handle(): void
    {
        $products = Product::all();

        // start a progress bar
        $this->output->progressStart($products->count());

        // tack each product while ticking the progress bar
        $products->each(function ($product) {
            $product->track();
            $this->output->progressAdvance();
        });

        // finish the progress bar to 100%
        $this->output->progressFinish();
        // output the result as a table
        $this->info("All done!");
    }
}
