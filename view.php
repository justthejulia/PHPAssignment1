<?php include_once 'database.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Subscriber Portal | View Subscribers</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <header>

    <nav>
      <a href="add.php">Add Subscriber</a>
      <a href="view.php">View Subscribers</a>
    </nav>

    <div class="logo">
      <img src="images/subscriber_portal_logo.jpg" alt="Logo">
    </div>

  </header>

  <main>
    <h1> Subscriber Portal</h1>

    <h2> Subscribers List</h2>

    <div class = "table-container">
    <table> 
        <tr>
          <th>Name </th> 
          <th>Email </th>

          <th>Interests</th>
        </tr>

        <?php

    $result = $database->fetchData();
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>"; //start a new table row
          echo "<td>".$row['name']."</td>";  //makes a table cell showing the subscirbers name
          echo "<td>".$row['email']."</td>";
          echo "<td>".$row['interests']."</td>";
          echo "</tr>"; //end tje table row
        }

        ?>

      </table>
    </div>
  </main>
  <footer>
    <p>&copy;2024 Subscriber Portal</p>
  </footer>
</body>
</html>
