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
<div class="container text-center mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
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