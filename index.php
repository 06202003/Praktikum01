<?php
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Kelompok">
    <title>BookStudio</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    <section class="backg text-white">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-2">
            <img src="img/bookstudio.png" class="logo" alt="" />
          </div>
          <div class="col-md-4">
            <h2>BookStudio</h2>
            <h5>Universitas Kristen Maranatha</h5>
            <h5>Bandung</h5>
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid me-0">
          <button class="navbar-toggler mx-auto py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="?menu=home"><h5>Home</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?menu=genre"><h5>Genre</h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?menu=book"><h5>Book</h5></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    </section>
    <main>
        <?php
        $navigation = filter_input(INPUT_GET, 'menu');
        switch ($navigation) {
            case 'home':
                include_once 'home.php';
                break;
            case 'genre':
                include_once 'genre.php';
                break;
            case 'book':
                include_once 'book.php';
                break;
            default:
                include_once 'home.php';
                break;
        }
        ?>
    </main>
    <footer class="bg-light text-center text-lg-start " >
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">BookStudio.com</a>
      </div>
      <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#book').DataTable();
            $('#genre').DataTable();
            
        });
    </script>
  </body>
</html>