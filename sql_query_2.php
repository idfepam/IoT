<?php
include 'connector.php';
try {
    if (isset($_GET['start-year'])) {
        $startYear = $_GET['start-year'];
    } else {
        $startYear = null;
    }
    if (isset($_GET['end-year'])) {
        $endYear = $_GET['end-year'];
    } else {
        $endYear = null;
    }
    
    if ($startYear && $endYear && $startYear <= $endYear) {
        $stmt = $dbh->prepare("SELECT literature.name as 'Writing', 
                                literature.year as 'Year', 
                                literature.ISBN, 
                                literature.QUANTITY as 'Count', 
                                literature.LITERATE as 'Type' 
                            FROM literature 
                            WHERE literature.year BETWEEN :start_year AND :end_year");

        $stmt->bindParam(':start_year', $_GET['start-year'], PDO::PARAM_STR);
        $stmt->bindParam(':end_year', $_GET['end-year'], PDO::PARAM_STR);
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'Please enter a valid range';
        die();
    }

} 
catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
