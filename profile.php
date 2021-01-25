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
$data = GetData( "select * from customer where cus_id=" . $_SESSION['user']['cus_id'] );

//get template
$output = file_get_contents("templates/profile.html");

//add extra elements
$extra_elements['csrf_token'] = GenerateCSRF( "profile.php"  );

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