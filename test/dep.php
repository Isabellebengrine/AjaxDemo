<?php
header('Access-Control-Allow-Origin: http://localhost/ajax_demo');

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
$reg_id = $_POST['reg_id'];
$str_requete = "SELECT * FROM departements where dep_reg_id = :reg_id ";
$result = $db->prepare($str_requete);
$result->bindValue(':reg_id', $reg_id, PDO::PARAM_INT);
$result->execute();
$dep = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($dep);

$result->closeCursor();
?>