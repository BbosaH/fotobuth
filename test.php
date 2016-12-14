<?php
  include("include/DbConnect.php");
  
  $sql = "INSERT INTO `admin` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `phone`, `dob`, `avatar`, `date_created`, `active`) VALUES
(1, 'Alien', 'Ware', 'male', 'alien@gmail.com', '$2a$10$772866c65026b58bfd9b9uMo6QHTKjh.K3R3lMdfI.E', '0790164259', '1481383407', 'AlienWare1481383407.png', '1481383419', 1),
(2, 'lujja', 'Henry', 'male', 'bbosa.henry1@gmail.com', '$2a$10$4ad18e94a231d1e09101fuWMjDroYvlOmIzYXA4nL3h', '07859695', '1456873200', 'lujjaHenry1481384319.png', '1481384319', 1);
";

//$sql = "drop table kabitigidi";
$sql2 = "ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;";

$sql3 = "ALTER TABLE `chat_message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;";

$sql4="ALTER TABLE `myclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;";

$sql5="ALTER TABLE `school`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;";

$sql6 = "ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;";

$sql7 = "ALTER TABLE `strong_subject`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;";

$sql8 = "ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;";

$sql9 = "ALTER TABLE `subject_myclass`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;";

$sql10 = "ALTER TABLE `university`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;";

$sql11 = "ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;";

$sql12 = "ALTER TABLE `user_connection`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40";

$sql13 = "ALTER TABLE `weak_subject`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13";

$sql14 = "CREATE TABLE IF NOT EXISTS `weak_subject` (
  `id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
";

$sql15 = "";

  



try{
    $db = new DbConnect();
    $conn = $db->connect();
    
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute();
  
//     $stmt2 = $conn->prepare($sql2);
//     $result2 = $stmt2->execute();
  
//     $stmt3 = $conn->prepare($sql3);
//     $result3 = $stmt3->execute();
  
//     $stmt4 = $conn->prepare($sql4);
//     $result4 = $stmt4->execute();
  
//     $stmt5 = $conn->prepare($sql5);
//     $result5 = $stmt5->execute();
  
//     $stmt6 = $conn->prepare($sql6);
//     $result6 = $stmt6->execute();
  
//     $stmt7 = $conn->prepare($sql7);
//     $result7 = $stmt7->execute();
  
//     $stmt8 = $conn->prepare($sql8);
//     $result8 = $stmt8->execute();
  
//     $stmt9 = $conn->prepare($sql9);
//     $result9 = $stmt9->execute();
  
//     $stmt10 = $conn->prepare($sql10);
//     $result10 = $stmt10->execute();
  
//     $stmt11 = $conn->prepare($sql11);
//     $result11 = $stmt11->execute();
  
//     $stmt12 = $conn->prepare($sql12);
//     $result12 = $stmt12->execute();
  
//     $stmt13 = $conn->prepare($sql13);
//     $result13 = $stmt13->execute();
  
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
