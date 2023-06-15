### PHP Security Tips In Arabic #13 - How To Prevent Execute Of Specific Files

- Note : Even If You Used `.htaccess` To Prevent Directory Listing, anyone Who Just Write File In That Path
(`UserProfilePictures` Path For Example) Will Be Able To Execute Or View A File In It If He/She Writes
Name Of File like : `http://localhost/PHP_Security/UsersProfilePictures/Ging.JPG` 
- He Will Be Able To View the Pic Even If `.Htaccess` Prevent Directory Listing

- To Prevent This INSIDE The Target Directory Add `.Htaccess` File In It And Then Write:
````apacheconf
# Add All Files Extension That Wont Be Executed Or Viewed
<FilesMatch "\.(php|cpp|js|py|exe|sh|jpg|inc|rb)$" >
Order allow,deny
Deny from all
</FilesMatch>
````
> VIP Note: if you do the above method with image files (like `png`/`jpg`) you will not be able to view them using `<img>` tag

- The following commands Won't Execute Or View ALL FILES
````
#<FilesMatch ^>
# Order allow,deny
# Deny from all
#</FilesMatch>
````


