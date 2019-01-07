<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');


include '../dbconnexion.php';


//print_r($_POST);
//die();
if(isset($_GET) && !empty($_GET)){


    if($_GET['action']=="all"){

        $response = [];
        $tri=$_GET['tri'];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SELECTION DES ARTICLES AVEC 
        try{
            $sql="SELECT * FROM liste WHERE liste.trigramme='$tri'";
            $result = $bdconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articleexist = $result->rowCount();

                
            if($articleexist==0){
                // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
            } else
            {
                foreach ($result as $item){
                    $response [] = [
                    "numListe"=>$item['numListe'],
                    "nom_liste"=>$item['nom_liste'],
                    "statut"=>$item['statut'],
                    "date_creation"=>$item['date_creation'],

                    ] ;
                }
            
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }

    if($_GET['action']=="listedetails"){

        $response = [];
        $num=$_GET['num'];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SELECTION DES ARTICLES AVEC 
        try{
            $sql="SELECT * FROM article WHERE article.numListe='$num'";
            $result = $bdconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articleexist = $result->rowCount();

                
            if($articleexist==0){
                // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
            } else
            {
                foreach ($result as $item){
                    $response [] = [
                    "codeA"=>$item['codeA'],
                    "prix"=>$item['prix'],
                    "taille"=>$item['taille'],
                    "statut"=>$item['statut'],
                    "commentaire"=>$item['commentaire'],
                    "description"=>$item['description'],
                    "numListe"=>$item['numListe'],
                    ] ;
                }
            
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }

    if($_GET['action']=="delete"){

        $response = [];
        $num_liste=$_GET['num'];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql="DELETE FROM liste WHERE liste.NumListe='$num_liste'";
            $bdconnect->exec($sql);
            $response = [
                        "message"=> "Supression effectuée",
                        "valide"=>true
                  ];
            
            
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }
    if($_GET['action']=="deletedetails"){

        $response = [];
        $codeA=$_GET['num'];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql="DELETE FROM article WHERE article.codeA='$codeA'";
            $bdconnect->exec($sql);
            $response = [
                        "message"=> "Supression effectuée",
                        "valide"=>true
                  ];
            
            
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }
    if($_GET['action']=="listedetailselement"){

        $response = [];
        $codeA=$_GET['codeA'];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql="SELECT * FROM article WHERE article.codeA='$codeA'";
            $result = $bdconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articleexist = $result->rowCount();

                
            if($articleexist==0){
                // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
            } else
            {
                foreach ($result as $item){
                    $response [] = [
                    "codeA"=>$item['codeA'],
                    "prix"=>$item['prix'],
                    "taille"=>$item['taille'],
                    "statut"=>$item['statut'],
                    "commentaire"=>$item['commentaire'],
                    "description"=>$item['description'],
                    "numListe"=>$item['numListe'],
                    ] ;
                }
            
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }
}


if(isset($_POST) && !empty($_POST)){

    if($_POST['action']=="add"){

        $response = [];
        $trigramme=$_POST['trigramme'];
        $nom_liste=$_POST['nom_liste'];
        $statut=$_POST['statut'];
        //print_r($_POST);
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql = "INSERT INTO liste (nom_liste,statut,trigramme,date_creation)
            VALUES ('$nom_liste', '$statut', '$trigramme',NOW())";
            // use exec() because no results are returned
            $bdconnect->exec($sql);
            $response = [
                        "message"=> "Ajout réussi",
                        "valide"=>true
                  ];


        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);


    }
    if($_POST['action']=="adddetail"){

        $response = [];
        $num_liste=$_POST['num_liste'];
        $description=$_POST['description'];
        $prix=$_POST['prix'];
        $taille=$_POST['taille'];
        $commentaire=$_POST['commentaire'];
        $statut=$_POST['statut'];
        print_r($_POST);
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql = "INSERT INTO article (numListe,prix,taille,description,statut,commentaire)
            VALUES ('$num_liste','$prix', '$taille', '$description','$statut', '$commentaire')";
            // use exec() because no results are returned
            print_r($sql);
            $bdconnect->exec($sql);
            $response = [
                        "message"=> "Ajout réussi",
                        "valide"=>true
                  ];


        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);


    }
    if($_POST['action']=="editdetail"){

        $response = [];
        $description=$_POST['description'];
        $codeA=$_POST['codeA'];
        $prix=$_POST['prix'];
        $taille=$_POST['taille'];
        $commentaire=$_POST['commentaire'];
        $statut=$_POST['statut'];
    //print_r($_POST);
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SUPRESSION D'UNE LISTE
        try{
            $sql = "UPDATE article SET prix='$prix',taille='$taille', description='$description',statut='$statut', commentaire='$commentaire'
            WHERE codeA='$codeA'";
            // use exec() because no results are returned
            //print_r($sql);
            $bdconnect->exec($sql);
            $response = [
                        "message"=> "Modification réussie ",
                        "valide"=>true
                  ];


        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);


    }
}
