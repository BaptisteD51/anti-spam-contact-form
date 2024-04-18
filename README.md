# A contact form to protect against low quality spam
I made this form to protect against russian spammers.

## Protection against spams
There is several layers of protection :
1. **Honeypot** : There is a invisible field for the user that should not be inputed. The bots who input something in this field won't be able to send an email.
2. **Javascript protection** : On page load, the name attributs change using javascript. If the bot doesn't use JS, it will send $_POST with the old names.
3. **A custom captcha** : You have to make a calculation to send the email.
4. **An anti-cirillic filter** : As the contact form is intended to be used in France against russian spammers, the messages that contains cyrillic characters aren't accepted.

## How to configure
1. Create a config.php at the root of the application.
2. Create a $emails variable, wich is an array that contains the email adress of all the adressees
