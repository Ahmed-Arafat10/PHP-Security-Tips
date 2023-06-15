
### PHP Security Tips In Arabic #04 - Validate URL GET Variables

````php
$DBHost = "localhost";
$DBUsername = "root";
$DBPassword = "";
$DBName = "php_security";
$Connect = new mysqli($DBHost, $DBUsername, $DBPassword, $DBName);
if ($Connect->connect_error) {
    die("Connection failed: " . $Connect->connect_error);
}
````


- Prevent Any Error if URL does Not Contain Query String With variable `id` (Get Does Not Exist) & Prevent any Errors If the Value Is Empty Like This
`http://localhost:8080/PHP_Security/4.php?id=`

````php
if (empty($_GET['id'])) :
    echo "GET is Empty";
elseif (isset($_GET['id'])) :
    // Filter Query String From All Characters Expect Integer One
    // As id Is Integer Not Anything Else 
    $UserID = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    echo "This Is The Id" . $UserID;
    $Query1 = "SELECT * FROM `PHP` WHERE ID = ?";
    $Query = $Connect->prepare($Query1);
    $Query->bind_param("i", $UserID);
    $Query->execute();
    $Result = $Query->get_result();
    //print_r($Result);     #Debug
    // Used id If ID does not exist
    $Rows = $Result->num_rows;
    if ($Rows > 0) :
        $Fetch = $Result->fetch_assoc();
        print_r($Fetch);
        $Name = $Fetch['Name'];
        echo $Name;
    //$Query->close();
    //$Connect->close();
    else :
        echo "This ID does not exist";
    endif;

endif;
````

````php
Some Resources To Read:
    - http://www.securityidiots.com/Web-Pentest/SQL-Injection/Basic-Union-Based-SQL-Injection.html
    - https://www.sqlinjection.net/union/
    - https://owasp.org/www-community/attacks/SQL_Injection
````
