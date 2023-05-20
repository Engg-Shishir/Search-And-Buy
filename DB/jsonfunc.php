
<!-- Insert in seperate row -->

<?php
// Assuming you have already established a database connection
$conn = mysqli_connect("localhost", "root", "", "advance");
$jsonData = '[{"name":"shishir"},{"age":28}]';
$dataArray = json_decode($jsonData, true);

// Iterate over each item in the array and insert into the database
foreach ($dataArray as $item) {
    $jsonValue = json_encode($item);
    
    // Prepare the SQL statement
    $sql = "INSERT INTO json_table (json_data) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $jsonValue);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
















<!-- Insert In single row -->

<?php
// Assuming you have already established a database connection
$conn = mysqli_connect("localhost", "root", "", "advance");
$jsonData = '[{"name":"shishir"},{"age":28}]';
$jsonValue = json_encode($jsonData);

// Prepare the SQL statement
$sql = "INSERT INTO json_table (json_data) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jsonValue);

// Execute the statement
if ($stmt->execute()) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>
