<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo path?>">Foodshala</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo path?>/registration.php">Register <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo path?>/list.php">Menu <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Restaurant</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo path?>/r_login.php">Login</a>
            <a class="dropdown-item" href="<?php echo path?>/item.php">Add Item</a>
            <a class="dropdown-item" href="<?php echo path?>/order_view.php">Order</a>
            <a class="dropdown-item" href="<?php echo path?>/logout.php">Log out</a>
          </div>
        </li>
        <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Customer</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo path?>/c_login.php?nlog=0">Login</a>
            <a class="dropdown-item" href="<?php echo path?>/list.php">Menu</a>
            <a class="dropdown-item" href="<?php echo path?>/cart.php?default=1&del=0">Cart</a>
            <a class="dropdown-item" href="<?php echo path?>/logout.php">Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
