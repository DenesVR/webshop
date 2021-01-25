<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

printHead();
PrintNavBarAdmin();

?>

<section class="module">
    <div class="container">
        <div class="row">

            <?php

            //get data
            $data = [ 0 => [ "admin_email" => "", "admin_wachtwoord" => "" ]];

            //get template
            $output = file_get_contents("templates/login_admin.html");

            //add extra elements
            //$extra_elements['csrf_token'] = GenerateCSRF( "admin_login.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
            //$output = MergeViewWithExtraElements( $output, $extra_elements );

            print $output;

            ?>

        </div>
    </div>
</section>
