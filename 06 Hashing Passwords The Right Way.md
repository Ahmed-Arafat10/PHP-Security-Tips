### PHP Security Tips In Arabic #06 - Hashing Passwords The Right Way

- Create a Form
````php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="PasswordIN">Password</label>
        <input type="password" name="PasswordIN" id="">
        <input type="submit" value="Go!" name="PassHash">
    </form>
</body>
</html>
````

- Note : Not Recommended To Use md5() As It is Weak
````php
$Pass = "ging";
$hash = md5($Pass); 
echo $hash;
````
> `Salt`: is A String Added To A Password Before It Is Hashed
If The Salt Is Long And Random, then It Makes Some Common Cracking Methods
Such As `Dictionary Attacks` And `Lookup Tables` Ineffective

- The write way to hash the password:
````php
    if (isset($_POST['PassHash'])) :
        $Password = $_POST['PasswordIN'];
        echo "Your Password Is $Password" . "<hr>";
        $HashPassword = password_hash($Password, PASSWORD_DEFAULT);
        echo "Hashed Password Is $HashPassword" . "<hr>";
        echo "Password Length = " . strlen($HashPassword);
        # To check the hashed value if it matches with user's input
        if (password_verify("Ahmed", $HashPassword)) echo "<h1>Matched</h1>";
        else echo "<h1>Not Matched</h1>";
    endif;
````