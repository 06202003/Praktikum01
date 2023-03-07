<?php
$submitPressed = filter_input(INPUT_POST,'btnSave');
if(isset($submitPressed)){
    $ISBN = filter_input(INPUT_POST,'ISBN');
    $title = filter_input(INPUT_POST,'title');
    $author = filter_input(INPUT_POST,'author');
    $publisher = filter_input(INPUT_POST,'publisher');
    $publishYear = filter_input(INPUT_POST,'publishYear');
    $shortDesc = filter_input(INPUT_POST,'shortDesc');
    $cover = filter_input(INPUT_POST,'cover');
    $idGenre = filter_input(INPUT_POST,'idGenre');
    if(trim($ISBN) == ''||trim($title) == ''||trim($author) == ''||trim($publisher) == ''||trim($shortDesc) == ''||trim($idGenre) == ''){
        echo `
        <div class="text-center">
            Please provide with a valid name
        </div>
        `;
    }else{
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'INSERT INTO book(ISBN,title,author,publisher,publish_year,short_description,genre_id) VALUES (?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$ISBN,PDO::PARAM_STR);
        $stmt->bindParam(2,$title,PDO::PARAM_STR);
        $stmt->bindParam(3,$author,PDO::PARAM_STR);
        $stmt->bindParam(4,$publisher,PDO::PARAM_STR);
        $stmt->bindParam(5,$publishYear,PDO::PARAM_INT);
        $stmt->bindParam(6,$shortDesc,PDO::PARAM_STR);
        $stmt->bindParam(7,$idGenre,PDO::PARAM_INT);
        if($stmt->execute()){
            $link -> commit();
        }else{
            $link -> rollBack();
        }
        $link =null;
    }
}
$link = createMySQLConnection();
$query = "SELECT ISBN,title,author,publisher,publish_year,genre.name AS 'nama_genre' FROM book INNER JOIN genre WHERE book.genre_id = genre.id;";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link =null;

$link = createMySQLConnection();
$query = "SELECT * FROM genre";
$stmt = $link->prepare($query);
$stmt->execute();
$result2 = $stmt->fetchAll();
$link =null;
?>
<div class="container text-center mt-3 h-100 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">    
            <div class="table-responsive">        
                <table class="table table-hover  table-striped table-bordered border-danger table-sm" id="book">
                    <thead>
                    <tr>
                        <th class=" text-center" scope="col">ISBN</th>
                        <th class=" text-center" scope="col">Title</th>
                        <th class=" text-center" scope="col">Author</th>
                        <th class=" text-center" scope="col">Publisher</th>
                        <th class=" text-center" scope="col">Publish Year</th>
                        <th class=" text-center" scope="col">Nama Genre</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($result as $book ){
                        echo '<tr>';
                        echo '<td>'. $book['ISBN'] . '</td>';
                        echo '<td class="w-25">'. $book['title'] . '</td>';
                        echo '<td>'. $book['author'] . '</td>';
                        echo '<td>'. $book['publisher'] . '</td>';
                        echo '<td>'. $book['publish_year'] . '</td>';
                        echo '<td>'. $book['nama_genre'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    <div class="row d-flex text-start justify-content-center my-3">
    <div class="col-md-6">
        <form method="post">
            <div class="mb-3">
                <label for="ISBNNum" class="form-label">ISBN</label>
                <input type="text" class="form-control" name="ISBN" id="ISBNNum" maxlength="13" required autofocus placeholder="ISBN">
            </div>
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="bookTitle" maxlength="100" required autofocus placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="authorBook" class="form-label">Author</label>
                <input type="text" class="form-control" name="author" id="authorBook" maxlength="100" required autofocus placeholder="Author">
            </div>
            <div class="mb-3">
                <label for="bookPublisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" name="publisher" id="bookPublisher" maxlength="100" required autofocus placeholder="Publisher">
            </div>
            <div class="mb-3">
                <label for="pubYear" class="form-label">Publish Year</label>
                <input type="number" class="form-control" name="publishYear" id="pubYear"  required autofocus placeholder="Publish Year">
            </div>
            <div class="mb-3">
                <label for="shortDesc" class="form-label">Short Description</label>
                <input type="textarea" class="form-control" name="shortDesc" id="shortDesc" maxlength="300" required autofocus placeholder="Short Description">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="text" class="form-control" name="cover" id="cover" maxlength="100"  autofocus placeholder="Cover">
            </div>
            <div class="mb-3">
                <label for="IDgenre" class="form-label">Genre Name</label>
                <select class="form-select" name="idGenre" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <?php
                
                    foreach($result2 as $genre ){
                        echo '<option value="'. $genre['id'].'">'.$genre['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnSave">Save Data</button>
        </form>
    </div>
</div>
</div>