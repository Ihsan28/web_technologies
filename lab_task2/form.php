<!DOCTYPE html>
<html>
<head>
<title> Registration page</title>
</head>
<body>
<h1>Registration Page</h1>

<form>
<table>
<?php
$validateName = "";
$validateEmail = "";
$validateUsername = "";
$validatePassword = "";
$validateConfirmpassword = "";
$validateBirthdate = "";
$validateCheckbox = "";

$v1=$v2=$v3="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_REQUEST["fname"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confirmpassword = $_REQUEST["confirmpassword"];
    $gender = $_REQUEST["gender"];
    $birthday = $_REQUEST["birthday"];

    if (empty($name) ) 
    {
        $validateName = "you must enter your name";
    }
    else if(strlen($name)<5)
    {
        $validateName = "you must enter minimum 5 letter of your name";
    } 
    else {
        $validateName = "your name is " . $name;
    }

    if (empty($email)) 
    {
        $validateEmail = "you must enter your email";
    } 
    else {
        $validateEmail = "your email is " . $email;
    }

    if (empty($username)) {
        $validateUsername = "you must enter your user name";
    } 
    else 
    {
        $validateUsername = "your user name is " . $username;
    }
    if (empty($password)) {
        $validatePassword = "you must enter your password";
    } 
    else if(preg_match("@#$%",$password))
    {
        $validatePassword = "you password must contain special characters(@,#,$,%) ";
    }
    else {
        $validatePassword = "your user password is " . $password;
    }
    if (empty($confirmpassword)) {
        $validateConfirmpassword = "you must enter your confirm password";
    } 
    else if($confirmpassword===$password)
    {
        $validateConfirmpassword = "you must match with password";
    }
    else {
        $validateConfirmpassword = "your user password is " . $confirmpassword;
    }
    
}
?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        enter yout name : <input type="text" name="fname"> <?php echo $validateName; ?>
        <br>
        <br>
        enter your email : <input type="text" name="email"><?php echo $validateEmail; ?>
        <br>
        <?php
        
        ?>
        <br>
        <br>
        Your gender: 
        <br>
        <input type="radio" id = "male" name="gender" value="male">
        <label for="male"> Male </label><br>
        <input type="radio" id = "female" name="gender" value="female">
        <label for="female"> Female </label><br>
        <input type="radio" id = "others" name="gender" value="others">
        <label for="others"> Others </label><br>
        <br>
        <button type="submit" value="submit">submit</button>
    </form>

<tr><td>User Name</td>
<td><input type="text" name="username"></td></tr>

<tr><td>Password</td>
<td><input type="password" name="password"></td></tr>

<tr><td>Confirm Password</td>
<td><input type="password" name="confirmpassword"></td></tr>

<tr><td>Date of birth:</td>
<td><input type="date" id="birthday" name="birthday"></td>
<td><br><br></td>
<td><input type="submit" value="submit"></td>
<td><input type="reset" value="reset"></td>
</table>
</form>


</body>

</html>

