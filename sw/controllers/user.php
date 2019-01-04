<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include '../dbconnexion.php';

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];
if(isset($_POST)){

//    print_r($_POST);
    $sql ="INSERT INTO user (nom, prenom, dateNaissance, civilite, numero, email, password, typeUser)
    VALUES (:nom, :prenom, :dateNaissance, :civilite, :numero, :email, :password, :typeUser) ";
    $bdconnect = connectionToBD();
    try{
        $preapreREq = $bdconnect->prepare($sql);
        $preapreREq->execute($_POST);
        sendMail("devops.integrale@gmail.com", "REGISTER GLAZIK GYM", "bienvenu".$_POST['nom']);

        $response =[
            "status"=>true,
            "message"=>"un message"
        ];

        }catch (PDOException $ex){
        echo $ex->getMessage();
    }
    echo json_encode($response);
}