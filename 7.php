<?php



# PHP Security Tips In Arabic 07 - Disable Error In Production Environment

# Use It Only In Production Enviroment Not Develpment , To Prevent Users From
# Viewing The Errors
//error_reporting(off);
error_reporting(0);

// Not Declared Variable, But Error Message Will Not Be Printed
echo $name;
?>
