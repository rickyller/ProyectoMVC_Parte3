<link href="public/css/estilo.css" rel="stylesheet">

<?php
    function showError($message){
        echo "<span class='merror'>$message</span>";
    }
    function showInfo($message){
        echo "<span class='info'>$message</span>";
    }

    function showSuccess($message){
        echo "<span class='success'>$message</span>";
    }
?>