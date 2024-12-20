<?php
// Start session (if needed) to validate user or handle access control
session_start();

// Include your database connection file
include("connect.php");


// Check if user is logged in
if ($_SESSION['username'] !== 'janesmith') {
    die('You need to be logged in as admin to use this page.');
}



// Check if the form is submitted to download the CSV
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['leagues_csv'])) {
    // Fetch all leagues from the database
    $query = "SELECT * FROM leagues"; // Adjust the table and column names as needed
    $result = $conn->query($query);

    // Check if there are any leagues to export
    if ($result->num_rows > 0) {
        // Set the headers to trigger a CSV download in the browser
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="leagues.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream to the browser
        $output = fopen('php://output', 'w');

        // Output the column headers as the first row (optional, but helpful for CSVs)
        $columns = $result->fetch_fields();
        $headers = [];
        foreach ($columns as $column) {
            $headers[] = $column->name; // Get column names (field names)
        }
        fputcsv($output, $headers);

        // Output each row of data as a CSV row
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row); // Writes each row as a CSV line
        }

        // Close the output stream (it will be closed automatically at the end of the script)
        fclose($output);
        exit(); // Make sure to stop further code execution after the CSV is sent
    } else {
        echo "No leagues found to export.";
    }

    // Close database connection
    $conn->close();
}

// Check if the form is submitted to download the CSV
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['users_csv'])) {
    // Fetch all leagues from the database
    $query = "SELECT * FROM users"; // Adjust the table and column names as needed
    $result = $conn->query($query);

    // Check if there are any leagues to export
    if ($result->num_rows > 0) {
        // Set the headers to trigger a CSV download in the browser
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="users.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream to the browser
        $output = fopen('php://output', 'w');

        // Output the column headers as the first row (optional, but helpful for CSVs)
        $columns = $result->fetch_fields();
        $headers = [];
        foreach ($columns as $column) {
            $headers[] = $column->name; // Get column names (field names)
        }
        fputcsv($output, $headers);

        // Output each row of data as a CSV row
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row); // Writes each row as a CSV line
        }

        // Close the output stream (it will be closed automatically at the end of the script)
        fclose($output);
        exit(); // Make sure to stop further code execution after the CSV is sent
    } else {
        echo "No leagues found to export.";
    }

    // Close database connection
    $conn->close();
}

// Check if the form is submitted to download the CSV
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['players_csv'])) {
    // Fetch all leagues from the database
    $query = "SELECT * FROM players"; // Adjust the table and column names as needed
    $result = $conn->query($query);

    // Check if there are any leagues to export
    if ($result->num_rows > 0) {
        // Set the headers to trigger a CSV download in the browser
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="players.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream to the browser
        $output = fopen('php://output', 'w');

        // Output the column headers as the first row (optional, but helpful for CSVs)
        $columns = $result->fetch_fields();
        $headers = [];
        foreach ($columns as $column) {
            $headers[] = $column->name; // Get column names (field names)
        }
        fputcsv($output, $headers);

        // Output each row of data as a CSV row
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row); // Writes each row as a CSV line
        }

        // Close the output stream (it will be closed automatically at the end of the script)
        fclose($output);
        exit(); // Make sure to stop further code execution after the CSV is sent
    } else {
        echo "No leagues found to export.";
    }

    // Close database connection
    $conn->close();
}



include ("navbar.html");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fantasy Sports Betting</title>
  <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Inconsolata:wght@200..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="activity-styles.css" /> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <div class="hero">
    <h1>Welcome, 
      <?php echo $_SESSION['fullName']; ?>!</h1>
    </h1>
</div>
    <div class="main-container">
        <h1>Developer Portal</h1>
        <br>
        <h4>Download CSV Data</h4>
        <!-- Form to trigger CSV download -->
        <form action="" method="post">
            <button type="submit" name="leagues_csv" class="btn btn-success">Download Leagues</button>
        </form>
        <form action="" method="post">
            <button type="submit" name="users_csv" class="btn btn-success">Download Users</button>
        </form>
        <form action="" method="post">
            <button type="submit" name="players_csv" class="btn btn-success">Download Players</button>
        </form>

    </div>



</body>
