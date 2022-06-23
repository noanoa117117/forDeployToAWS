<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO books (isbn, title, price, publisher,
         published)VALUES("978-4-8222-5399-8","Visual C",
         2000,"日経","2019-08-22")');
    }
}
