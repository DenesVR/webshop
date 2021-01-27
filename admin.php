<?php

require_once "lib/autoload.php";

printHead();
include 'nav_admin.php';
//PrintNavBarAdmin();


if ($_SESSION['user']['cus_admin'] != 1) {
    echo '<section class="module">
    <div class="container">
        <div class="row">



    <div class="col-sm-6">
            <p>U hebt geen toegang!</p>
        </div>
    </div>
    </div>
</section>';
}

elseif ($_SESSION['user']['cus_admin'] = 1) {

echo ' <section class="module">
    <div class="container">
        <div class="row multi-columns-row">
            <div class="col-sm-10">';


    //get data
    $data = GetData("select * from producten");

    //get template
    $template = file_get_contents("templates/products_admin.html");

    //merge
    $output = MergeViewWithData($template, $data);
    print $output;


    echo ' </div>
        </div>
    </div>
</section>';

}