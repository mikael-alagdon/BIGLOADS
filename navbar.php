<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="index">
    <img src="images/logo.png" alt="" width="50px" height="auto">
    TARELCO I BIGLOADS
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li id="daily" class="nav-item">
        <a class="nav-link" href="daily">DAILY</a>
      </li>
      <li id="monthly" class="nav-item ">
        <a class="nav-link" href="monthly">MONTHLY</a>
      </li>
      <!-- <li id="meter3" class="nav-item ">
        <a class="nav-link" href="#">METER 3</a>
      </li> -->
    </ul>

<div class="btn-group">
  <a type="button" class="btn dropdown-toggle" id="show-user" data-toggle="dropdown" aria-expanded="false">
    <?php echo $_SESSION["currentUser"];?>
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- <button class="dropdown-item" type="button">Action</button>
    <button class="dropdown-item" type="button">Another action</button>
  <div class="dropdown-divider"></div> -->
    <a class="dropdown-item" type="button" href="logout">Logout</a>
  </div>
</div>  
  </div>
     
</nav>