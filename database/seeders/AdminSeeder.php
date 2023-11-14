<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "Administrator",
            "nip" => "197809152009011111",
            "password" => bcrypt("purwosari"),
            "roleid" => 1,
            "jabatan" => "Admin"
        ]);

        User::create([
            "name" => "Yudhistira Ardhi Nugraha, S.STP., MM",
            "nip" => "198307312001121003",
            "password" => bcrypt("purwosari"),
            "roleid" => 2,
            "jabatan" => "Camat"
        ]);

        User::create([
            "name" => "Achmad Suyono, SE.MM",
            "nip" => "197508162001121005",
            "password" => bcrypt("purwosari"),
            "roleid" => 3,
            "jabatan" => "Sekretaris Camat"
        ]);

        User::create([
            "name" => "Yatemo",
            "nip" => "198501202014061001",
            "password" => bcrypt("purwosari"),
            "roleid" => 4,
            "jabatan" => "Operator"
        ]);

        User::create([
            "name" => "Arry Singgih Eko Harsono, SP.,MM",
            "nip" => "197809152009011002",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASI PEMERINTAHAN"
        ]);

        User::create([
            "name" => "Drs. Ibnu Purwanto",
            "nip" => "196511271993031007",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASI KESRA"
        ]);

        User::create([
            "name" => "Bambang Edi Susanto, S.Sos",
            "nip" => "197912231999011001",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASI PMD"
        ]);

        User::create([
            "name" => "Gatot Nur Iswahyudi, SE",
            "nip" => "197611062001121001",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASI TRANTIB"
        ]);

        User::create([
            "name" => "Sri Wahyuni",
            "nip" => "197006111992112001",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASUBAG PROGLAP"
        ]);

        User::create([
            "name" => "Erna Widayati, S.IP. M.Si",
            "nip" => "197302082001122001",
            "password" => bcrypt("purwosari"),
            "roleid" => 5,
            "jabatan" => "KASUBAG UKK"
        ]);
    }
}
