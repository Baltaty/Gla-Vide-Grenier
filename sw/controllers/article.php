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
    if($_POST["action"]=="ADD_VENTE"){
         addVente($_POST);
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
function addVente($data){


    $bdconnect = connectionToBD();
    $resuldata = [];
    $sql =  " INSERT INTO vente (dateV, acheteur, acheteur_numero, acheteur_adresse)
              VALUES (NOW(), :acheteur, :acheteur_numero, :acheteur_adresse);";


    $sql2 =  " INSERT INTO detailvente (codeV, codeA)
              VALUES (:codeV, :codeA);";
    $preStatment = $bdconnect->prepare($sql);
    $preStatment2 = $bdconnect->prepare($sql2);

    try{

//        print_r($data);
//        if(empty($data["lasteIdVente"])){
//            echo " c'est le premier ";
//        } else {
//            echo " c'est le deuxieme ";
//        }

//        die();

        //si c'est une premiere sent pour la data
        if( empty($data["lasteIdVente"]) ) {

            $preStatment->execute(array(
                "acheteur"=>$data["acheteur_name"],
                "acheteur_numero"=>$data["acheteur_numero"],
                "acheteur_adresse"=>$data["acheteur_adresse"],
            ));

            $lastIDVente = $bdconnect->lastInsertId();

            $preStatment2->execute(array(
                "codeV"=>$lastIDVente,
                "codeA"=>$data['codeA'],
            ));
            $resuldata = [
                "lasteIdVente"=>$lastIDVente,
                "success" => true,
                "message"=>"premier article inserer",
            ];

//            $resuldata = [
//                "lasteIdVente"=>33,
//                "success" => true,
//                "message"=>"premier article inserer sans idLAste",
//                "echo"=>$data,
//            ];

        } else {

            $preStatment2->execute(array(
                "codeV"=>$data['lasteIdVente'],
                "codeA"=>$data['codeA'],
            ));

            $resuldata = [
                "message"=>" c'est les suivants articles",
                "success" => true,
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
