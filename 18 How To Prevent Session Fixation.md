### PHP Security Tips In Arabic #18 - How To Prevent Session Fixation

````php
// This Function Wil Generate New Session ID While Data Is Still Stored
session_regenerate_id();

// Pass True To Delete Old Session
session_regenerate_id(true);
````

> Use It After Log in Or In Authentication The User