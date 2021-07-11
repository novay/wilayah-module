<?php

namespace Modules\Wilayah\Console;

use Illuminate\Console\Command;

class LinkLogo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wilayah:logo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/logo" to "Modules/Wilayah/Resources/assets/logo"';

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
        if (file_exists(public_path('logo'))) {
            return $this->info('The "logo" directory already exists.');
        }

        $this->laravel->make('files')->link(
            __DIR__ . '/../Resources/assets/logo', public_path('logo')
        );

        $this->info('The [logo] directory has been linked.');
    }
}
