<?php
include 'connector.php';
try {
    if (isset($_GET['author'])) {
        $author = $_GET['author'];
    } else {
        $author = null;
    }
    if ($author) {
        $stmt = $dbh->prepare("SELECT author.NAME AS 'Author',
                                        literature.name AS 'Book', 
                                        literature.year AS 'Year', 
                                        literature.ISBN, 
                                        literature.QUANTITY AS 'Count', 
                                        literature.LITERATE AS 'Type' 
                                        
                                    FROM literature
                                    JOIN book_authrs ON literature.ID = book_authrs.FID_BOOK
                                    JOIN author ON book_authrs.FID_AUTH = author.ID
                                    WHERE author.NAME = :author AND 
                                        literature.LITERATE = 'Book'");

        $stmt->bindParam(':author', $_GET['author'], PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'Please enter a valid author name';
        die();
    }
} 
catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>