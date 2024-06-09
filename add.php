<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Subscriber Portal | Add Subscriber</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

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
    <div class="main-content">

   
    <h1 class="blue-text">Subscriber Portal</h1>
    <h2 class="yellow-text">Join our community!</h2>
    <h3 class="red-text">Add Subscriber</h3>
    
    <form method="post" action="add.php"> 

      <p><input type="text" name="subscriber_name" placeholder="Your Name" required></p>
    <p><input type="email" name="subscriber_email" placeholder="Your Email" required></p>
    <p><span class="interest-label">Interests:</span></p>

      <p><input type="checkbox" name="subscriber_interests[]" value="Music"> Music</p>
      <p><input type="checkbox" name="subscriber_interests[]" value="Sports"> Sports</p>
      <p><input type="checkbox" name="subscriber_interests[]" value=" Reading"> Reading</p>
      <p><input type="checkbox" name="subscriber_interests[]" value="Traveling ">Traveling</p>
      <p><input type="checkbox" name="subscriber_interests[]" value=" Coding "> Coding</p>
      <p><input type="checkbox" name="subscriber_interests[]" value="Movies">Movies</p>
      <input type="submit" name="Submit" value="Submit">
    </form>
    <?php
    //IM  Including validation file 
    include ('validate.php');
        //IM  Including database file only once because we do not want the databse connection to happen multiply times 

    require_once ('database.php');

    // create]ing validation object
    $validator = new Validate();

    //from the dictionary
   // $_POST - This is a superglobal array in PHP that contains data sent to the script via HTTP POST method.


    if (!empty($_POST['Submit'])) { // checking  if the form has been submitted
      $name = $_POST['subscriber_name']; // getting the value from the form field with the attribute 'name'
      $email = $_POST['subscriber_email'];

      if (isset($_POST['subscriber_interests'])) { //cheking if Any of chatboxes are selected
        $interests = $_POST['subscriber_interests'];
        } else {
        $interests = []; //if not, leaving the array empty
        }
    

      // Validate form data

      // chekEmpty is a method from the 'validate' class that passes the whple array that contains all the submitted form data using $_POST
      $validation_message = $validator->checkEmpty($_POST); //checking if any required fields are empty
      $is_valid_email = $validator->validEmail($_POST['subscriber_email']); //cheking the email format

      if ($validation_message != null) { //if the are any validation mesages
        echo $validation_message; //if there are, print them
      } elseif (!$is_valid_email) { //check if email is valid
        echo '<p>Please provide a valid email.</p>';
      } else { //if all validatation pass
        // Convert interests array to a comma-separated string
        $interests_string = implode(", ", $interests); // then the system converts the interests array to a comma-separated string



        // Inserting data into database
        $result = $database->insertData($name, $email, $interests_string); //inserting data in the database
        if ($result) { //if the insertion was sucessful
          echo "<p>Data added successfully.</p>";
          echo "<a href='view.php'>View Result</a>";
        } else {
          echo "<p>There was an error adding the data.</p>";
          echo "Error: " . $database->connection->error;
        }
      }
    }
    ?>
     </div>
  </main>
  <footer>
    <p>&copy; 2024 Subscriber Portal</p>
  </footer>
</body>
</html>