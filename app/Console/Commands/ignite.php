<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class ignite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ignite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automate blueprint process';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
       Artisan::call('blueprint:erase');
       Artisan::call('blueprint:build');

       $this->comment("Type 'Yes please :)'");
       $this->withProgressBar(1,fn() => Artisan::call('ide-helper:models'));
       $this->withProgressBar(1,fn() => Artisan::call('ide-helper:generate'));
       $this->withProgressBar(1,fn() => Artisan::call('ide-helper:eloquent'));
       $this->withProgressBar(1,fn() => Artisan::call('ide-helper:meta'));

       $seedDatabase = $this->choice(
           'Do you wish to seed the database?',
           ['Y' => 'Yes','N' => 'No'],
           default: 'N'
       );

       Artisan::call('migrate:fresh');

        $seedDatabase === 'Y' && Artisan::call('db:seed');
        $this->info('Enjoy Simplicity!');

    }
}
