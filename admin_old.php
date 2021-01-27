<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

printHead();
include 'nav_admin.php';
//PrintNavBarAdmin();

?>

<section class="module">
    <div class="container">
        <div class="row multi-columns-row">
            <div class="col-sm-10">

                <?php
                //get data
                $data = GetData( "select * from producten" );

                //get template
                $template = file_get_contents("templates/products_admin.html");

                //merge
                $output = MergeViewWithData( $template, $data );
                print $output;

                ?>

            </div>
        </div>
    </div>
</section>
