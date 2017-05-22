<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=project;charset=utf8', 'root', 'azerty');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
