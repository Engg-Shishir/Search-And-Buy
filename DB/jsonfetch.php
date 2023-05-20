<?php
// Assuming you have already established a database connection

// Prepare the SQL statement
$conn = mysqli_connect("localhost", "root", "", "advance");
$sql = "SELECT json_data FROM json_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retrieve the JSON data from the result
    $row = $result->fetch_array();
    $jsonData = $row['json_data'];
    
    // Decode the JSON data into an associative array
    $jsonObject = json_decode($jsonData);

    if (is_object($jsonObject) || is_array($jsonObject)) {
      // Access the values from the JSON object
      foreach ($jsonObject as $key => $value) {
          echo $key . ": " . $value . "<br>";
      }
  } else {
      echo "Invalid JSON string.";
  }

} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>


<?php
$jsonData = '[{"name":"shishir"},{"age":28}]';

// Decode the JSON data into an associative array
$dataArray = json_decode($jsonData, true);

// Loop through the array and print all the values
foreach ($dataArray as $item) {
    foreach ($item as $key => $value) {
        // echo $key . ": " . $value . "<br>";
    }
}
?>
