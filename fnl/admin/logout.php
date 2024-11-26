<?php
    require_once('../connenct/database.php');
    session_start();
        echo  "<script>window.open('../index.php','_self');</script>";

        session_destroy();
?>