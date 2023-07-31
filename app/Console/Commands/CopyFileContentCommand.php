<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CopyFileContentCommand extends Command
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
    protected $description = 'Copies content from one file location to another';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $filename = $this->argument('filename1');
        $locationFilename = $this->argument('filename2');

        if (preg_match("/\.(txt)$/", $filename)) {
            copy($filename, $locationFilename);
            echo ('The file contents have been copied');
        } else {
            echo ('Unable to copy, incorrect file format.');
        }
    }
}
