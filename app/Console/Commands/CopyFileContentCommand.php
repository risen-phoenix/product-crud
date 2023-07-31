<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CopyFileContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy:content {filename1} {filename2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copies content from one file to another';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $filename = $this->argument('filename1');
        $locationFilename = $this->argument('filename2');

        if (preg_match("/\.(txt)$/", $filename) && preg_match("/\.(txt)$/", $locationFilename)) {
            copy($filename, $locationFilename);
            echo ('The contents from $filename has been copied to $localFilename');
        } else {
            echo ('Unable to copy, incorrect file format.');
        }
    }
}
