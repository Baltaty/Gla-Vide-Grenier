<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');


include '../dbconnexion.php';
if(isset($_GET)){

    if($_GET['action']=="latest"){

            $response = [];
            $bdconnect = connectionToBD();
            //EXECUTION DE LA REQUETE DE SELECTION DES ARTICLES RECENTS
            try{
                $sql="SELECT * FROM articles,categorie WHERE articles.id_cat=categorie.id_cat ORDER BY date DESC LIMIT 0, 4";
                $result = $bdconnect->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $articleexist = $result->rowCount();

                    
                if($articleexist==0){
                    // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
                } else
                {
                    foreach ($result as $item){
                        $response [] = [
                        "id"=>$item['id_article'],
                        "id_cat"=>$item['id_cat'],
                        "titre"=>$item['titre'],
                        "date"=>$item['date'],
                        "contenu"=>$item['contenu'],
                        "vue"=>$item['vue'],
                        "nom_cat"=>$item['nom_cat'],
                        ] ;
                    }
                
                }
            }catch(PDOException $ex){
                echo $ex->getMessage();
                die();
            }
            echo json_encode($response);
        
    }
    if($_GET['action']=="all"){

        $response = [];
        $bdconnect = connectionToBD();
        //EXECUTION DE LA REQUETE DE SELECTION DES ARTICLES AVEC 
        try{
            $sql="SELECT * FROM articles,categorie WHERE articles.id_cat=categorie.id_cat";
            $result = $bdconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articleexist = $result->rowCount();

                
            if($articleexist==0){
                // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
            } else
            {
                foreach ($result as $item){
                    $response [] = [
                    "id"=>$item['id_article'],
                    "id_cat"=>$item['id_cat'],
                    "titre"=>$item['titre'],
                    "date"=>$item['date'],
                    "contenu"=>$item['contenu'],
                    "vue"=>$item['vue'],
                    "nom_cat"=>$item['nom_cat'],
                    ] ;
                }
            
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);

    
    }   

    if($_GET['action']=="selected"){

        $response = [];
        $bdconnect = connectionToBD();
        $selectedid=$_GET['id'];
        // EXECUTION DE LA REQUETE DE SELECTION DE L'ARTICLE CHOISI
        try{
            $sql="SELECT * FROM articles,categorie WHERE articles.id_article='$selectedid' AND articles.id_cat=categorie.id_cat";
            $result = $bdconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $articleexist = $result->rowCount();

                
            if($articleexist==0){
                // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
            } else
            { // ON RECUPERE L'ARTICLE
                foreach ($result as $item){
                    $response [] = [
                    "id"=>$item['id_article'],
                    "id_cat"=>$item['id_cat'],
                    "titre"=>$item['titre'],
                    "date"=>$item['date'],
                    "contenu"=>$item['contenu'],
                    "vue"=>$item['vue'],
                    "nom_cat"=>$item['nom_cat'],
                    ] ;
                }
                // MET A JOUR LE NOMBRE DE VUE  L'ARTICLE 
                $id=$response[0]['id'];
                $vue_update=$response[0]['vue'];
                $vue_update+=1;
                $sql2="UPDATE articles SET vue='$vue_update' WHERE id_article='$id'";
                $result2 = $bdconnect->prepare($sql2);
                $result2->execute();

            }

        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
        }
        echo json_encode($response);
    
}


}
if(isset($_POST)){

    if($_POST['action']=="addcomment"){

        $response = [];
        $bdconnect = connectionToBD();
        $id_art=$_POST['id_art'];
        $comment=$_POST['comment'];
        //print_r($comment);
        $response []=["resultat"=>"ok"];
    
        // EXECUTION DE LA REQUETE D'AJOUT DE COMMENTAIRE
        // try{
        //     $sql = "INSERT INTO commentaire (id_article,auteur, commentaire)
        //     VALUES ('$id_art', '$comment['']', 'john@example.com')";
        //     // use exec() because no results are returned
        //     $bdconnect->exec($sql);
        // }catch(PDOException $ex){
        //     echo $ex->getMessage();
        //     die();
        // }
        echo json_encode($response);
    
    
    }  
}
