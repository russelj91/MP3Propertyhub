<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbarbg">
  <div class="container">
  <a class="navbar-brand order-0 d-none d-lg-block" href="index.php">
  <img src="./prop.png" class="img-fluid">
</a>

    <button class="navbar-toggler mb-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse order-1" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link fw-bold" href="index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="property">Properties</a>
        </li>
        <?php if(isset($_SESSION['uemail'])) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold btn btn-outline-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dashboard
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           
            <a class="dropdown-item fw-bold" href="feature">Your Listing</a>
            <a class="dropdown-item fw-bold" href="submitproperty">Add Listing</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item fw-bold" href="logout.php">Logout</a>
          </div>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="login">Login</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
