<?php
    session_start();
    session_destroy();
    header('Location:../affichages/index.html');
?>