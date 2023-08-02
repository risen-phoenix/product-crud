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
            $row      = 0;
            $csvArray = array();
            if (($open = fopen($file, 'r')) !== false) {
                while (($data = fgetcsv($open, 0, ',')) !== false) {
                    $num = count($data);
                    for ($i = 0; $i < $num; $i++) {
                        $csvArray[$row][] = $data[$i];
                    }
                    $row++;
                }
            }

            if (!empty($csvArray)) {
                $csvArray = array_splice($csvArray, 1); //cut off the first row (names of the fields)
            } else {
                $csvArray = [];
            }

            foreach($csvArray as $key => $value) {
                $name[$key] = $value[1];
                $price[$key] = $value[2];
                $description[$key] = $value[3];
            }

            array_multisort($price,SORT_ASC ,$name,SORT_ASC, $description, SORT_ASC, $csvArray);

            foreach($csvArray as $key => $value){
                echo $key . ": " . $value[1]." ".$value[2]. " " . $value[3]. "\n";
            }


        }
    }
}
