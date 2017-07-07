<?php
include 'config.php';
include 'slack-send.php';

$mailbox = imap_open(MAIL_HOST,MAIL_USER,MAIL_PASS) or die('Cannot connect: ' . imap_last_error());

$MC = imap_check($mailbox);

$result = imap_fetch_overview($mailbox,"1:{$MC->Nmsgs}",0);

foreach ($result as $overview) {
  if($overview->seen == 0) {
    $secret = md5(SALT_KEY.$overview->udate);
    $subject = htmlentities($overview->subject);
    $from = htmlentities($overview->from);
    $msgno = $overview->msgno;
    $to = htmlentities($overview->to);
    $body = imap_fetchbody($mailbox,$msgno,1,FT_PEEK);
    $body = quoted_printable_decode($body);
    $text = "*".$subject."*"."\n".$body."\n";
    foreach ($featured as $key => $value) {
        if(stristr($to,$key)) {
            $to = $value;
        }
    }
    slacksend($to, $text);
    imap_setflag_full($mailbox, $overview->msgno, "\\Seen");
  }
}

imap_close($mailbox);

?>
