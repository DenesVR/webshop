<?php
//error_reporting( E_ALL );
//ini_set( 'display_errors', 1 );
require_once "lib/autoload.php";

printHead();
//printNavbar();
include 'nav.php';
?>

<div class="main">
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">Checkout</h1>
                </div>
            </div>
            <hr class="divider-w pt-20" />
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-border checkout-table">
                        <tbody>
                        <tr>
                            <th class="hidden-xs">Item</th>
                            <th>Description</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>

                        <?php

                        foreach ($_SESSION['cart'] as $key => $val) {
                            //$result = ExecuteSQL("SELECT * FROM producten WHERE prod_id='$key'");
                            $data = GetData( "select * from producten where prod_id='$key'" );

                            //get template
                            $template = file_get_contents("templates/shopping_cart.html");

                            //merge
                            $output = MergeViewWithData( $template, $data );
                            print $output;
                        }


                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <!--
            <div class="col-sm-3 col-sm-offset-3">
                <div class="form-group">
                    <button
                        class="btn btn-block btn-round btn-d pull-right"
                        type="submit"
                    >
                        Update Cart
                    </button>
                </div>
            </div>
            -->
        </div>
        <hr class="divider-w pt-20" />
        <div class="row mt-70">
            <div class="col-sm-3 col-sm-offset-8">
                <div class="shop-Cart-totalbox">
                    <h4 class="font-alt">Cart Totals</h4>
                    <table
                        class="table table-striped table-border checkout-table"
                    >
                        <tbody>
                        <tr class="shop-Cart-totalprice">
                            <th>Total :</th>
                            <td>€</td>
                        </tr>
                        </tbody>
                    </table>
                    <button
                        class="btn btn-lg btn-block btn-round btn-d"
                        type="submit">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>





