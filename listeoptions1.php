<?php                    
// connexion à la base

try{
    //connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=ajax_regions', 'root', '');
    $db->exec('SET NAMES "UTF8"');
} catch(PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}
                   
//j'écris la requête :
$sql = 'SELECT DISTINCT reg_id, reg_v_nom FROM `regions`';
//je prép la requête :
$query = $db->prepare($sql);
//j'exécute la requête :
$query->execute();
//on stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (!$query) //donc si la variable $query vaut NULL
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}
if ($query->rowCount() == 0) 
{
// Pas d'enregistrement
die("La table est vide");
}
//utilisation des données obtenues par la requête dans les options de liste déroulante
foreach($result as $row){
    echo '<option  value="'.$row['reg_id'].'">'.$row['reg_v_nom'].'</option>';
}  



