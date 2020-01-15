<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
  include_once '../../../config/dbConnectionAllSet.php';
  include_once '../models/appPost.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

// prepare product object
$post = new Post($db);
 
$post->userIdTag = isset($_GET['userIdTag']) ? $_GET['userIdTag']: die();

// read the details of product to be edited
$result = $post->read_all_user_bookings();
$num = $result->rowCount();

if($num > 0) {
    // Post array
    $posts_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'bookingId'=> $bookingId,
        'timeAdded' => $timeAdded,
        'fromLocation' => $fromLocation,
        'toLocation' => $toLocation,
        'fromPerson' => $senderName,
        'toPerson' => $receiverName,
        'status' => $status,
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'none')
    );
  }
?>







