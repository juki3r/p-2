<style>
    #logo{
        width: 130px;
        height: 100;
    }
    
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark p-0" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand p-0" href="index.php">
    <img src="../assets/images/logo.jpg" alt="" id="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php if($_SESSION['usertype'] == 'investor'){
             echo '<a class="nav-link" href="index.php">CLIENTS</a>';
             }else{ 
              echo '<a class="nav-link" href="index.php">ADD</a>';
              } 
              ?>
        </li>
        <li class="nav-item">
          <?php if($_SESSION['usertype'] == 'investor'){
             echo '<a class="nav-link" href="pisowifi.php">PISOWIFI</a>';
             }else{ 
              echo '<a class="nav-link" href="view.php">VIEW</a>';
              } 
              ?>
        </li>
      </ul>
    </div>
    <a href="logout.php" class="float-end px-2 text-danger">Logout</a>
  </div>
</nav>

