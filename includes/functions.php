<?php

$data = require('data/gallery.php');

function redirectionErreur404()
{
    header('HTTP/1.0 404 Not Found');
    exit;
}


function findOneById($id)
{
    global $data;

    foreach ($data as $donnee) {
        if ($donnee['id'] == $id)
            return $donnee;
    }
    return false;
}

function getCount()
{
    global $data;

    $nb=count($data);
    return $nb;
}

function findPaged($limit, $offset)
{
    global $data;
    $selection = [];
    
    if ($offset!=0)
        $limit +=1;
    foreach ($data as $donnee) {
        if (($donnee['id'] >= $offset) && ($donnee['id'] <= $limit)) {
            $selection[]=$donnee;
        }
    }
    return $selection;
}

function findLatest($limit){
    global $data;

    $i = 0;
    $result = [];
    foreach($data as $key => $value) {
        $date[$key] = $value['date'];
    }
    array_multisort($date, SORT_DESC, $data);
    foreach($data as $photo)
        if($i != $limit){
            $result[] = $photo;
            $i++;
        }
    return $result;
}

function formulaire()
{
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $message=trim($_POST['message']);
    $regex_mail = '/^[-+.w]{1,64}@[-.w]{1,64}.[-.w]{2,6}$/i';

    if (!preg_match($regex_mail, $mail)) {
        $alert = "L\'adresse ".$mail." n\'est pas valide";
    } else {
        $courriel = 1;
    }
    if (!empty($alert)) {
        $courriel = 0;
    }
    if (empty($telephone) || empty($nom) || empty($message)) {
        $alert = 'Tous les champs doivent être renseignés';
    } else {
        $renseigne = 1;
    }
    if (!empty($alert)) {
        $renseigne = 0;
    }

    if ($renseigne == 1 && $courriel == 1) {
        $dest = "test@test.com";
        $sujet="Message depuis le site";
        $msg='';
        $msg .= 'Nom : '.$nom."rnrn";
        $msg .= 'Prenom : '.$prenom."rnrn";
    }
}

?>