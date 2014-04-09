<?php
require_once('/classes/HtDb.php');
require_once('/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$ht_id = 28;

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$email->sendSubmission($submission, 'front page lead');