<?php
  include("include/DbConnect.php");
  
  $sql = "CREATE TABLE IF NOT EXISTS `kabitigidi` (
  `id` int(30) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `date_created` varchar(30) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;";

  
try{
    $db = new DbConnect();
    $conn = $db->connect();
    
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
 
           
    // Check for successful insertion
    if ($result) {
        echo "Wetegeleza<br/>";
        var_dump($result);
    } else {
        echo "Enjagga ekmaulu<br/>";
        var_dump($result);
    }
}catch(PDOException $ex){
    die($ex->getMessage());
}

  
?>
