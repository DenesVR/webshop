<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "lib/autoload.php";

printHead();
PrintNavBarAdmin();
?>

<section class="module">
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
                </thead
                <tbody>
                <?php
                //get data
                $data = GetData( "select * from customer" );

                //get template
                $template = file_get_contents("templates/customer_admin.html");

                //merge
                $output = MergeViewWithData( $template, $data );
                print $output;

                ?>
                </tbody>
            </table>



        </div>
    </div>
</section>
