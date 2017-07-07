<?php

/* Replace the following constants */

define('MAIL_HOST', '{imap.mail.eu-west-1.awsapps.com:993/imap/ssl}INBOX'); // Change if not using WorkMail
define('MAIL_USER', ''); // IMAP username/login, usually an email
define('MAIL_PASS', '');
define('SALT_KEY', 'abcd1234'); // Make this longer and more unique!
define('SLACK_URL', ''); // Paste your slack hook URL here
define('SLACK_USERNAME', ''); // Set a username for the Slack message
define('SLACK_ICON_EMOJI', ':imp:'); // Set an icon for the Slack message
$featured = array('' => ''); // email => @slack_account

?>
