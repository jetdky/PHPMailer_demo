<?php
require './Email.php';

use Email\Email;

$mail = new Email();

$mail->send();