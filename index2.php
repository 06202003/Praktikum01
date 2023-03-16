<?php
  $uploadPressed = filter_input(INPUT_POST,'btnUpload');
  if(isset($uploadPressed)){
    $fileName = filter_input(INPUT_POST,'txtFileName');
    $targetDir = 'uploads/';
    $fileExtension = pathinfo($_FILES['txtFile']['name'],PATHINFO_EXTENSION);
    $fileUploadPath = $targetDir.$fileName.'.'.$fileExtension;
    if($_FILES['txtFile']['size']>1024*8192){
        echo '<div>Uploaded file exceed 8MB</div>';
    }else{
        move_uploaded_file($_FILES['txtFile']['tmp_name'],$fileUploadPath);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Kelompok">
    <title>PHPProg</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <form method="post" enctype="multipart/form-data">
                   <fieldset>
                        <legend>Upload Image</legend>
                        <input type="text" class="form-control my-3" name="txtFileName" placeholder="Upload File Name">
                        <input type="file" class="form-control my-3" name="txtFile" accept="image/*">
                        <button type="submit" class="btn btn-dark w-100 text-warning" name="btnUpload">Upload File to Server</button>
                   </fieldset>
                </form>
            </div>
        </div>
    </div>
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