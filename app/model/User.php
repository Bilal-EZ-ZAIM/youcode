<?php
class User {
    use Model ;
    protected $table = 'utilisateurs';
 
    protected $allowedColums = [
        "id",
        "nom",
        "prenom",
        "email",
        "mot_de_passe",
        "role_id"
    ];
}


?>