<?php
include("include/DbConnect.php");
  
$sql2 = "INSERT INTO `myclass` (`id`, `name`, `school_id`, `code`, `description`) VALUES
(1, 'Civilingenjörsprogrammet i teknisk fysik', 1, '', 'Involves  deep knowlegde about the computer'),
(2, 'Institutionen for neurovetenskap', 2, '', 'involves technology and art of house designing'),
(3, 'Institutionen for farmaceutisk biovetenskap', 3, '', 'This is study of Energy systmems'),
(4, 'Matematiska institutionen', 4, '', 'science about forests'),
(5, 'Teologiska institutionen', 5, '', 'general'),
(6, 'Filosofiska institutionen', 6, '', 'general'),
(7, 'plant studies', 7, '', 'general'),
(8, 'commercial law', 8, '', 'general'),
(9, 'Picture Editng', 9, '', 'general'),
(10, 'Abstract Motor designs', 10, '', 'general'),
(11, 'Enginnering Mathematics', 11, '', 'general'),
(12, 'UFO studies', 12, '', 'general');";

 //$sql = "TRUNCATE table `subject`";
 //$sql7 = "TRUNCATE table `status`";
 $sql1 = "INSERT INTO `myclass` (`id`, `name`, `school_id`, `code`, `description`) VALUES
(1, 'Civilingenjörsprogrammet i teknisk fysik', 1, '', 'Involves  deep knowlegde about the computer'),
(2, 'Institutionen for neurovetenskap', 2, '', 'involves technology and art of house designing'),
(3, 'Institutionen for farmaceutisk biovetenskap', 3, '', 'This is study of Energy systmems'),
(4, 'Matematiska institutionen', 4, '', 'science about forests'),
(5, 'Teologiska institutionen', 5, '', 'general'),
(6, 'Filosofiska institutionen', 6, '', 'general'),
(7, 'plant studies', 7, '', 'general'),
(8, 'commercial law', 8, '', 'general'),
(9, 'Picture Editng', 9, '', 'general'),
(10, 'Abstract Motor designs', 10, '', 'general'),
(11, 'Enginnering Mathematics', 11, '', 'general'),
(12, 'UFO studies', 12, '', 'general');";

 $sql = "INSERT INTO `subject` (`id`, `name`, `code`, `description`) VALUES
(1, 'Calculus', 'CSC2100', 'This is about integration mathematics'),
(2, 'Statictics', 'STC1102', 'This is about massive counting and computing'),
(3, 'Automata', 'CSC1022', 'This is automata'),
(4, 'Engineering Mathematics', 'ENG1230', 'This is Engineering in mathematics'),
(5, 'History', 'HIS1320', 'This is about European History'),
(6, 'Business Logic', 'BSE1203', 'This is predicate logic'),
(7, 'Data Structures and Algorithms', 'BSSE1200', 'This is about designing software algorithms'),
(8, 'Big Energy Systems', 'ENR 1202', 'The study about big energy systems');";

 $sql7="INSERT INTO `status` (`id`, `name`, `remarks`) VALUES
(1, 'pending', 'This is a message that a user has clicked sent but has not yet arrives to recivers phone'),
(2, 'sent', 'This is message sent and recived by reciver'),
(3, 'seen', 'This is a message that the reciver has seen and read');";

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
  
//       $stmt2 = $conn->prepare($sql7);
//       $result = $stmt2->execute();
  
//     $stmt3 = $conn->prepare($sql1);
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
        echo "Kyekyo 9<br/>";
        var_dump($result);
    } else {
        echo "winna<br/>";
        var_dump($result);
    }
    
    
}catch(PDOException $ex){
    die($ex->getMessage());
}

  
?>
