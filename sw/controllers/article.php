<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include '../dbconnexion.php';

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps

if(isset($_POST) && !empty($_POST)){

    if($_POST["action"]=="UPDATE"){
        updateArticle($_POST);
    }

} elseif (isset($_GET)  && !empty($_GET)){

}








function deleteUser($data){
    $bdconnect = connectionToBD();
    $resuldata = [];

    try{

        $value=$data['value'];
        $sql=" DELETE FROM user WHERE user.trigramme='$value'";
        $bdconnect->query($sql);
        $resuldata= [
            "success"=>true,
            "message"=>"supprimer avec sucess",
        ];

    }catch (PDOException $ex){
        $resuldata=[
            "success"=>false,
            "error"=>$ex->getMessage(),
        ];
        echo  json_encode($resuldata);
    }

    echo json_encode($resuldata);


};


//Tout les users
function getAllUsers($data){
    $bdconnect = connectionToBD();
    $resuldata = [];

    try{
        $sql="";
        if($data['action']=="ALL"){
            $sql = "SELECT * FROM user ";
        } else{
            $critere = $data['critere'];
            $value = $data['value'];
            $sql = "SELECT * FROM user WHERE user.$critere = '$value' ;";
        }


        $result = $bdconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            $resuldata [] = [
                "nom" => $item['nom'],
                "prenom" => $item['prenom'],
                "trigramme" => $item['trigramme'],
                "adresse" => $item['adresse'],
                "civilite" => $item['civilite'],
                "email" => $item['email'],
                "actif" => $item['actif'],
                "numero" => $item['numero'],
                "type" => $item['typeUser'],
                "dateNaissance" => $item['dateNaissance'],
            ];
        }

    }catch (PDOException $ex){
        $resuldata=[
            "success"=>false,
            "error"=>$ex->getMessage(),
        ];
        echo  json_encode($resuldata);
    }

    echo json_encode($resuldata);


};




// mise a jour  d'un utilisqteur
function updateArticle($data){
    $bdconnect = connectionToBD();


    try{

        $critere=$data['critere'];
        $value=$data['statut'];
        $codeArt=$data['codeA'];

        $sql= "UPDATE article SET article.$critere='$value' WHERE codeA='$codeArt' ;";

        $pst =  $bdconnect->prepare($sql);
        $pst->execute();

        $response= [
            "success"=>true,
            "message"=>"modification effectue avec sucess",
        ];
    }catch (PDOException $ex){
        $response=[
            "success"=>false,
            "error"=>$ex->getMessage(),
        ];
        echo  json_encode($response);
    }

    echo json_encode($response);


}

// copy un tableau a l'exeception d'un champ $exeception;
function copyArray($tableau, $exceptItem){
    $toExecute = [];
    if(is_array($tableau)){
        foreach ($tableau as $item =>$value){

            if($item !=$exceptItem) {
                $toExecute[$item] =$value;
            }
        }
    }
    return $toExecute;
}
