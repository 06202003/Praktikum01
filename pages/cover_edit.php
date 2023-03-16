<?php 
    $editedISBN = filter_input(INPUT_GET,'isbna');
    if(isset($editedISBN)){
        $book = fetchOneBook($editedISBN);
        $updatePressed = filter_input(INPUT_POST,'btnUpload');
        if(isset($updatePressed)){
            $isbn = filter_input(INPUT_GET,'isbna');
            $fileName = filter_input(INPUT_GET,'isbna');
            $targetDir = 'uploads/';
            $fileExtension = pathinfo($_FILES['txtFile']['name'],PATHINFO_EXTENSION);
            $fileUploadPath = $targetDir.$fileName.'.'.$fileExtension;
            if($_FILES['txtFile']['size']>1024*8192){
                echo '<div>Uploaded file exceed 8MB</div>';
            }else{
                move_uploaded_file($_FILES['txtFile']['tmp_name'],$fileUploadPath);
            }
            
            $results = updateCoverToDb($isbn,$isbn);
            if($results){
                header('location:index.php?menu=book');
            }else{
                echo '
                <div>
                    Failed to add data
                </div>
            ';
                    
            }
        }
    }
?>

<div class="container" style="height:100vh">
   <div class="row d-flex text-start justify-content-center my-3">
        <div class="col-md-6">
            <?php 
                echo '<img src="uploads/'. $book['cover'] . '.jpg" style="width:100%;height:auto;max-width:300px;max-height:300px;">';
            ?>
            <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="Covered" class="form-label">Cover</label>
                <input type="file" class="form-control my-3" name="txtFile" accept="image/jpg">
            </div>
            <button type="submit" class="btn btn-dark w-100 text-warning" name="btnUpload">Upload File to Server</button>
            
            </form>
        </div>
        
       
    </div>
</div>