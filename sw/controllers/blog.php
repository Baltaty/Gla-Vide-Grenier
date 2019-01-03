<?php


#... ce bout de code permet au serveur php de recevoir une demande service à partir de n'importe quelle origine et
#.. et sous quelle forme de donnnees les reponse seront emise !
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

#... verif iic apres on mettra des tockens de connexions de sessions mais actu boff pas trop le temps

include 'dbconnexion.php';

//function getLatestArticles(){


    $response = [];

    //EXECUTION DE LA REQUETE DE SELECTION DES ARTICLES RECENTS
    $reqarticle = $conn->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 0, 4");
    $latest=$reqarticle->execute();
    $articleexist = $reqarticle->rowCount();

           
    if($articleexist==0){
        // ACTION A FAIRE AU CAS OU IL N'Y A PAS D'ARTICLE
    } else
    {
        while($ligne = $latest->fetch(PDO::FETCH_ASSOC))
        {
            $response []= $ligne;
        }
    
    }
    echo json_encode($response);

//}

// function getCategories(){


 
// }