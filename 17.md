### PHP Security Tips In Arabic #17 - Why You Should Do Validation On Back-End

- Validation should be done for both client & server side
as anyone may disable Javascript (Like required field), so You Have To Validate Using `PHP` Also

````php
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    if (!empty($_POST['Username'])) :
        $Username = $_POST['Username'];
        echo $Username;
    else :
        echo "Username cannot be empty";
    endif;
endif;
````

- In HTML:
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
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Require Can Be Bypassed -->
        <input type="text" name="Username" id="" required>
        <input type="submit" name="Upload" value="Send">
    </form>
</body>
</html>
````