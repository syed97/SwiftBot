<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../../config/dbConnectionAllSet.php';
  include_once '../models/appPost.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  
  $post->userIdTag = $data->userIdTag;
  $post->senderLocation = $data->senderLocation;
  $post->receiverId = $data->receiverId;

  // Create post
  if($post->insert_booking()) {
    echo json_encode(
      array('message' => 'Booking Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Booking not Created')
    );
  }

