<!DOCTYPE html>
<html>
<head>
<title> Registration page</title>
</head>
<body>
<h1>Registration Page</h1>

<form>
<table>
<tr><td>First Name</td>
<td><input type="text" name="firstname"></td></tr>

<tr>
<td>Email</td>
<td><input type="text" name="email"></td></tr>

<tr><td>User Name</td>
<td><input type="text" name="username"></td></tr>

<tr><td>Password</td>
<td><input type="password" name="password"></td></tr>

<tr><td>Confirm Password</td>
<td><input type="password" name="confirmpassword"></td></tr>

<tr>
<td>Gender</td>
<td><input type="radio" id="male" name="gender" value="male"></td>
<td><label for="male">Male</label></td>
<td><input type="radio" id="female" name="gender" value="female"></td>
<td><label for="female">Female</label></td>
<td><input type="radio" id="other" name="gender" value="other"></td>
<td><label for="other">Other</label></td>
</tr>

<tr><td>Date of birth:</td>
<td><input type="date" id="birthday" name="birthday"></td>
<td><br><br></td>
<td><input type="submit" value="submit"></td>
<td><input type="reset" value="reset"></td>
</table>
</form>


</body>

</html>

