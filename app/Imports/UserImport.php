<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class UserImport implements ToModel
{
    use Importable;
    
    public function model(array $row)
    {
        $pemilih = new User([
            'name' => $row[0],
            'email' => $row[1],
            'jurusan' => $row[2],
            'kelas' => $row[3],
            'token'=> strtoupper(Str::random(6)),
        ]);

        $pemilih->assignRole('user');

        return $pemilih;    
    }
}
