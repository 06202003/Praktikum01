<?php 
    $editedId = filter_input(INPUT_GET,'gid');
    if(isset($editedId)){
        $genre = fetchOneGenre($editedId);
    }
    $updatePressed = filter_input(INPUT_POST,'btnUpdate');
    if(isset($updatePressed)){
        $name = filter_input(INPUT_POST,'textName');
        if(trim($name) == ''){
            echo '
            <div class="text-center">
                Please provide with a valid name
            </div>
            ';
        }else{
            $results = updateGenreToDb($genre['id'],$name);
            if($results){
                header('location:index.php?menu=genre');
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
            <form method="post">
            <div class="mb-3">
                    <label for="idGenre" class="form-label">Genre ID</label>
                    <input type="text" class="form-control" id="idGenre" maxlength="45"   placeholder="Genre ID" readonly value="<?php echo($genre['id']); ?>">
                </div>
                <div class="mb-3">
                    <label for="namaGenre" class="form-label">Genre Name</label>
                    <input type="text" class="form-control" name="textName" id="namaGenre" maxlength="45" required autofocus value="<?php echo($genre['name']); ?>" placeholder="Genre Name">
                </div>
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update Data</button>
            </form>
        </div>
    </div>
</div>