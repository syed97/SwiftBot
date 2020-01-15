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

  $post->distToAllStarts = isset($_GET['distToAllStarts']) ? $_GET['distToAllStarts']: die();

  //$post->credit = $data->credit;

  // Create post
  if($post->set_distToAllStarts()) {
    echo json_encode(
      array('message' => 'set_distToAllStarts updated')
    );
  } else {
    echo json_encode(
      array('message' => 'set_distToAllStarts not updated')
    );
  }

