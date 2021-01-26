<?php
//error_reporting( E_ALL );
//ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//printNavbar();
include 'nav.php';

if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'];
}

if(isset($_GET['prod_id'])) {
    $prod_id = $_GET['prod_id'];
    $prod_aantal = $_GET['prod_aantal'];

    if($prod_aantal > 0 && filter_var($prod_aantal, FILTER_VALIDATE_INT)) {
        if(isset($_SESSION['cart'][$prod_id])) {
            $_SESSION['cart'][$prod_id] += $prod_aantal;
        } else {
            $_SESSION['cart'][$prod_id] = $prod_aantal;
        }
    } else {

    }
}


//echo "<pre>";
//print_r($_SESSION['cart']);
//echo "</pre>";
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
