<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include '../dbconnexion.php';

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps
$response = [];
if(isset($_POST)){
    $user_login=$_POST['email'];
    $user_password =$_POST['password'];


    if($user_login!=""){

            $bdconnect = connectionToBD();

            $data = [];
            try{
                $sql = "SELECT *FROM user WHERE  user.email= '$user_login' ";
                $result = $bdconnect->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                foreach ($result as $item){
                    $data [] = [
                        "name"=>$item['name'],
                        "prenom"=>$item['prenom'],
                        "dateNaissance"=>$item['dateNaissance'],
                        "civilite"=>$item['civilite'],
                        "email"=>$item['email'],
                        "password"=>$item['password'],
                        "numero"=>$item['numero'],

                    ] ;
                }

                // si on retrouve des donnees correspondant au user alors on verifie son mot de passe
                if(!empty($data)){
                    // si le password est correcte alors;
                    if($user_password == $data[0]['password']){
                        $response = [
                            "data"=>$data,
                            "status" => "loggedin",
                            "name" =>"nameOfuser",
                            "prenom"=>"prenomOfuser",
                            "TokenSeesion"=> "a generer",
                            "dernier connection"=>"a gerer si possible",
                            "message"=> "Bienvenue à toi Glazik Member",
                            "autorize"=>true
                        ];
                    } else{
                        $response = [
                            "status" => "failed",
                            "message"=> " Mot de passe ou login Incorrect",
                            "autorize"=>false
                        ];
                    }
                }


            }catch (PDOException $ex){
                echo $ex->getMessage();
                die();
            }
    } else{
        $response = [
            "status" => "failed",
            "message"=> " un vilain message",
            "autorize"=>false
        ];
    }
    echo json_encode($response);
}