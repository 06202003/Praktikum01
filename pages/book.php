<?php
$deletecmd = filter_input(INPUT_GET,'comd');
if(isset($deletecmd) && $deletecmd = 'dele'){
    $ISBNdel = filter_input(INPUT_GET,'idb');
    $results =deleteBookFromDb($ISBNdel);
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
        $results = addNewBook($ISBN,$title,$author,$publisher,$publishYear,$shortDesc,$idGenre);
    }
}


?>
<div class="container text-center mt-3 h-100 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
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
                        <th class=" text-center" scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = fetchJoinFromDb();
                    foreach($result as $book ){
                        echo '<tr>';
                        echo '<td>'. $book['ISBN'] . '</td>';
                        echo '<td class="w-25">'. $book['title'] . '</td>';
                        echo '<td>'. $book['author'] . '</td>';
                        echo '<td>'. $book['publisher'] . '</td>';
                        echo '<td>'. $book['publish_year'] . '</td>';
                        echo '<td>'. $book['nama_genre'] . '</td>';
                        echo '<td>
                        <button type="button" class="btn btn-warning" onclick="editBook('.$book['ISBN'].')"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger"  onclick="deleteBook('.$book['ISBN'].')" ><i class="fa-solid fa-trash"></i></button>
                        <script>
                        function deleteBook(idb) {
                            const confirmasi = window.confirm("Are you sure want to delete this data?");
                            if (confirmasi) {
                              window.location = "index.php?menu=book&comd=dele&idb=" + idb;
                            }
                          }
                        </script> 
                        </td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
       </div>
                
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary w-100 my-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Data
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
                <!-- <input type="textarea" class="form-control" name="shortDesc" id="shortDesc" maxlength="300" required autofocus > -->
                <textarea  rows="4" type="textarea" class="form-control" name="shortDesc" id="shortDesc" maxlength="300" required autofocus placeholder="Short Description" >
                </textarea>
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
                    $result = fetchGenreFromDb();
                    foreach($result as $genre ){
                        echo '<option value="'. $genre['id'].'">'.$genre['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary w-100" name="btnSave">Save Data</button>
              
            </div>
        </form>
    
      </div>
      
    </div>
  </div>
</div>
</div>
</div>

<script src="script/book_index.js"></script>