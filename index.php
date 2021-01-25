<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//PrintNavBar();
include 'nav.php';
PrintBanner();
?>
<!--
<div class="main">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Latest Products</h2>
                </div>
            </div>

            <?php
            //get data
            //$data = GetData( "select * from producten limit 4" );

            //get template
           // $template = file_get_contents("templates/product_column.html");

            //merge
            //$output = MergeViewWithData( $template, $data );
            //print $output;


            ?>

        </div>
    </section>
</div>

