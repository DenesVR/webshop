<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button
                class="navbar-toggle"
                type="button"
                data-toggle="collapse"
                data-target="#custom-collapse"
            >
              <span class="sr-only">Toggle navigation</span
              ><span class="icon-bar"></span><span class="icon-bar"></span
                ><span class="icon-bar"></span></button
            ><a class="navbar-brand" href="#">Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php  if( $_SESSION['user']['cus_admin'] != 1) {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php">Go to Website</a></li>';
                } elseif ($_SESSION['user']['cus_admin'] = 1) {
                    echo '<li class="nav-item"><a class="nav-link" href="admin.php">Products</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="add.php">Add Product</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="customer.php">Customers</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#">Orders</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="index.php">Go to Website</a></li>';
                } ?>

                </li>
            </ul>
        </div>
    </div>
</nav>

