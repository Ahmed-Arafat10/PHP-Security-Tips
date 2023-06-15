
### PHP Security Tips In Arabic #05 - Prevent Remote File Injection


- A Security Hole If Any One Can Redirect To Another Page Or Website
While You Are Using `Include($page);` In Your Code, The Redirected Page
May Contains Any Script Or Shell That Execute Malicious Code

- It's like that: `http://localhost:8080/PHP_Security/5.php?page=http://www.google.com`

- There are two methods to prevent this :
  - First Method To Limit Pages You Can Redirect To Is Using An Array That Contains 
  Only Allowed Pages
  Then Search In That Array Using In_Array() Function
  - While Second Method Is To Disable This Feature

  
#### First Method:

````php
$AllowedPages = array('3.php', '4.php', 'OOP-MYSQLI.php');

if (isset($_GET['page'])) :
    $Page = $_GET['page'];
    if (in_array($Page, $AllowedPages)) :
        include($Page);
    else :
        echo "Not Allowed For Inclusion";
    endif;
endif;
````


#### Second Method:

- In Xampp Control Panel Click On Apache Config Then Choose PHP (`php.ini`)
Then Search For `allow_url_include=ON`
- Turn It To Off To Be `allow_url_include=OFF`
- Then Restart Apache Server

- Now O/P In the Browser Will Be : `Warning: include(): http:// wrapper is disabled in the server configuration by allow_url_include=0 in C:\xampp\htdocs\PHP_Security\5.php on line 7`