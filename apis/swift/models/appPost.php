<?php 

  class Post {
    // DB stuff
    private $conn;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
    
        // Create Post
    function create_user() {
        
          // Create query
          $query = 'INSERT INTO swift_users SET name = :name, email = :email, password = :password, userIdTag =:userIdTag, phoneNumber=:phoneNumber, locationId=0';

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
        $query = "select sender.timeAdded, sender.fromLocation, sender.status, sender.toLocation, sender.receiverName, u1.name as 'senderName', sender.bookingId from (SELECT bookingId,
       timeAdded,
       fromLocation,
       status,
       mp.name AS 'toLocation',
       toLocation.userIdTag AS 'senderId',
       toLocation.receiverId AS 'receiverId',
       toLocation.name as 'receiverName'
FROM
  (SELECT b.userIdTag,
          bookingId,
          timeAdded,
          m.name AS 'fromLocation',
          status,
          receiverId,
   			u.name
   FROM swift_booking b
   INNER JOIN swift_users u ON u.userIdTag=b.receiverId
   INNER JOIN swift_mapPoints m ON m.id=b.senderLocationId
   WHERE (b.userIdTag=:userIdTag
          OR b.receiverId=:userIdTag))  AS toLocation
INNER JOIN swift_users u1 ON u1.userIdTag=toLocation.receiverId
INNER JOIN swift_mapPoints mp ON mp.id=u1.locationId) as sender inner join swift_users u1 on u1.userIdTag=sender.senderId order by sender.bookingId desc


";
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      $stmt->bindParam(':userIdTag', $this->userIdTag);
      
      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    function read_all_user_bookings(){
        $query = "select sender.timeAdded, sender.fromLocation, sender.status, sender.toLocation, sender.receiverName, u1.name as 'senderName', sender.bookingId from (SELECT bookingId,
       timeAdded,
       fromLocation,
       status,
       mp.name AS 'toLocation',
       toLocation.userIdTag AS 'senderId',
       toLocation.receiverId AS 'receiverId',
       toLocation.name as 'receiverName'
FROM
  (SELECT b.userIdTag,
          bookingId,
          timeAdded,
          m.name AS 'fromLocation',
          status,
          receiverId,
   			u.name
   FROM swift_booking b
   INNER JOIN swift_users u ON u.userIdTag=b.receiverId
   INNER JOIN swift_mapPoints m ON m.id=b.senderLocationId
   WHERE (b.userIdTag=:userIdTag
          OR b.receiverId=:userIdTag)) AS toLocation
INNER JOIN swift_users u1 ON u1.userIdTag=toLocation.receiverId
INNER JOIN swift_mapPoints mp ON mp.id=u1.locationId) as sender inner join swift_users u1 on u1.userIdTag=sender.senderId order by sender.bookingId desc
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
          $query = "INSERT INTO swift_booking SET timeAdded ='$timeAdded', userIdTag =:userIdTag, senderLocationId=:senderLocation, receiverId=:receiverId, status='waiting', timeToReach=0, rank=0;";
            
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

    
    function update_user_default_location() {
        
          // Create query
          $query = 'UPDATE swift_users SET locationId =:locationId WHERE userIdTag=:userIdTag; ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind data
          $stmt->bindParam(':userIdTag', $this->userIdTag);
          $stmt->bindParam(':locationId', $this->locationId);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
    }


  }