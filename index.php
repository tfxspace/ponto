<?php
// Replace these credentials with your own
$servername = "localhost";  // Server where your MySQL database is hosted
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "ponto";    // Your MySQL database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['type'])) {
    if ($_GET['type'] == "in") {
        $conn->query("INSERT INTO `timetable` (`id`, `date`, `type`) VALUES (NULL, NOW(), 'in')");
        header("Refresh:0; url=index.php");
    } else {
        $conn->query("INSERT INTO `timetable` (`id`, `date`, `type`) VALUES (NULL, NOW(), 'out')");
        header("Refresh:0; url=index.php");
    }
}

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
    LIMIT 0,5
';

$sql1 = "SELECT type FROM `timetable` ORDER BY `timetable`.`date` DESC LIMIT 0,1";


$result = $conn->query($sql);
$result1 = $conn->query($sql1);


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
            <div class="row p-2">
                <?php
                $row1 = $result1->fetch_assoc();
                if ($row1["type"] == "out") { ?>
                    <a href="index.php?type=in" class="btn btn-success btn-lg px-4 rounded-pill">
                        Punch in <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                <?php } else { ?>
                    <a href="index.php?type=out" class="btn btn-danger btn-lg px-4 rounded-pill">
                        Punch out <i class="bi bi-box-arrow-in-left"></i>
                    </a>
                <?php } ?>

            </div>
            <h5>Latest logs:</h5>
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
            <a href="#">See more</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>