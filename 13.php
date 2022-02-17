<?php

# PHP Security Tips In Arabic #13 - How To Prevent Execute Of Specific Files

/* 

Note : Even If You Used .htaccess To Prevent Directory Listing, anyone Who Just Wrtie File In That Path
[usersprofilepictures Path For Example] Will Be Able To Exectue Or View A File In It If He/She Writes
Name Of File 
For Example -> http://localhost/PHP_Security/UsersProfilePictures/Ging.JPG 
- He Will Be Able To View Pic Even If [.Htaccess] Prevent Directory Listing

To Prevent This INSIDE The Target Directory Add [.Htaccess] File In It And Then Write


At [.htaccess] File :
----------------------------------------------
# Add All Files Extension That Wont Be Executed Or Viewed
<FilesMatch "\.(php|cpp|js|py|exe|sh|jpg|inc|rb)$" >

Order allow,deny
Deny from all
 
</FilesMatch>


# This Wont Executed Or Viewed ALL FILES

#<FilesMatch ^>
# Order allow,deny
# Deny from all
#</FilesMatch>
----------------------------------------------



*/
