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
            ><a class="navbar-brand" href="index.php">ShoeStore</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Account</a>
                    <ul class="dropdown-menu">
                        <?php  if( !$_SESSION['user']) {
                           echo '<li><a href="login.php">Login</a></li>';
                         } if(isset($_SESSION['user'])) {
                            echo '<li><a href="profile.php">Profile</a></li>';
                            echo '<li><a href="orders.php">Orders</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                         } ?>

                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Shop</a>

                  </li> -->
            </ul>
        </div>
    </div>
</nav>