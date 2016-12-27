<?php
include("include/DbConnect.php");
  
$sql2 = "INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `email`, `password_hash`, `phone_number`, `university`, `school`, `classs`, `auth_tocken`, `avatar`, `chat_status`, `level`) VALUES
(1, 'henry', 'Bbosa', 'female', 'bbosa.henry1@gmail.com', '$2a$10$bb7c46b506c1ccf374be4u5fNopGDYh0LzFwAzo5yBWhVsUYBgqN2', '+256 77777557', '1', '1', '1', '6325ab30f8d2b4543e637507ebc820cd', 'avatar.png', 1, 0),
(2, 'Arnold', 'Pettersson', 'male', 'arnold.pettersson@gmail.com', '$2a$10$46af66222c8966e246c09OJyN6nl4uyIQMRtcYwc1A5A1ocwhm9Fq', '+46 790164259', '1', '1', '1', '0dcf8e049752fa9cbe04c4037c3e015b', 'avatar.png', 0, 0);";

//$sql = "drop table kabitigidi";
 $sql = "INSERT INTO `university` (`id`, `name`, `country`, `description`, `date_created`) VALUES
(1, 'Upsalla Universitet', 'Sweden', 'This  is one of the best universities in upsalla town', '1481383407'),
(2, 'Lund Universitet', 'Sweden', 'Thi  is one of the best universities in sweden', '1481383407'),
(3, 'Stockholm Universitet', 'Sweden', 'Found in stockholm', '1481472764');";

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;";

// $sql13 = "ALTER TABLE `weak_subject`
//   MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13";

$sql13 = "ALTER TABLE `weak_subject`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;";

// $sql15 = "";

  



try{
    $db = new DbConnect();
    $conn = $db->connect();
    
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute();
      
  
//     $query = $conn->query($sql);
// 		$rows = $query->fetchAll(PDO::FETCH_ASSOC); 
				
// 		var_dump($rows);
  
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
        echo "Kyekyo 5<br/>";
        var_dump($result);
    } else {
        echo "winna<br/>";
        var_dump($result);
    }
    
    
}catch(PDOException $ex){
    die($ex->getMessage());
}

  
?>
