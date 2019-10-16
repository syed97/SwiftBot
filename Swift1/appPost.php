<?php 

  class Post {
    // DB stuff
    private $conn;
    private $table = 'yp_Users';

    // Post Properties
    public $ID;
    public $username;
    public $userIdTag;
    public $pin;
    public $registerationDate;
    public $email;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
    
        // Create Post
    function create_user() {
        
          // Create query
          $query = 'INSERT INTO swift_users SET name = :name, email = :email, password = :password, userIdTag =:userIdTag, phoneNumber=:phoneNumber';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->password = htmlspecialchars(strip_tags($this->password));
          $this->userIdTag = htmlspecialchars(strip_tags($this->userIdTag));
          $this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));
          
          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':password', $this->password);
          $stmt->bindParam(':userIdTag', $this->userIdTag);
          $stmt->bindParam(':phoneNumber', $this->phoneNumber);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
    }
    
    function set_robot_location() {
    
          // Create query
          $query = 'update swift_robotInfo set lat=:lat, lng=:lng';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':lat', $this->lat);
          $stmt->bindParam(':lng', $this->lng);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
    }
    
    function set_distToAllStarts(){
        
             // Create query
          $query = 'update swift_robotInfo set distToAllStarts=:distToAllStarts';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':distToAllStarts', $this->distToAllStarts);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
    
    function read_all_users(){
    // Create query
      $query = "SELECT * from swift_users";
     
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    function read_all_locations(){
        // Create query
      $query = "select * from swift_mapPoints";
     
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }

    function read_ongoing_bookings_of_user(){
        $query = "select bookingId, timeAdded, fromLocation, status, mp.name as 'toLocation' from (SELECT bookingId, timeAdded, m.name as 'fromLocation', status, receiverId from swift_booking b inner join swift_users u on u.userIdTag=b.receiverId inner join swift_mapPoints m on m.id=b.senderLocationId where (b.userIdTag=:userIdTag or b.receiverId=:userIdTag) and b.status!='completed') as toLocation inner join swift_users u1 on u1.userIdTag=toLocation.receiverId inner join swift_mapPoints mp on mp.id=u1.locationId 

";
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      $stmt->bindParam(':userIdTag', $this->userIdTag);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }
  
    function get_user(){
        $query = "SELECT * from swift_users where email=:email and password=:password";
     
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    function get_robot_location(){
        $query = "SELECT * from swift_robotInfo";
     
      // Prepare statement
      $stmt = $this->conn->prepare($query);
 
      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    function get_distToAllStarts(){
        $query = "SELECT * from swift_robotInfo";
     
      // Prepare statement
      $stmt = $this->conn->prepare($query);
 
      // Execute query
      $stmt->execute();

      return $stmt;
    }
 
    function insert_booking() {
        
          // Create query
          $timeAdded = time();
          $query = "INSERT INTO swift_booking SET timeAdded ='$timeAdded', userIdTag =:userIdTag, senderLocationId=:senderLocation, receiverId=:receiverId, status='waiting';";
            
          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          //$this->bookingId = htmlspecialchars(strip_tags($this->bookingId));
          //$this->timeAdded = htmlspecialchars(strip_tags($this->timeAdded));
          $this->userIdTag = htmlspecialchars(strip_tags($this->userIdTag));
          $this->senderLocation = htmlspecialchars(strip_tags($this->senderLocation));
          $this->receiverId = htmlspecialchars(strip_tags($this->receiverId));
           
          // Bind data
          //$stmt->bindParam(':bookingId', $this->bookingId);
          //$stmt->bindParam(':timeAdded', $this->timeAdded);
          $stmt->bindParam(':userIdTag', $this->userIdTag);
          $stmt->bindParam(':senderLocation', $this->senderLocation);
          $stmt->bindParam(':receiverId', $this->receiverId);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
       printf("Error: %s.\n", $stmt->error);

      return false;
      
    }



  }