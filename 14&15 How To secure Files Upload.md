### PHP Security Tips In Arabic #14 - How To secure Files Upload


- Secure Upload Files:
  1. Rename Files Completely
  2. Check Files Extension
  3. Check Files MIME Type > `text/plain` - `image/jpg` - `image/png` and so on 
  4. Check For Files Size


````php
if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    // Img input Name Of File Input
    $ImageName = $_FILES['ImgInput']['name'];
    $ImageSize = $_FILES['ImgInput']['size'];
    $ImageTmp = $_FILES['ImgInput']['tmp_name'];
    $ImageType = $_FILES['ImgInput']['type'];

    echo $ImageName . "<hr/>"; # Ging_and_Pariston.png
    echo $ImageSize . "<hr/>"; # 1701443 Byte           [1.7 MB]    -- Convert it to MB
    echo $ImageTmp . "<hr/>"; # C:\xampp\tmp\php3655.tmp
    echo $ImageType . "<hr/>"; # image/png
````

#### Step #1: Rename the file

````php
    $ImageExtentionArray = explode('.', $ImageName);
    print_r($ImageExtentionArray);
    //O/P: Array ( [0] => Ging_and_Pariston [1] => png )
    // end(): Return Last Element In Array
    $ImageExtention = end($ImageExtentionArray); // Result From Explode() Store It In Array And Use It As Parameter In End() Function
    echo $ImageExtention . "<hr/>"; # png

    // now You have To give a name to image file 

    # Method #1
    // Generate a numeric name for an image [Note: every time number must be unique]
    $imageNewName = rand(0, 1000000) . '.' . $ImageExtention; # 99.png
    echo $imageNewName . "<hr/>";

    # Method #2
    $imageNewNameUNIQUE = uniqid() . '.' . $ImageExtention;
    echo $imageNewNameUNIQUE . "<hr/>";

    # Method #3
    /*
    Stackoverflow Answer :
    When I upload images, I usually save it as the sha1() of the image's contents (sha1_file()).        
    That way, you get two birds with one stone: You'll never (if you do, go fill out the closest lottery) get duplicate
    file names, AND, you'll prevent duplicate images (because duplicate images would have the same checksum).
    */
    $filename = $ImageTmp;  # Use $ImageTmp Not $ImageName As It Is The Path Of Image Not Just Image Name [I want Image Itself To Generate Its Hash]
    $img_uniq_SHA = sha1_file($filename);
    echo $img_uniq_SHA . "<hr/>";

    # Debug
    //echo sha1_file("Ging_and_Pariston.png");
````

#### Step #2: Files Extension
````php
    // Make An Array With Only Allowed Extension [For Image Only For Example]
    $AllowedExtensions = array('jpg', 'gif', 'png', 'jpeg');

    // Check If Extension Of Uploaded Image Is In Array
    if (in_array($ImageExtention, $AllowedExtensions)) :
        echo "Okay Extension Is Valid" . "<hr/>";
    else :
        echo "Extension Is InValid" . "<hr/>";
    endif;
````
#### Step #3: Check Files MIME Type (Same As above Just Change Array)
````php
    $AllowedExtensions = array('image/jpg', 'image/gif', 'image/png', 'image/jpeg');

    // Check If Extension Of Uploaded Image Is In Array
    if (in_array($ImageType, $AllowedExtensions)) :
        echo "Okay MIME Type Is Valid" . "<hr/>";
    else :
        echo "MIME Type Is InValid" . "<hr/>";
    endif;
````

#### Step #4: Check For Files Size
````php
    // Bigger  Than 5MB
    if ($ImageSize > 5000000) :
        echo "Image Is To Large" . "<hr/>";
    else :
        $Location = 'Pics/';
        if (move_uploaded_file($ImageTmp, $Location . $imageNewNameUNIQUE))
            echo "Image Is Uploaded";
        else echo "Failed To Upload The Image";
    // Make Database Query To Insert Its Name;
    endif;
endif;
````

- HTML Part:
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
    <!-- Use [enctype="multipart/form-data"] If You Are Going To Upload A File/Image -->
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- [accept="image/*"] is Useless As He/She Can Press On All Files From Button Right Menu -->
        <input type="file" name="ImgInput" id="" accept="image/*">
        <input type="submit" name="Upload" value="Upload">
    </form>
</body>
</html>
````