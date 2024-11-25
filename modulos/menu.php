<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="../public/img/insignia.jpeg" alt="Insignia" height="40" width="40" class="me-2">
      <h2 class="mb-0" style="font-size: 1.25rem;">Enrique López Albújar</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php"> Inicio </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="eventos.php">Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listados.php">Lista de invitados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recursos.php">Recursos</a>
        </li>
        <li class="nav-item dropdown">
          <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['usuario']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../servidor/login/logout.php">Salir del sistema</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>