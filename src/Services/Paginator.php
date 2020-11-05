<?php
namespace App\Services;
class  Paginator{

    public function __construct()
    {
    }

    public function paginate($nbEnregistrements,$max){

    $nbPage = ($nbEnregistrements % $max) ? ($nbEnregistrements / $max) + 1 : ($nbEnregistrements / $max);
    return $nbPage;
}
}
?>