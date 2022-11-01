

<?php

include ("db.php");
include ("response.php");
    session_start();
    session_destroy();
    response(true,true,true);
?>
