<?php
include("include/DbConnect.php");
  
$sql = "CREATE TABLE IF NOT EXISTS `admin` (
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

//$sql = "drop table kabitigidi";
 $sql2 = "CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;";

 $sql3 = "CREATE TABLE IF NOT EXISTS `chat_message` (
  `id` int(30) NOT NULL,
  `chat_id` int(30) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `reciever_id` int(20) NOT NULL,
  `message_details` text NOT NULL,
  `sent_time` varchar(100) NOT NULL,
  `status_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;";

 $sql4="CREATE TABLE IF NOT EXISTS `myclass` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `school_id` int(10) NOT NULL,
  `code` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;";

 $sql5="CREATE TABLE IF NOT EXISTS `school` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `university_id` int(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;";

 $sql6 = "CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;";

 $sql7 = "CREATE TABLE IF NOT EXISTS `strong_subject` (
  `id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;";

 $sql8 = "CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;";

 $sql9 = "CREATE TABLE IF NOT EXISTS `subject_myclass` (
  `id` int(10) NOT NULL,
  `myclass_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;";

 $sql10 = "CREATE TABLE IF NOT EXISTS `university` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;";

 $sql11 = "CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `school` varchar(30) NOT NULL,
  `classs` text NOT NULL,
  `auth_tocken` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `chat_status` int(10) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

 $sql12 = "CREATE TABLE IF NOT EXISTS `user_connection` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `resource_id` int(10) NOT NULL,
  `chat_id` int(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;";

// $sql13 = "ALTER TABLE `weak_subject`
//   MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13";

$sql13 = "CREATE TABLE IF NOT EXISTS `weak_subject` (
  `id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
";

// $sql15 = "";

  



try{
    $db = new DbConnect();
    $conn = $db->connect();
    
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute();
  
    $stmt2 = $conn->prepare($sql2);
    $result2 = $stmt2->execute();
  
    $stmt3 = $conn->prepare($sql3);
    $result3 = $stmt3->execute();
  
    $stmt4 = $conn->prepare($sql4);
    $result4 = $stmt4->execute();
  
    $stmt5 = $conn->prepare($sql5);
    $result5 = $stmt5->execute();
  
    $stmt6 = $conn->prepare($sql6);
    $result6 = $stmt6->execute();
  
    $stmt7 = $conn->prepare($sql7);
    $result7 = $stmt7->execute();
  
    $stmt8 = $conn->prepare($sql8);
    $result8 = $stmt8->execute();
  
    $stmt9 = $conn->prepare($sql9);
    $result9 = $stmt9->execute();
  
    $stmt10 = $conn->prepare($sql10);
    $result10 = $stmt10->execute();
  
    $stmt11 = $conn->prepare($sql11);
    $result11 = $stmt11->execute();
  
    $stmt12 = $conn->prepare($sql12);
    $result12 = $stmt12->execute();
  
    $stmt13 = $conn->prepare($sql13);
    $result13 = $stmt13->execute();
  
//     $stmt14 = $conn->prepare($sql14);
//     $result14 = $stmt14->execute();
  
    if ($result) {
        echo "Kyekyo<br/>";
        var_dump($result);
    } else {
        echo "winna<br/>";
        var_dump($result);
    }
    
    
}catch(PDOException $ex){
    die($ex->getMessage());
}

  
?>
