<?php
include 'connector.php';

$filterType = $_GET['filter'];

if ($filterType == 'publisher') {
    include 'sql_query_1.php';
    echo "<table>";
    echo "<tr><th>Book</th><th>Year</th><th>ISBN</th><th>Count</th><th>Type</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . ($row['Book']) . "</td>";
        echo "<td>" . ($row['Year']) . "</td>";
        echo "<td>" . ($row['ISBN']) . "</td>";
        echo "<td>" . ($row['Count']) . "</td>";
        echo "<td>" . ($row['Type']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
else if ($filterType == 'year') {
    include 'sql_query_2.php';
    echo "<table>";
    echo "<tr><th>Writing</th><th>Year</th><th>ISBN</th><th>Count</th><th>Type</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . ($row['Writing']) . "</td>";
        echo "<td>" . ($row['Year']) . "</td>";
        echo "<td>" . ($row['ISBN']) . "</td>";
        echo "<td>" . ($row['Count']) . "</td>";
        echo "<td>" . ($row['Type']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else if ($filterType == 'author') {
    include 'sql_query_3.php';
    echo "<table>";
    echo "<tr><th>Author</th><th>Book</th><th>Year</th><th>ISBN</th><th>Count</th><th>Type</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . ($row['Author']) . "</td>";
        echo "<td>" . ($row['Book']) . "</td>";
        echo "<td>" . ($row['Year']) . "</td>";
        echo "<td>" . ($row['ISBN']) . "</td>";
        echo "<td>" . ($row['Count']) . "</td>";
        echo "<td>" . ($row['Type']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
