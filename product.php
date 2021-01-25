<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//printNavbar();
include 'nav.php';
?>

    <div class="main">
        <section class="module">
            <div class="container">

                <?php
                //get data
                if ( ! is_numeric( $_GET['prod_id']) ) die("Ongeldig argument " . $_GET['prod_id'] . " opgegeven");

                $data = GetData( "select * from producten where prod_id=" . $_GET['prod_id'] );

                //get template
                $template = file_get_contents("templates/product_detail.html");

                //merge
                $output = MergeViewWithData( $template, $data );
                print $output;
                ?>




            </div>
        </section>
    </div>
