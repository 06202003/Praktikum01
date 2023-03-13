<?php
$deleteCommand = filter_input(INPUT_GET,'cmd');
if(isset($deleteCommand) && $deleteCommand = 'del'){
    $genreId = filter_input(INPUT_GET,'gid');
    $results = deleteGenreFromDb($genreId);
    if($results){
        echo '
        <div>
            Data Successfully added
        </div>
    ';
    }else{
        echo '
        <div>
            Failed to add data
        </div>
    ';
    }
}

$submitPressed = filter_input(INPUT_POST,'btnSave');
if(isset($submitPressed)){
    $name = filter_input(INPUT_POST,'textName');
    if(trim($name) == ''){
        echo '
        <div class="text-center">
            Please provide with a valid name
        </div>
        ';
    }else{
        $results = addNewGenre($name);
        if($results){
            echo '
            <div>
                Data Successfully added
            </div>
        ';
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

<div class="container text-center mt-4" style="height:auto">
<div class="row d-flex text-start justify-content-center my-3 align-items-center">
<div class="col-md-10">
            <div class="table-responsive">        
                <table class="table table-hover  table-striped table-bordered border-danger table-sm" id="genre">            
                    <thead>
                        <tr>
                            <th class=" text-center" scope="col">ID</th>
                            <th class=" text-center" scope="col">NAME</th>
                            <th class=" text-center" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $results = fetchGenreFromDb();
                        foreach($results as $genre ){
                            echo '<tr>';
                            echo '<td>'. $genre['id'] . '</td>';
                            echo '<td>'. $genre['name'] . '</td>';
                            echo '<td>
                                <button type="button" class="btn btn-warning" onclick="editGenre('.$genre['id'].')"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteGenre('.$genre['id'].')"><i class="fa-solid fa-trash"></i></button>
                            </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
<div class="col-md-2">
<h1 class="text-center">Tambah Data</h1>
        <form method="post">
            <div class="mb-3">
                <label for="namaGenre" class="form-label">Genre Name</label>
                <input type="text" class="form-control" name="textName" id="namaGenre" maxlength="45" required autofocus placeholder="Genre Name">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btnSave">Save Data</button>
        </form>
    </div>
    
</div>

    <div class="row d-flex justify-content-center mb-5 mb-3">
       </div>
</div>
<script src="script/genre_index.js"></script>