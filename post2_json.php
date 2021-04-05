<?php 
header('Access-Control-Allow-Origin: http://localhost/ajaxdemo');  

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=ajax_regions;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));   
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$str_requete = "SELECT * FROM regions";
$result = $db->query($str_requete);

$regions = $result->fetchAll(PDO::FETCH_OBJ);
var_dump($regions);

header('Content-Type:application/json');
echo json_encode($regions);

$result->closeCursor();
?>