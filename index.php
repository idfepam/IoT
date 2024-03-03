<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Search Dropdown</title>
</head>
<body>
    <form action="executor.php" method="get">
        <input type="radio" id="filter-publisher" name="filter" value="publisher" checked>
        <label for="filter-publisher">Фільтрувати за видавництвом</label><br>    
            <label for="publisher">Оберіть назву видавництва:</label>
            <select name="publisher" id="publisher" autocomplete = "off">
                <option disabled value="value" selected >Виберіть видавництво</option>
                <?php
                include 'connector.php';
                $stmt = $dbh->prepare("SELECT DISTINCT PUBLISHER FROM literature");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"{$row['PUBLISHER']}\">{$row['PUBLISHER']}</option>";
                }
                ?>
            </select>
            <br>
        <input type="radio" id="filter-year" name="filter" value="year">
        <label for="filter-year">Фільтрувати за роком</label><br>
            <label for="start-year">Оберіть початковий рік:</label>
            <select name="start-year" id="start-year" autocomplete = "off">
                <option disabled value="value" selected >Оберіть початковий рік</option>
                <?php
                    include 'connector.php';
                    $stmt = $dbh->prepare("SELECT DISTINCT YEAR FROM literature");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['YEAR']}\">{$row['YEAR']}</option>";
                    }
                ?>
            </select>
            <label for="end-year">Оберіть кінцевий рік:</label>
            <select name="end-year" id="end-year" autocomplete = "off">
                <option disabled value="value" selected>Оберіть кінцевий рік</option>
                <?php
                    include 'connector.php';
                    $stmt = $dbh->prepare("SELECT DISTINCT YEAR FROM literature");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['YEAR']}\">{$row['YEAR']}</option>";
                    }
                ?>
            </select>
            <br>
        <input type="radio" id="filter-author" name="filter" value="author">
        <label for="filter-author">Фільтрувати за автором</label><br>
            <label for="author">Оберіть автора:</label>
            <select name="author" id="author" value="None" autocomplete = "off">
                <option disabled value="value" selected>Оберіть автора</option>
                <?php
                    include 'connector.php';
                    $stmt = $dbh->prepare("SELECT DISTINCT NAME FROM author");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['NAME']}\">{$row['NAME']}</option>";
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Результати пошуку">
    </form>
</body>
</html>
