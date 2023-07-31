<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:productsCsv {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read a CSV file containing a list of products (name, price, description) and display the products sorted by price in ascending order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('filename');

        if (preg_match("/\.(csv)$/", $file)) {
            $open = fopen($file, 'r');

            while (($data = fgetcsv($open, 1000, ',')) !== false) {
                $result[] = $data;
            }
        } else {
            echo ("Unable to read file, wrong file format!");
        }

        sort($result);
                
        foreach ($result as $row_number => $data) {
            echo $row_number . ': ' . $data[0] . ' '.$data[1] .' ' .$data[2] . ' ';
        }

        fclose($open);
    }
}
