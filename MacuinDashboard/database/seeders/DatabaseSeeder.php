<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use App\Models\Departamentos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
            'nameU' => 'User',
            'email' => 'example@upq.edu.mx',
            'LastNameP' => 'Marquez',
            'LastNameM' => 'Chavez',
            'password' => '123456789',
            'remember_token' => '',
            'id' => 2,
            'IDEP' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
