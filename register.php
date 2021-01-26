<?php
//error_reporting( E_ALL );
//ini_set( 'display_errors', 1 );

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
        if ( count($old_post) > 0 )
        {
            $data = [ 0 => [
                "cus_voornaam" => $old_post['cus_voornaam'],
                "cus_achternaam" => $old_post['cus_achternaam'],
                "cus_email" => $old_post['cus_email'],
                "cus_wachtwoord" => $old_post['cus_wachtwoord']
            ]
            ];
        }
        else $data = [ 0 => [ "cus_voornaam" => "", "cus_achternaam" => "", "cus_email" => "", "cus_wachtwoord" => "" ]];

        //get template
        $output = file_get_contents("templates/register.html");

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>

        </div>
    </div>
</section>
