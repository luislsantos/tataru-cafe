<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deisy Trufas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-general">
    <!--NAVBAR-->
    <?php include 'navbar.php';?>
        
      <div id="carousel-doces" class="carousel slide mx-auto pt-lg-5 pt-md-3 pt-sm-2 w-75">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img\sweets1-md.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Lorem ipsum</h5>
              <p>Dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img\sweets2-md.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Nam vitae ipsum leo</h5>
              <p>Nunc imperdiet hendrerit nisi, id egestas justo eleifend nec.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img\sweets3-md.jpg" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sed massa neque</h5>
              <p>Pellentesque vitae neque consequat, rutrum imperdiet ipsum.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-doces" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-doces" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>