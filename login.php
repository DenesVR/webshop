<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//printNavbar();
include 'nav.php';
?>

<section class="module">
    <div class="container">
        <div class="row">

        <?php

        foreach ( $msgs as $msg )
        {
            print '<div class="msgs alert alert-success">' . $msg . '</div>';
        }

        //get data
        $data = [ 0 => [ "cus_email" => "", "cus_wachtwoord" => "" ]];

        //get template
        $output = file_get_contents("templates/login.html");

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );

        print $output;
        ?>

        </div>
    </div>
</section>