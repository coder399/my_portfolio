<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "portfolio_db";

// Connect to database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
  
  // Get and clean form data
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $message = $conn->real_escape_string($_POST['message']);

  // Insert into database
  $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
