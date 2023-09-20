<?php
include 'core/functions.php';
include 'inc/header.php';
include 'inc/nav.php';
if(!isset($_SESSION['auth'])){
    header("location:login.php");
    die;
}

?>
<div class="text-center">
<h1>All users that have registered and saved in csv file</h1>
</div>
<br>
<div class="container">
<form method="GET" class="form-inline p-4 my-5" action="">
    <input class="form-control" type="text" name="search" placeholder="Search">
    <button class="btn-danger" type="submit">Search</button>
</form>
</div>
<br>
<div class="container">
<?php
// Function to sanitize user input

// Read and sanitize search query
$search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';

// Open the CSV file
$file = fopen('handlers/user.csv', 'r');

// Create the table structure
echo '<table class="table table-bordered table-striped">';

// Read and display the table header
$header = fgetcsv($file,1000,",");
echo "<thead>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>ID</th>
    <th>Password</th>
    </tr>
    <thead>";
echo '<tr>';
foreach ($header as $column) {
    echo "<th>$column</th>";
}
echo '</tr>';

// Read and display the table rows
while (($row = fgetcsv($file)) !== false) {
    // If search query is provided, skip rows that don't match the query
    if (!empty($search) && !in_array($search, $row)) {
       continue;
    }
    echo '<tr>';
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}

// Close the CSV file
fclose($file);

// Close the table structure
echo '</table>';
?>
</div>