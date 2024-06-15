site link: https://cng.selfmade.one/

XSS Vulnerability explanation:
* The user input from the comment section is not validated and unsanitized.
* Due to that, XSS scripts(Javascript codes in usual) can be included in the comments.
* When echoing the comment from Database, the user input JS script will be executed on the webpage.
* Example script is <script>alert("Vulnerable to XSS")</script> will display an alertbox with text "Vulnerable to XSS".
* Using this cookie hijacking can be done with this script, <script>alert(document.cookie)</script>
* The above script will display all the cookies stored by the site in an alert box.
* Then the cookies can be sent to the attacker's device in many ways.
