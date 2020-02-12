<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username' => $row['alamat_email'],
            'password' => bcrypt($row['password']),
            'e_password' => Crypt::encrypt($row['password']),
            'api_token' => Str::random(60),
        ]);
    }
}
