<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

printHead();
include 'nav_admin.php';
//PrintNavBarAdmin();
?>

<section class="module">
    <div class="container">
        <div class="row">

<?php

if ( ! is_numeric( $_GET['prod_id']) ) die("Ongeldig argument " . $_GET['prod_id'] . " opgegeven");

//get data
$data = GetData( "select * from producten where prod_id=" . $_GET['prod_id'] );
$row = $data[0]; //there's only 1 row in data

//add extra elements
$extra_elements['csrf_token'] = GenerateCSRF( "product_admin.php"  );
//$extra_elements['select_land'] = MakeSelect( $fkey = 'img_lan_id',
  //  $value = $row['img_lan_id'] ,
    //$sql = "select lan_id, lan_land from land" );


//get template
$output = file_get_contents("templates/product_admin.html");

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
