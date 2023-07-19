<? include('connections.php'); ?>
<?php

// SQL query to select data from a table
$sql = "SELECT * FROM timetable"; // Replace 'your_table_name' with the actual table name

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        // Do something with the data, for example, print it
        echo "ID: " . $row["date"] . " | Name: " . $row["type"] . "<br>";
    }
} else {
    echo "No data found in the table.";
}
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
                <a href="#" class="btn btn-success btn-lg px-4 rounded-pill">
                    Punch in <i class="bi bi-box-arrow-in-right"></i>
                </a>
            </div>
            <div class="row p-2">
                <a href="#" class="btn btn-danger btn-lg px-4 rounded-pill">
                    Punch out <i class="bi bi-box-arrow-in-left"></i>
                </a>
            </div>
            <h5>Latest logs:</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <td>2023/07/18 18:06</td>
                        <td><i class="bi bi-box-arrow-in-left"></i> out</td>
                    </tr>
                    <tr>
                        <td>2023/07/18 13:52</td>
                        <td><i class="bi bi-box-arrow-in-right"></i> in</td>
                    </tr>
                    <tr>
                        <td>2023/07/18 12:41</td>
                        <td><i class="bi bi-box-arrow-in-left"></i> out</td>
                    </tr>
                    <tr>
                        <td>2023/07/18 08:58</td>
                        <td><i class="bi bi-box-arrow-in-right"></i> in</td>
                    </tr>
                    <tr>
                        <td>2023/07/17 18:01</td>
                        <td><i class="bi bi-box-arrow-in-left"></i> out</td>
                    </tr>
                    <tr>
                        <td>2023/07/17 14:01</td>
                        <td><i class="bi bi-box-arrow-in-right"></i> in</td>
                    </tr>
                    <tr>
                        <td>2023/07/17 12:34</td>
                        <td><i class="bi bi-box-arrow-in-left"></i> out</td>
                    </tr>
                    <tr>
                        <td>2023/07/17 08:41</td>
                        <td><i class="bi bi-box-arrow-in-right"></i> in</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">See more</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>