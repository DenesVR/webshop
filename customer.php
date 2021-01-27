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
        <div class="row">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Straat</th>
                    <th scope="col">Huisnr</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>';


    //get data
    $data = GetData("select * from customer");

    //get template
    $template = file_get_contents("templates/customer_admin.html");

    //merge
    $output = MergeViewWithData($template, $data);
    print $output;


    echo '</tbody>
            </table>



        </div>
    </div>
</section>';
}
