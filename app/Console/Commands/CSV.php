<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SplFileObject;
use App\Models\Customer;

class CSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import csv file';

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
        // return Command::SUCCESS;
        $path = base_path().'/public/csv/customers.csv';
        if ( file_exists ($path) )
        {
            $file = new \SplFileObject ($path);
            $file->setFlags (\SplFileObject::READ_CSV);
            foreach ($file as $key => $value) {
                list($id, $first_name, $last_name, $email, $gender, $company, $city, $title) = $value;                
                Customer::create (['id'=>$id, 'first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'gender'=>$gender, 'company'=>$company, 'city'=>$city, 'title'=>$title]);                               
            }            
        }        
    }
}
