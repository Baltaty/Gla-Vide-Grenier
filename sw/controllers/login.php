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
    print_r($_POST);

    if(!empty($user_login)){

            $bdconnect = connectionToBD();

            $data = [];
            try{
                $sql = "SELECT *FROM user WHERE email =:login";
                $prepareReq = $bdconnect->prepare($sql);
                $prepareReq->bindValue('login', $user_login);
                $prepareReq->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                print_r($user);
                die();


                $result = $bdconnect->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                foreach ($result as $item){
                    $data [] = [
                     "name"=>$item['name'],
                     "prenom"=>$item['prenom'],
                     "dateNaissance"=>$item['dateNaissance'],
                     "civilite"=>$item['civilite'],
                     "email"=>$item['email'],
                     "password"=>$item['type'],
                     "numero"=>$item['numero'],
                    ] ;
                }
            }catch (PDOException $ex){
                echo $ex->getMessage();
                die();
            }

            $response = [
              "data"=>$data,
              "status" => "loggedin",
              "user" =>"nameOfuser",
              "message"=> " un mignon message",
              "autorize"=>true
            ];
    } 
    // else{
    //     $response = [
    //         "status" => "failed",
    //         "message"=> " un vilain message",
    //         "autorize"=>false
    //     ];
    // }
    echo json_encode($response);
}