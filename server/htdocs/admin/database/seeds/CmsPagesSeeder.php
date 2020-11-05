<?php

namespace Database\Seeders;

use App\Domains\CSV\GetDataFromCsvJob;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CmsPagesSeeder extends Seeder
{
    private  $table;
    private  $file_name;
    private  $file_path;

    /**
     * __construct()
     * CmsPagesSeeder constructor.
     *
     * @purpose : This function used for initialize CmsPagesSeeder class
     *
     * @created_by : Chandan Kumar
     * @created_at : Nov,04 2020 at 16::00
     * @param NONE
     * @return void
     */
    public function __construct()
    {
        $this->table = 'cms_pages';
        $this->file_name = 'cms-pages.csv';
        $this->file_path = base_path().config('custom-config.paths.seeder_data_path').$this->file_name;
    }

    /**
     * run()
     *
     * @purpose : This function used for feed cms_pages table
     *
     * @created_by : Chandan Kumar
     * @created_at : Nov,04 2020 at 16::00
     * @param NONE
     * @return void
     */
    public function run()
    {
        $cms_pages_data = [];
        $cms_pages = (new GetDataFromCsvJob($this->file_path))->handle();

        foreach($cms_pages as $page)
        {
            $cms_pages_data[] = [
                'title' => $page['title'],
                'slug' =>$page['slug'],
                'content'=>$page['content'],
                'created_by'=>$page['created_by'],
                'updated_by'=>$page['updated_by']
            ];

        }

        DB::table($this->table)->insert($cms_pages_data);
    }
}
