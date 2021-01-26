<?php
//error_reporting( E_ALL );
//ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//printNavbar();
include 'nav.php';
?>

        <section class="module-small">
            <div class="container">
                <div class="row multi-columns-row">

                    <?php
                    //get data
                    $data = GetData( "select * from producten" );

                    //get template
                    $template = file_get_contents("templates/product_column.html");

                    //merge
                    $output = MergeViewWithData( $template, $data );
                    print $output;
                    ?>


                </div>
            </div>
        </section>

