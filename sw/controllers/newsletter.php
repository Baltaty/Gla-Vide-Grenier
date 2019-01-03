<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];
if(isset($_POST)){

        //include('dbconnexion.php');
        // $servername = "localhost";
        // $username = "root";
        // $password = "root";
        
        // try {
        //     $conn = new PDO("mysql:host=$servername;dbname=glazik", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     }
        // catch(PDOException $e)
        //     {
        //     echo "Connection failed: " . $e->getMessage();
        //     }

        // $email=$_POST['newsletteremail'];
        // $reqmail = $conn->prepare("SELECT * FROM newsletter WHERE email = ?");
        // $reqmail->execute(array($email));
        // $mailexist = $reqmail->rowCount();
        $mailexist=0;
        if($mailexist == 0){

            // $sql = $conn->prepare('INSERT INTO newsletter(email,dates) VALUES (?,NOW())');
            // $sql->execute(array($email));

            $response = [
                "message"=> "Merci pour votre inscription !",
                "erreur"=>false
                ];

        } else {

            $response = [
                "message"=> "Vous êtes déjà inscrit à la Newsletter..",
                "erreur"=>true
          ];
        }
     
    echo json_encode($response);
}