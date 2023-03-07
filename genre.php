<?php
$submitPressed = filter_input(INPUT_POST,'btnSave');
if(isset($submitPressed)){
    $name = filter_input(INPUT_POST,'textName');
    if(trim($name) == ''){
        echo `
        <div class="text-center">
            Please provide with a valid name
        </div>
        `;
    }else{
        $link = createMySQLConnection();
        $query = 'INSERT INTO genre(name) VALUES (?)';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$name);
        if($stmt->execute()){
            $link -> commit();
        }else{
            $link -> rollBack();
        }
        $link =null;
    }
}


$link = createMySQLConnection();

$query = "SELECT id,name FROM genre";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link =null;
?>

<div class="container text-center mt-4" style="height:auto">
<div class="row d-flex text-start justify-content-center my-3">
    <div class="col-md-6">
        <form method="post">
            <div class="mb-3">
                <label for="namaGenre" class="form-label">Genre Name</label>
                <input type="text" class="form-control" name="textName" id="namaGenre" maxlength="45" required autofocus placeholder="Genre Name">
            </div>
            <button type="submit" class="btn btn-primary" name="btnSave">Save Data</button>
        </form>
    </div>
</div>

    <div class="row d-flex justify-content-center mb-5 mb-3">
        <div class="col-md-6">
            <div class="table-responsive">        
                <table class="table table-hover  table-striped table-bordered border-danger table-sm" id="genre">            
                    <thead>
                        <tr>
                            <th class=" text-center" scope="col">ID</th>
                            <th class=" text-center" scope="col">NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $genre ){
                            echo '<tr>';
                            echo '<td>'. $genre['id'] . '</td>';
                            echo '<td>'. $genre['name'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>