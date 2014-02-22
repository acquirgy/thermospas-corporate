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

}

echo 'success';