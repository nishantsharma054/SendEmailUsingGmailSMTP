# SendEmailUsingGmailSMTP

To use a gmail as SMTP for sending emails,

Make sure that : 
1. 2FA is turned off
https://myaccount.google.com/u/1/signinoptions/two-step-verification

2. Allow less secure apps is turned on 
https://myaccount.google.com/u/1/lesssecureapps

3. If it still doesn't work, then check if your server's php.ini has following extension, if it has a ; (semicolon), this means it is commented and you must remove the ;
Example : 
Change from: ;extension=php_openssl.dll
To this: extension=php_openssl.dll

In source code's contact-form-handler.php file, enter your email and in $myemail and password of your gmail in $mail->Password
