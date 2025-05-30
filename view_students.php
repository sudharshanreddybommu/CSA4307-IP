<!-- Save this as view_students.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Records</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #e0c3fc, #8ec5fc);
      padding: 30px;
      text-align: center;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }

    table {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
    }

    th {
      background-color: #6a11cb;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .button-container {
      margin-top: 30px;
    }

    .button {
      background-color: #6a11cb;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      margin: 5px;
      text-decoration: none;
      font-size: 16px;
    }

    .button:hover {
      background-color: #512e9b;
    }
  </style>
</head>
<body>
  <h2>Student Records</h2>

  <?php
  // Database connection
  $conn = new mysqli("localhost", "root", "", "student_db");

  if ($conn->connect_error) {
    die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
  }

  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Roll Number</th>
              <th>CGPA</th>
              <th>Course</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["name"] . "</td>
              <td>" . $row["roll"] . "</td>
              <td>" . $row["cgpa"] . "</td>
              <td>" . $row["course"] . "</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "<p>No records found.</p>";
  }

  $conn->close();
  ?>

  <div class="button-container">
    <a class="button" href="index.html">🏠 Home</a>
    <a class="button" href="add_student.html">➕ Add Student</a>
  </div>
</body>
</html>
