<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

printHead();
PrintNavBarAdmin();
?>
    <section class="module">
        <div class="container">
            <div class="row">

                <?php
                PrintAdd();


                ?>


            </div>
        </div>
    </section>
