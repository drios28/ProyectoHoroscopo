



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Horoscopo Online</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=New+Rocker&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="shortcut icon" href="assets/horoscopo.ico" />
  

</head>

<body>

  <header class="encabezado">
    <nav class="cabecera">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#principal">Información</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="form_tradicional.php">Editar predicciones</a>
        </li>

      </ul>
    </nav>

    <div class="nombre">
      <h1>Horóscopo Online</h1>
      <h2>¡Descubre las predicciones de tu signo en el horoscopo tradicional y chino!</h2>
      <button class="boton" role="button"><a href="form_datos.php">Quiero mi predicción</a></button>
    </div>
  </header>

  <section class="principal" id="principal">
    <div class="carousel-container">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/tradicional.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/img/chino.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="content-container">
      <p>¡Bienvenido al Horoscopo Online! Para poder obtener su predicción es que haga click en "Quiero mi predicción". A partir de ahí deberá rellenar sus datos y recibirá sus predicciones.<br><br></p>
    </div>
  </section>

<?php
include_once("footer.php")
?>

  <script src="js/bootstrap.min.js"></script>
</body>

</html>