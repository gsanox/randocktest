<?php

/* Simple index to include all necesary files, 
if user is logged in, load form and datatable container view, 
if not, load login view */

include_once('config/config.php');

include_once('views/header.php');

if(Login::isLoged())
    include_once('views/container.php');
else 
    include_once('views/login.php');

include_once('views/footer.php');

?>




    