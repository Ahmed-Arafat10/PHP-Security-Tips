<?php

# Any Authontication Variable Comes From Session
# If You're An Admin Then You're Allowed Else You Are Not

// Suppose He/She Is Not An Admin By Default
$id = 0;

// 1 -> Is For Admin
if ($id != 1) :
    header("Location: 6.php");
    exit;
endif;

# Rest Of Admin Page Will Be Here, Just Printing A Message
echo "Suppose This Part Is Only For Admin";





/*

In CMD [Run As Adminstrator First]
$ curl --include http://localhost:8080/PHP_Security/9.php

O/P-> 

HTTP/1.1 302 Found
Date: Wed, 16 Feb 2022 18:16:43 GMT
Server: Apache/2.4.43 (Win64) OpenSSL/1.1.1g PHP/7.4.5
X-Powered-By: PHP/7.4.5
Location: 6.php
Content-Length: 35
Content-Type: text/html; charset=UTF-8

Suppose This Part Is Only For Admin             <------------   


-------------------------------------------------------------------------
-> This Means Rest Of Page Will Be Shown In Cmd, This Is A Secuirty Hole

-> To prevent this write [exit;] OR [die;] after [Header();] 
   Which Close Connection After Header() Function 

*/