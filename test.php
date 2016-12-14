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

$sql = "INSERT INTO `kabitigidi` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `phone`, `dob`, `avatar`, `date_created`, `active`) VALUES
(1, 'Alien', 'Ware', 'male', 'alien@gmail.com', '$2a$10$772866c65026b58bfd9b9uMo6QHTKjh.K3R3lMdfI.E', '0790164259', '1481383407', 'AlienWare1481383407.png', '1481383419', 1),
(2, 'lujja', 'Henry', 'male', 'bbosa.henry1@gmail.com', '$2a$10$4ad18e94a231d1e09101fuWMjDroYvlOmIzYXA4nL3h', '07859695', '1456873200', 'lujjaHenry1481384319.png', '1481384319', 1);";
  



try{
    $db = new DbConnect();
    $conn = $db->connect();
    
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    if ($result) {
        echo "Kyekyo<br/>";
        var_dump($result);
    } else {
        echo "winna<br/>";
        var_dump($result);
    }
    
    
  
    $sql = "SELECT * FROM kabitigidi`";
    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
           
    // Check for successful insertion
    if ($result) {
        echo "Wetegeleza<br/>";
        var_dump($result);
        echo "<br/>ngunyi chooti<br/>";
        var_dump($rows);
    } else {
        echo "Enjagga ekmaulu<br/>";
        var_dump($result);
    }
}catch(PDOException $ex){
    die($ex->getMessage());
}

  
?>
