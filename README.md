## Ecom Practice Test 2 

# Guidelines

## COMPLETED MUST TEST
1- Redirect authenticated users from the login page to the employees secured page
Hints:
- Implement an isLoggedIn in function - where?? -> Membership Provider
- Implement a check for logged in users - where? -> Controller 
- Redirect the user to the secure page if they are logged in - where? -> Controller


2- Implement the logout feature
- Implement a logout button or link on the employees page
- Once clicked:
-- Set the cookie to expire
-- Clear the $_SESSION array
-- call session_destroy


3- Implement a check for the employee page for unauthenticated users to be redirected to the login


4- Implement the register functionality
- Implement a Model
- Controller
- View
-- The view should have the fields email, username, password, and an enable 2FA checkbox

5- Implement JavaScript client side user input validation for the email
Using the 'validity' DOM API
https://developer.mozilla.org/en-US/docs/Learn_web_development/Extensions/Forms/Form_validation

6- Implement server side input validation in PHP for the email using filter_var
https://www.php.net/manual/en/filter.examples.validation.php

7- Implement 2FA setup as part of the registration process
If the user clicks enable 2FA on the registration form
Then the user is redirected to a page where they setup 2FA
The user must download the Google Authenticator app or the Microsoft Authenticator app.
The web application should display a QR code that the user can scan using the app.
Use the following 2FA library: 
https://github.com/Voronenko/PHPOTP

8- Implement the 2FA login verification as part of the login process
where the web application asks the user to input a code after they input the username and password, They need to get the code from the authenticator app.
