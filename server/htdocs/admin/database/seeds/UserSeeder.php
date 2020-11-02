<?php

namespace Database\Seeders;

use App\Domains\CSV\GetDataFromCsvJob;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private  $table;
    private  $file_name;
    private  $file_path;

    /**
     * __construct()
     * UserSeeder constructor.
     *
     * @purpose : This function used for initialize UserSeeder class
     *
     * @created_by : Arif Khan
     * @created_at : Oct,30 2019 at 05.00 PM
     * @param NONE
     * @return void
     */
    public function __construct()
    {
        $this->table = 'users';
        $this->file_name = 'users.csv';
        $this->file_path = base_path().config('custom-config.paths.seeder_data_path').$this->file_name;
    }

    /**
     * run()
     *
     * @purpose : This function used for feed users table
     *
     * @created_by : Arif Khan
     * @created_at : Oct,30 2019 at 05.00 PM
     * @param NONE
     * @return void
     */
    public function run()
    {
        $users_data = [];
        $users = (new GetDataFromCsvJob($this->file_path))->handle();

        foreach($users as $user)
        {
            $users_data[] = [
                'name' => $user['name'],
                'email_address' =>$user['email_address'],
                'mobile_country_code'=>$user['mobile_country_code'],
                'mobile_no'=>$user['mobile_no'],
                'password'=>Hash::make($user['password']),
                'is_email_verified'=>$user['is_email_verified'],
                'is_mobile_verified'=>$user['is_mobile_verified'],
                'is_blocked'=>$user['is_blocked']
            ];

        }

        DB::table($this->table)->insert($users_data);
    }
}
