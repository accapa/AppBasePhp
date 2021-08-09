<?php

namespace App\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\DB;
use PDO;

class MyController
{
    public function index()
    {
        $user = User::where('usu_codigo', "accapa")->first();
        echo $user->toJson();
        echo "<hr>";

        $listCargo = DB::table('tsegusuario')->first();
        echo json_encode($listCargo);
        echo "<hr>";

        $results = DB::select(DB::raw("SELECT usu_codigo, usu_apellido, iif(usu_nombre = null, 'S/N', usu_nombre) as test FROM tsegusuario WHERE usu_codigo = ?"), ["dinves01"]);
        echo json_encode($results);
        echo "<hr>";
    }

    public function select()
    {
        $users = DB::table('tsegusuario')
            ->select(DB::raw('count(*) as user_count, usu_apellido'))
            ->groupBy('usu_apellido')
            ->first();
        echo json_encode($users);
    }

    public function sinsql()
    {
        echo "hola sin sql";
    }

    public function pdo()
    {
        // ejemplo para ejecutar consultas directamente del PDO
        $pdo = DB::connection()->getPdo();
        // Use prepared statements
        $statement = $pdo->prepare("SELECT * FROM usuario WHERE codigo= :id");
        $statement->execute(['id' => 'DIPEC22']);
        $userRow = $statement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($userRow);
    }
}
