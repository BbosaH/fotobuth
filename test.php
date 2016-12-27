<?php
include("include/DbConnect.php");
  
$sql = "ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);";

//$sql = "drop table kabitigidi";
 $sql2 = "ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);";

 $sql3 = "ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);";

 $sql4="ALTER TABLE `myclass`
  ADD PRIMARY KEY (`id`);";

 $sql5="ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);";

 $sql6 = "ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);";

 $sql7 = "ALTER TABLE `strong_subject`
  ADD PRIMARY KEY (`id`);";

 $sql8 = "ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);";

 $sql9 = "ALTER TABLE `subject_myclass`
  ADD PRIMARY KEY (`id`);";

 $sql10 = "ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);";

 $sql11 = "ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);";

 $sql12 = "ALTER TABLE `user_connection`
  ADD PRIMARY KEY (`id`);";

// $sql13 = "ALTER TABLE `weak_subject`
//   MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13";

$sql13 = "ALTER TABLE `weak_subject`
  ADD PRIMARY KEY (`id`);";

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
