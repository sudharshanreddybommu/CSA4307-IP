<?php
// Step 1: Connect to MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "student_db";

// Step 2: Create connection
$conn = new mysqli($host, $user, $password, $database);

// Step 3: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 4: Get data from POST
$name = $_POST['name'];
$roll = $_POST['roll'];
$cgpa = $_POST['cgpa'];
$course = $_POST['course'];

// Step 5: Prepare and run insert query
$sql = "INSERT INTO students (name, roll, cgpa, course) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $name, $roll, $cgpa, $course);

if ($stmt->execute()) {
    echo "<h2 style='text-align:center;color:green;'>Student added successfully!</h2>";
    echo "<p style='text-align:center;'><a href='add_student.html'>Add Another</a> | <a href='view_students.php'>View All</a> | <a href='index.html'>Home</a></p>";
} else {
    echo "<h2 style='text-align:center;color:red;'>Error: " . $stmt->error . "</h2>";
}

// Step 6: Close connection
$stmt->close();
$conn->close();
?>
