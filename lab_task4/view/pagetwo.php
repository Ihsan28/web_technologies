<?php
session_start();

include('../control/updatecheck.php');


if (empty($_SESSION["username"])) // Destroying All Sessions
{
  header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>

<body>
  <h2>Profile Page</h2>

  Hii, <h3><?php echo $_SESSION["username"]; ?></h3>
  <br>Your Profile Page.
  <br><br>
  <?php
  $radio1 = $radio2 = $radio3 = "";
  $checkbox1 = $checkbox2 = $checkbox3 = "";
  $firstname = $password = $email = $gender = $address = $dob = $profession = $interests = "";
  $connection = new db();
  $conobj = $connection->OpenCon();

  $userQuery = $connection->CheckUser1($conobj, "student", $_SESSION["username"]);

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while ($row = $userQuery->fetch_assoc()) {
      $firstname = $row["firstname"];
      $email = $row["email"];
      $password = $row["password"];
      $address = $row["address"];
      $dob = $row["dob"];
      $gender = $row["gender"];
      $profession = $row["profession"];
      $interests=$row["interests"];      //.",".$row["interests2"].",".$row["interests3"];
      $datetime = strtotime($dob);
      $format_date = date("Y-m-d", $datetime);

      $pattern ="/[,]/";
      $myarray=preg_split($pattern,$interests);

      if ($row["gender"] == "female") {
        $radio1 = "checked";
      } else if ($row["gender"] == "male") {
        $radio2 = "checked";
      } else {
        $radio3 = "checked";
      }

      // if (in_array("music",$myarray) {
      //   $checkbox1 = "checked";
      //   //$interests = $row["interests1"];
      // } 
      // else if (in_array("sport",$myarray)) {
      //   $checkbox2 = "checked";
      //   if ($interests === "") {
      //     //$interests = $row["interests2"];
      //   } else {
      //     //$interests .= ", " . $row["interests2"];
      //   }
      // } 
      // else if (in_array("other",$myarray)) {
      //   $checkbox3 = "checked";
      //   if ($interests === "") {
      //     //$interests = $row["interests3"];
      //   } else {
      //     //$interests .= ", " . $row["interests3"];
      //   }
      // }
    }
  } else {
    echo "0 results";
  }



  ?>
  <form action='' method='post'>
    firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>">
    <br>
    email : <input type='text' name='email' value="<?php echo $email; ?>">
    <br>
    password : <input type='text' name='password' value="<?php echo $password; ?>">
    <br>
    address : <input type='text' name='address' value="<?php echo $address; ?>">
    <br>
    date of birth : <input type='date' name='dob' value="<?php echo $format_date; ?>">
    <br>
    profession :
    <input name="profession" list="profession" value="<?php echo $profession; ?>">
    <datalist id="profession">
      <option value="Student">
      <option value="Teacher">
      <option value="Staff">
      <option value="Security">
      <option value="Safari">
    </datalist>
    <br>
    <!-- interests : <input type='text' name='interests' value="<?php echo $interests; ?>"> -->
    interests:
    <br>
    <input type="checkbox"  name="interests" value="music" <?php echo $checkbox1; ?>>
    <label for="interests">music</label><br>
    <input type="checkbox" name="interests" value="sports" <?php echo $checkbox2; ?>>
    <label for="interests">sports</label><br>
    <input type="checkbox" name="interests" value="traveling" <?php echo $checkbox3; ?>>
    <label for="interests">traveling</label><br>
    <br>
    Gender:
    <input type='radio' name='gender' value='female' <?php echo $radio1; ?>>Female
    <input type='radio' name='gender' value='male' <?php echo $radio2; ?>>Male
    <input type='radio' name='gender' value='other' <?php echo $radio3; ?>> Other

    <input name='update' type='submit' value='Update'>

    <?php echo $error; ?>
    <br>

    <a href="../view/pageone.php">Back </a>

    <a href="../control/logout.php"> logout</a>

</body>

</html>