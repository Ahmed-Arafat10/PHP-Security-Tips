<?php

# PHP Security Tips In Arabic #03 - Cross Site Scripting and Filtering Inputs

// XSS --> Cross Site Scripting

/*

Anyone Using Get Method [url Link] Can Add A Script Tag <script></Script, Which
Contains JavaScript That Steal Cookies For Example Or Any Other Malicious Code
So We Have To Filter The Url String Query From These Tags
Using filter_var($_GET["Name"], FILTER_SANITIZE_STRING);

*/
if (isset($_GET['ahmed'])) :

    $RemoveAnyHTMLTag = filter_var($_GET["ahmed"], FILTER_SANITIZE_STRING);
    # http://localhost:8080/PHP_Security/3.php?ahmed=10<script>alert("malicous")</script>
    # Now Value Of Name 'ahmed' -> 10
    # <script>alert("malicous")</script> Will Be Removed

    # Now Remove Any Other Charecter Other Than Numbers From Url
    $RemoveAnyCharExceptNumbers = filter_var($RemoveAnyHTMLTag, FILTER_SANITIZE_NUMBER_INT);
    # http://localhost:8080/PHP_Security/3.php?ahmed=10aaabbbccc
    # Now Value Of Name 'ahmed' -> 10
    # aaabbbccc Will Be Removed

    echo $RemoveAnyCharExceptNumbers . "<hr />";


    $RemoveAnyHTMLTag = htmlspecialchars($_GET['ahmed']);
    # http://localhost:8080/PHP_Security/3.php?ahmed=10<h1>HI</h1>
    # Now Value Of Name 'ahmed' -> 10<h1>HI</h1>
    # Note: <h1>HI</h1> Will Be Just A Text, Will Not Be Converted To HTML Tag
    echo $RemoveAnyHTMLTag . "<hr />";

endif;
