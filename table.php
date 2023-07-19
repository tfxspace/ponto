<?php
include('connections.php');


$sql = '
SELECT
    DATE_FORMAT(date, "%Y/%m/%d %H:%i") date, 
    IF(
        type="in",
        concat("<i class=\\"bi bi-box-arrow-in-right\\"></i> ",type),
        concat("<i class=\\"bi bi-box-arrow-in-left\\"></i> ",type)
    ) type
    FROM timetable
    ORDER BY date DESC
    LIMIT 0,50
';

$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ponto. - personal punch in manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            <h1><i class="bi bi-balloon-fill"></i> ponto.</h1>
            <h5>Logs:</h5>
            <table class="table">
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["date"] . "</td><td>" . $row["type"] . "</td>";
                        }
                    } else {
                        echo "No data found in the table.";
                    }
                    ?>
                </tbody>
            </table>
            <a href="index.php">Go back</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>