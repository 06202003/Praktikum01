<?php
$link = new PDO('mysql:host=localhost;dbname=pwl20222','root','');
$link -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$link -> setAttribute(PDO::ATTR_AUTOCOMMIT,false);

$query = "SELECT id,name FROM genre";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link =null;
?>
<div class="container text-center mt-4" style="height:52.75vh">
    <div class="row d-flex justify-content-center">
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