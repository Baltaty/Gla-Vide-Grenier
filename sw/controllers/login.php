<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
include 'dbconnexion.php';
#... verif ici apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];

if(isset($_POST)){
    $user_login=$_POST['email'];
    $user_password =$_POST['password'];

     print_r($configs_env);
    
    if($user_login== "Admin" && $user_password == "glazik"){
            $response = [
              "status" => "loggedin",
              "user" =>"nameOfuser",
              "message"=> " un mignon message",
              "autorize"=>true
            ];
    } else{
        $response = [
            "status" => "failed",
            "message"=> " un vilain message",
            "autorize"=>false
        ];
    }
    echo json_encode($response);
}