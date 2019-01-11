<?php
#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');


include '../dbconnexion.php';

if(isset($_GET) && !empty($_GET)){

    getParameters($_GET);
} elseif (isset($_POST) && !empty($_POST)){
    updateParameter($_POST);
}





function getParameters($data){

    $response=[];
    $bdconnect = connectionToBD();
    if($data['action']=="ALL" ){

        try{

            $sql=" SELECT * FROM parametre ";
            $result = $bdconnect->query($sql);
            foreach ($result as $item) {
                $resuldata = [
                    "montant_article" => $item['x'],
                    "id_parametre" => $item['id'],
                    "nombre_article" => $item['y'],
                    "pourcentage" => $item['z'],
                ];
            }
            $response= [
                "data"=>$resuldata,
                "success"=>true,
            ];

        }catch (PDOException $ex){
            $resuldata=[
                "success"=>false,
                "error"=>$ex->getMessage(),
            ];
            echo  json_encode($response);
        }

        echo json_encode($response);
    }
}


function updateParameter($data){


    $resuldata= [];
    $bdconnect =  connectionToBD();
    if($data['action']=="UPDATE"){

        $data = copyArray($data , "action");

        try{

            $sql=" UPDATE parametre SET  x=:montant_article, y=:nombre_article, z=:pourcentage WHERE id=:id_parametre";
            $result = $bdconnect->prepare($sql);
            $result->execute($data);
            $resuldata= [
                "data"=>$resuldata,
                "success"=>true,
            ];

        }catch (PDOException $ex){
            $resuldata=[
                "success"=>false,
                "error"=>$ex->getMessage(),
            ];
            echo  json_encode($resuldata);
        }
        echo json_encode($resuldata);
    }
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