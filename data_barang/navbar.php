
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $title == ('admin') ? 'active' : '' ;?>"  href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $title == ('insert') ? 'active' : '' ;?>" href="insert.php">Insert Data</a>
        </li>
      </ul>
      <a href="login.php" class="btn btn-danger me-2"><?=@$_SESSION['user']?> | Logout </a>
    </div>
  </div>
</nav>
