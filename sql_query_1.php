<?php
include 'connector.php';
try {
    if (isset($_GET['publisher'])) {
        $publisher = $_GET['publisher'];
    } else {
        $publisher = null;
    }
    if($publisher){
        $stmt = $dbh->prepare("SELECT literature.name AS 'Book', 
                                    literature.year AS 'Year', 
                                    literature.ISBN, 
                                    literature.QUANTITY AS 'Count', 
                                    literature.LITERATE AS 'Type'
                                FROM literature
                                WHERE literature.PUBLISHER = :publisher AND 
                                    literature.LITERATE = 'Book'");

        $stmt->bindParam(':publisher', $_GET['publisher'], PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else{
        echo 'Please enter a valid publisher';
        die();
    }
        

} 
catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
