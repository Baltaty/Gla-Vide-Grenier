<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include '../dbconnexion.php';

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];
if(isset($_POST)){

    // Ajouter un utilisateur // Vendeur en occurence
    if($_POST['action']=="ADD"){
        $data = copyArray($_POST, "action");
        print_r($data);
        addUser($data);
    }

}







// Ajout d'un utilisateur
function addUser($data){

        $sql ="INSERT INTO user (nom, prenom, dateNaissance, civilite, numero, email, password, typeUser)
    VALUES (:nom, :prenom, :dateNaissance, :civilite, :numero, :email, :password, :typeUser) ";
        $bdconnect = connectionToBD();
        try{
            $preapreREq = $bdconnect->prepare($sql);
            $preapreREq->execute($data);
//            sendMail($_POST['email'], "REGISTER GLAZIK MEMBER", "bienvenu".$data['nom']);

            $response =[
                "status"=>true,
                "civilite"=>$data['civilite'],
                "username"=>$data['nom'] ." ". $data['prenom'] ,
                "message"=>" Votre insciption à été prise en compte avec succès, un mail de confirmation vous à été envoyé merci !"
            ];

        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
        echo json_encode($response);
}




function copyArray($tableau, $exceptItem){
    $toExecute = array();
    if(is_array($tableau)){
        foreach ($tableau as $item =>$value){

            if($item !=$exceptItem) {
                $toExecute[$item] =$value;
            }
        }
    }
    return $toExecute;
}