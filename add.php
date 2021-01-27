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
    echo '<section class="module">
        <div class="container">
            <div class="row">';


    PrintAdd();


    echo '</div>
        </div>
    </section>';
}