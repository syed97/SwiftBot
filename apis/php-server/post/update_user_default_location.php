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

  $post->userIdTag = isset($_GET['userIdTag']) ? $_GET['userIdTag']: die();
  $post->locationId = isset($_GET['locationId']) ? $_GET['locationId']: die();

  // Create post
  if($post->update_user_default_location()) {
    echo json_encode(
      array('message' => 'Location Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Error occured')
    );
  }

