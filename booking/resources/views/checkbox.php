<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 21/07/15
 * Time: 21:24
 */

$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : array();
if (!isset($hobby))
{
    echo '<br> <br> Errore! Devi selezionare almeno un HOBBY!';
    exit;
}

elseif (count($hobby)>3)
{
    echo ' <br> <br> Errore! Non puoi selezionare più di due HOBBIES!';
    exit;
}

if (isset($hobby))
{
    echo '<br> <br>  I tuoi hobby sono: <ul>';
    foreach ($hobby as $interesse)
    {
        echo "<li>".$interesse.'</li>';
    }
    echo '</ul>';
}