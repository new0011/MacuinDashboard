<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamentos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DatosIni extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Jefe']);
        $role1 = Role::create(['name' => 'Auxiliar']);
        $role2 = Role::create(['name' => 'Cliente']);
        DB::table('Departamento')->insert([
            'NameDep' => 'Producción',
            'Descripcion' => 'Area de Producción',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('Usuario')->insert([
            'nameU' => 'Angel',
            'email' => 'example@upq.edu.mx',
            'LastNameP' => 'Marquez',
            'LastNameM' => 'Chavez',
            'password' => Hash::make('123456789'),
            'rememberToken' => str_random(10),
            'id' => 1,
            'IDEP' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
