<?php

require_once('db.php');

// Check for errors
if(!mysqli_connect_errno() && $_POST['ht_id'] > 0) {

  $query = "UPDATE ht_form SET address1 = ?, address2 = ?, city = ?, state = ?, zipcode = ?, comments = 'send_brochure' WHERE ht_id = ?";

  $stmt = $mysqli->stmt_init();

  if($stmt->prepare($query)) {

    $stmt->bind_param("sssssi",
      $_POST['address1'],
      $_POST['address2'],
      $_POST['city'],
      $_POST['state'],
      $_POST['zipcode'],
      $_POST['ht_id']
    );

    $stmt->execute();
    $stmt->close();

  }

  // Send Email Notification
  require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

  $db = new HtDb();
  $email = new HtEmail();

  $submission = $db->get('ht_form', array('ht_id', $_POST['ht_id']));
  $email->sendSubmission($submission, 'hot-tub-pricing-2.php - step 2');
  // End Send Email Notification

}

echo 'success';