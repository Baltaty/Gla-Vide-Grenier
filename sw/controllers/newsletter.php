<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];
if(isset($_POST)){

        include'../dbconnexion.php';
        $bdconnect = connectionToBD();

         //$data = json_decode($_POST, true);

         //$email=$_POST['newsletter'];
         $mail=$_GET['mail'];
        print_r($mail);


        // $reqmail = $bdconnect->query("SELECT * FROM newsletter WHERE email='$email'");
        // $reqmail->setFetchMode(PDO::FETCH_ASSOC);
        // $mailexist = $reqmail->rowCount();
        // foreach ($reqmail as $item){
        //     $response [] = [
        //     "id"=>$item['id'],
        //     "email"=>$item['email'],
        //     "dates"=>$item['dates'],
        //     ] ;
        // }
        //  if($mailexist == 0){

        //     $sql = $bdconnect->prepare("INSERT INTO newsletter(email,dates) VALUES (?,NOW())");
        //     $sql->bindParam(1, $email);
        //     $sql->execute();

        //     $response = [
        //         "message"=> "Merci pour votre inscription !",
        //         "erreur"=>false
        //         ];

        // } else {

        //     $response = [
        //         "message"=> "Vous êtes déjà inscrit à la Newsletter..",
        //         "erreur"=>true
        //   ];
        //  }
     
    echo json_encode($response);
}