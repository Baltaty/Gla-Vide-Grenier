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
        addUser($data);
    }

     if($_POST['action']=="VERIFY"){
         $data = copyArray($_POST, "action");
         activeAccount($data);
    }



}



// Ajout d'un utilisateur
function addUser($data){

    $bdconnect = connectionToBD();
    $trigram = trigrammeGenerate($data, $bdconnect);
    do {
        $isok =  false;
        $resuldata = [];
        $sql = "SELECT *FROM user WHERE  user.trigramme='$trigram' LIMIT 1";
        $result = $bdconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $item) {
            $resuldata = [
                "nom" => $item['nom'],
                "prenom" => $item['prenom'],
                "trigrammeExist" => $item['trigramme'],
            ];
        }
        if(!empty($resuldata)){
            // si le trigramme exist deja
            if($trigram[2] != "Z" ){
                $trigram = nextTrigramme($trigram);
                $isok = true;
            } else {
                $trigram = aleatoireTrigramme();
                $isok = true;
            }
        }else {
            $isok = false;
        }
    }while($isok);

    try{

        $sql =" INSERT INTO user (nom, prenom, dateNaissance, civilite, numero, email, password, typeUser, trigramme, cle)
                VALUES (:nom, :prenom, :dateNaissance, :civilite, :numero, :email, :password, :typeUser, :trigramme, :cle) ";

        // Ajouter un trigramme dans la data;
        $data['trigramme'] = $trigram;
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data['cle'] = md5(microtime(TRUE)*100000);


        $preapreREq = $bdconnect->prepare($sql);
        $preapreREq->execute($data);
        $data['lienActive'] = $_SERVER['HTTP_REFERER']."#/register-active/".$data['cle'] ;

//        sendMail($data['email'], "REGISTER GLAZIK MEMBER", $data);

        $response =[
            "status"=>true,
            "civilite"=>$data['civilite'],
            "username"=>$data['nom'] ." ". $data['prenom'] ,
            "message"=>" Votre insciption a ete prise en compte avec succes, un mail de confirmation vous à été envoyé merci !",
            "token_confirm"=>$data['cle']
        ];

    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
    echo json_encode($response);
}

function trigrammeGenerate($data , $bdconnect){


         $trigrammeGenerated = strtoupper($data['prenom'][0]);
         $trigrammeGenerated = $trigrammeGenerated . "" . strtoupper(substr($data['nom'], 0, 2));

         $resuldata = [];
         $sql = "SELECT *FROM user WHERE  user.trigramme='$trigrammeGenerated' LIMIT 1";
         $result = $bdconnect->query($sql);
         $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $item){
            $resuldata = [
                "nom"=>$item['nom'],
                "prenom"=>$item['prenom'],
                "trigrammeExist"=>$item['trigramme'],
            ] ;
        }

        if(!empty($resuldata)){
            // si le trigramme exist deja
            if($trigrammeGenerated[2] != "Z" ){
                 return nextTrigramme($trigrammeGenerated);
            } else {
                return aleatoireTrigramme();
            }
        }else{
            return $trigrammeGenerated;
        }


};

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

function nextTrigramme($trigammeExistant){
    $alphabet = [
        "A","B","C","D","E","F","G","H","I","J","K","L","M",
        "N","O","P","Q","R","S","T","U","V","W","X","Y","Z"
    ];
    $lastPosition =strtoupper(substr($trigammeExistant,-1));
    $index = 0;
    foreach($alphabet as $value){

        if($value == $lastPosition){
            $trigammeExistant[2] = $alphabet[$index+1];
        }
        $index++;
    }
    return $trigammeExistant;
}

function aleatoireTrigramme(){
    $alphabet = [
        "A","B","C","D","E","F","G","H","I","J","K","L","M",
        "N","O","P","Q","R","S","T","U","V","W","X","Y","Z"
    ];
    $otherAleaTrigramme="";
    for($i=0 ; $i < 2; $i++ ){
        $otherAleaTrigramme =$otherAleaTrigramme."".$alphabet[rand(0,25)];
    }
    return $otherAleaTrigramme;
}


//verification de confi

function activeAccount($data){

    $response=[];
    $bdconnect = connectionToBD();
//    print_r($data);

    try{
        $cle = $data['cle'];
        $sql = "SELECT *FROM user WHERE  user.cle= '$cle' ";
        $result = $bdconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);


        foreach ($result as $item){
            $dataResult [] = [
                "name"=>$item['nom'],
                "prenom"=>$item['prenom'],
                "dateNaissance"=>$item['dateNaissance'],
                "civilite"=>$item['civilite'],
                "email"=>$item['email'],
                "password"=>$item['password'],
                "numero"=>$item['numero'],
            ] ;
        }
        if(!empty($dataResult)){
            $sql = "UPDATE user SET actif='1', cle='verified' WHERE user.cle= '$cle' ";
            $pst =  $bdconnect->prepare($sql);
            $pst->execute();
            $response = [
                "success" => true,
            ];

        } else {
            $response = [
                "success" => false,
            ];
        }
    }catch (PDOException $ex){
    }
    echo  json_encode($response);



}