<?php

namespace App\Console\Commands;

use App\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchJsonPlaceholderData extends Command
{
    use Helper;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all data from jsonplaceholder.typicode.com';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->saveUsers();
            $this->savePosts();
            $this->saveAlbums();
            $this->saveComments();
            $this->savePhotos();
            $this->saveTodos();
            $this->info("All data fetched and saved successfully.");
            return Command::SUCCESS;
        } catch (\Throwable $th) {
            $this->info("Some went wrong. Please try again!");
        }
    }
}
