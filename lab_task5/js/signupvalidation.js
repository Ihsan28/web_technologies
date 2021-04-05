function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var date = document.getElementById("birthday").value;
    var gender = "";
    var radios = document.getElementsByName('gender');
    var length = radios.length;
    var expr;
    
    for (var i = 0; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value;
            break;
        }
    }
    
    if (name.length === 0 || email.length === 0 || password.length === 0 || confirmPassword.length === 0 || date.length === 0 || gender.length === 0) {
        alert('fill all fields');
        return false;
    }
    else
    {
        expr=/^[a-zA-Z-' ]*$/;
        if(name.length<5)
        {
            alert("name must be five characters or more");
            return false;
        }
        else if(!name.match(expr))
        {
            alert("invalid name");
            return false;
        }

        expr=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(!email.match(expr))
        {
            alert("invalid email");
            return false;
        }

        expr=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        if(password!=confirmPassword)
        {
            alert("password mismatch");
            return false;
        }
        else if(!password.match(expr))
        {
            alert("password must be 8 characters long. contain special character,number,upper and lower case characters");
            return false;
        }

    }

    return true;
}
