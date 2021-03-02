<!DOCTYPE html>
<html>

<head>
    <title>Registration page</title>
</head>

<body>

    <?php
    $validateName = "";
    $validateEmail = "";
    $validateUsername = "";
    $validatePassword = "";
    $validateConfirmpassword = "";
    $validateBirthdate = "";
    $validateGender = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST["fname"];
        $email = $_REQUEST["email"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $confirmpassword = $_REQUEST["confirmpassword"];
        $gender = $_REQUEST["gender"];
        $birthday = $_REQUEST["birthday"];

        if (empty($name)) {
            $validateName = "you must enter your name";
        } else if (strlen($name) < 5) {
            $validateName = "you must enter minimum 5 letter of your name";
        } else if (!preg_match("/^[0-9a-zA-Z_']@ # & */", $name)) {
            $validateName = "you can only use only ^[a-zA-Z-']@ # & * those characters";
        } else {
            $validateName = "your name is " . $name;
        }

        if (empty($email)) {
            $validateEmail = "you must enter your email";
        } else if (!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $email)) {
            $validateEmail = "invalid email";
        } else {
            $validateEmail = "your email is " . $email;
        }

        if (empty($username)) {
            $validateUsername = "you must enter your user name";
        } else if (strlen($username) < 5) {
            $validateUsername  = "you must enter more than 5 characters of your user name";
        } else {
            $validateUsername = "your user name is " . $username;
        }

        if (empty($password)) {
            $validatePassword = "you must enter your password";
        } elseif (strlen($password) < 8) {
            $validatePassword = "password must contain at least 8 characters";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {
            $validatePassword = "condition  not match";
        } else {
            $validatePassword = "your user password is " . $password;
        }

        if (empty($confirmpassword)) {
            $validateConfirmpassword = "you must enter your confirm password";
        } else if ($confirmpassword === $password) {
            $validateConfirmpassword = "you must match with password";
        } else {
            $validateConfirmpassword = "your user password is matched";
        }

        if (!isset($_REQUEST["gender"])) {
            $validateGender = "select your gender";
        } else {
            $validateGender = "your gender is " . $gender;
        }

        if (empty($birthday)) {
            $validateBirthdate = "Birthdate is required";
        } else {
            $validateBirthdate = "select date is " . $birthday;
        }
    }
    ?>

    <h1>my registration page</h1>
    <form form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <table>
            <tr>
                <td>Your Name :</td>
                <td><input type="text" name="fname" /><?php echo $validateName; ?></td>
                <td></td>
            </tr>

            <tr>
                <td>Your Email :</td>
                <td><input type="text" name="email" /><?php echo $validateEmail; ?></td>
            </tr>
            <tr>
                <td>Your User Name :</td>
                <td><input type="text" name="username" /><?php echo $validateUsername; ?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmpassword" /><?php echo $validatePassword; ?></td>
            </tr>
        </table>
        Your gender:
        <br><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male"> Male </label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female"> Female </label><br>
        <input type="radio" id="others" name="gender" value="others">
        <label for="others"> Others </label><br>
        <?php echo  $validateGender; ?>
        <br>
        Date of birth:
        <br>
        <input type="date" id="birthday" name="birthday"><?php echo $validateBirthdate; ?>
        <br><br>
        <br>
        <input type="submit" value="submit">
        <input type="reset" value="reset">
    </form>
</body>

</html>