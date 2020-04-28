# Crypto-Project-8-WebApp
Login System App for Crypto Project 8

Check it out here: http://crypto-class-login.levs.computer/


For the attack, please go here: https://github.com/LevinWeinstein/Crypto-Project-8-Exploit

## How I implemented the login system
When the user comes to main page of the website, it checks to make sure that they have a "user" cookie, and that the "user" cookie matches the "auth" cookie according to the hash of the user cookie concatenated with a server key.

If the user does not have such a combination, then they are redirected to the __login page__, where they are asked to submit their username and password.

If the user does not have a username and password, they may choose instead to navigate to the __register page__, where they can sign up for an account by entering a username, password, and password combination. When they do this, the registrationController takes over, and their credential is added to a postgres database under the __users__ table via the __User__ model. Their username is stored in this table, along with the md5 hash of their password + a salt, and also the salt. Their password is not stored as plaintext.

When the user logs in, with these credentials, they are routed to the __loginController__ (see public/controllers), and their information is confirmed once again by retrieving their __username__, __hash__, and __salt__ from the __users__ table via the __User__ model (see db/models). The server checks to make sure that the hash of what they entered, concatenated with the salt, matches the hash that was stored in the database. If it does, then the authentication process is successful, and `$_COOKIE['vanilla_user']` is set to the username of the user, while `$_COOKIE['vanilla_auth']` is set to the authenticator code, which is `md5(user_id . SERVER_KEY)`. Then, they are redirected to the main page. If there is an issue with authentication, a corrderponding error message is displayed in the UI, passed in as the query string in a redirect.

Once at the main page, the server checks to make sure that the user has a valid __vanilla_auth__ cookie and also a valid __vanilla_user__ cookie that matches it. If they do, they are redirected to the secret page, which says "Success! Hello ${Username}". Otherwise, they are redirected to the login page, and an error message is shown in the UI.

## Note
I wanted to add a way to changed your sign in message to an embarrasing post, but I didn't get that functionality read yin time. Because of that, there's an unused "EmbarassingPosts" model and "embarassing_posts" table... Maybe latr I will add that functionlity! 
