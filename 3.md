
### PHP Security Tips In Arabic #03 - Cross Site Scripting and Filtering Inputs

> XSS : Cross Site Scripting

- Anyone Using Get Method (URL Link) Can Add A Script Tag `<script></Script>` , Which
 Contains JavaScript That Steal Cookies For Example Or Any Other Malicious Code
So We Have To Filter The Url String Query From These Tags Using
````php
filter_var($_GET["id"], FILTER_SANITIZE_STRING);
````
> `http://localhost:8080/PHP_Security/3.php?ahmed=10<script>alert("malicous")</script>`
> <br> Now Value Of Name `id = 10`
> <br> `<script>alert("malicious")</script>` Will Be Removed

- Now Remove Any Other Character Other Than Numbers From URL
````php
$RemoveAnyCharExceptNumbers = filter_var($RemoveAnyHTMLTag, FILTER_SANITIZE_NUMBER_INT);
echo $RemoveAnyCharExceptNumbers . "<hr />";
````
> `http://localhost:8080/PHP_Security/3.php?id=10aaabbbccc`
> <br> Now Value Of Name `id = 10`
> <br> `aaabbbccc` Will Be Removed
    
- Use `htmlspecialchars()` function
````php
$RemoveAnyHTMLTag = htmlspecialchars($_GET['id']);
echo $RemoveAnyHTMLTag . "<hr />";
````
> `http://localhost:8080/PHP_Security/3.php?id=10<h1>HI</h1>`
> <br> Now Value Of Name `id = 10<h1>HI</h1>`
> <br> Note: `<h1>HI</h1>` Will Be Just A Text, Will Not Be Converted To HTML Tag