<?php 
    function fetchJoinFromDb(){
        $link = createMySQLConnection();
        $query = "SELECT ISBN,title,author,publisher,publish_year,genre.name AS 'nama_genre' FROM book INNER JOIN genre WHERE book.genre_id = genre.id;";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link =null;
        return $result;
    }
    function fetchBookFromDb(){
        $link = createMySQLConnection();
        $query = "SELECT id,name FROM genre WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result2 = $stmt->fetchAll();
        $link =null;
        return $result2;
    }
    function fetchBook2FromDb($editedISBN){
        $link = createMySQLConnection();
        $query = "SELECT * FROM genre WHERE ";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result2 = $stmt->fetchAll();
        $link =null;
        return $result2;
    }
    function fetchOneBook($isbn){
        $link = createMySQLConnection();
        $query = "SELECT ISBN,title,author,publisher,publish_year,short_description,genre_id  FROM book WHERE ISBN = ?;";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$isbn);
        $stmt->execute();
        $results = $stmt->fetch();
        $link =null;
        return $results;
    }
    function fetchOneBook2(){
        $link = createMySQLConnection();
        $query = "SELECT COUNT(ISBN) as Total FROM book ";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link =null;
        return $result;
    }
    function addNewBook($newISBN,$newTitle,$newAuthor,$newPublisher,$newPublishYear,$newShortDescription,$newGenreId): int{
        $result = 0;
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'INSERT INTO book(ISBN,title,author,publisher,publish_year,short_description,genre_id) VALUES (?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$newISBN,PDO::PARAM_STR);
        $stmt->bindParam(2,$newTitle,PDO::PARAM_STR);
        $stmt->bindParam(3,$newAuthor,PDO::PARAM_STR);
        $stmt->bindParam(4,$newPublisher,PDO::PARAM_STR);
        $stmt->bindParam(5,$newPublishYear,PDO::PARAM_INT);
        $stmt->bindParam(6,$newShortDescription,PDO::PARAM_STR);
        $stmt->bindParam(7,$newGenreId,PDO::PARAM_INT);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
    function updateBookToDb($ISBN,$newTitle,$newAuthor,$newPublisher,$newPublishYear,$newShortDescription,$newGenreId){
        $result = 0;
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'UPDATE book SET title = ?,author = ?,publisher = ?,publish_year = ?,short_description = ?,genre_id = ? WHERE ISBN = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$newTitle,PDO::PARAM_STR);
        $stmt->bindParam(2,$newAuthor,PDO::PARAM_STR);
        $stmt->bindParam(3,$newPublisher,PDO::PARAM_STR);
        $stmt->bindParam(4,$newPublishYear,PDO::PARAM_INT);
        $stmt->bindParam(5,$newShortDescription,PDO::PARAM_STR);
        $stmt->bindParam(6,$newGenreId,PDO::PARAM_INT);
        $stmt->bindParam(7,$ISBN,PDO::PARAM_STR);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
    
    function deleteBookFromDb($isbn){
        $result = 0;
        $link = createMySQLConnection();
        $link->beginTransaction();
        $query = 'DELETE FROM book WHERE ISBN = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$isbn);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
?>