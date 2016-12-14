<?php
  include("include/DbConnect.php");
  
  $sql = "INSERT INTO `chat` (`id`, `user_id`, `to_user_id`, `date_created`) VALUES
(1, 1, 2, '1481045249'),
(3, 1, 3, '1481045259'),
(8, 1, 4, '1481045269'),
(9, 1, 15, '1481299459'),
(10, 1, 6, '1481302301'),
(11, 1, 6, '1481302376'),
(12, 1, 6, '1481302429'),
(13, 1, 4, '1481304867'),
(14, 1, 6, '1481304927'),
(15, 1, 5, '1481305462'),
(16, 1, 6, '1481305663'),
(17, 1, 6, '1481306614'),
(18, 1, 7, '1481306745'),
(19, 1, 8, '1481306810'),
(20, 1, 9, '1481306901'),
(21, 1, 9, '1481307428'),
(22, 1, 10, '1481307568'),
(23, 1, 6, '1481307661'),
(24, 1, 8, '1481307719'),
(25, 1, 10, '1481307912'),
(26, 1, 9, '1481308070'),
(27, 1, 13, '1481308628'),
(28, 1, 6, '1481371454'),
(29, 1, 6, '1481371974'),
(30, 1, 6, '1481372078'),
(31, 1, 8, '1481372238'),
(32, 1, 10, '1481374168'),
(33, 1, 6, '1481374216');";

//$sql = "drop table kabitigidi";
$sql2 = "INSERT INTO `chat_message` (`id`, `chat_id`, `sender_id`, `reciever_id`, `message_details`, `sent_time`, `status_id`, `remarks`) VALUES
(1, 1, 1, 2, 'Hello boss how are you did you see the man who came along?', '1480423904', 2, 'just a message'),
(2, 3, 3, 1, 'Am okay boss noo i was not able to see him', '1480423919', 3, 'yah nhahaha'),
(3, 1, 2, 1, 'Am also fine buddy cmon', '1480423924\r\n', 3, 'well this is a question'),
(4, 2, 1, 2, 'Hello man', '1480507296', 1, 'just a message'),
(5, 3, 1, 3, 'Hello man can you see', '1480507427', 1, 'just a message'),
(6, 3, 1, 3, 'Hello every', '1480507552', 1, 'just a message'),
(7, 3, 1, 3, 'did you see it?', '1480508010', 1, 'just a message'),
(8, 3, 1, 3, 'buddy', '1480508277', 1, 'just a message'),
(9, 1, 1, 2, 'yo', '1480508699', 1, 'just a message'),
(10, 1, 1, 2, 'yo man', '1480510190', 1, 'just a message'),
(11, 2, 1, 1, 'no man i saw him', '1480510584', 1, 'just a message'),
(12, 1, 1, 2, 'What ?', '1480510716', 1, 'just a message'),
(13, 3, 1, 3, 'what', '1480511078', 1, 'just a message'),
(14, 1, 1, 2, 'buddy', '1480511264', 1, 'just a message'),
(15, 3, 1, 3, 'no mane', '1480511514', 1, 'just a message'),
(16, 1, 2, 1, 'Hello henry', '1480514941', 1, 'just a message'),
(17, 1, 1, 2, 'hi', '1480515223', 1, 'just a message'),
(18, 1, 1, 2, 'hi', '1480594032', 1, 'just a message'),
(19, 1, 1, 2, 'Hello Henry bbosa', '1480594202', 1, 'just a message'),
(20, 1, 2, 1, 'What are you saying?', '1480594229', 1, 'just a message'),
(21, 1, 1, 2, 'hi buddy', '1480594886', 1, 'just a message'),
(22, 1, 1, 2, '', '1480594886', 1, 'just a message'),
(23, 1, 1, 2, 'Hello', '1480595022', 1, 'just a message'),
(24, 1, 1, 2, 'hello', '1480595394', 1, 'just a message'),
(25, 1, 2, 1, 'Helllo man', '1480595841', 1, 'just a message'),
(26, 1, 1, 2, 'hello', '1480595979', 1, 'just a message'),
(27, 1, 2, 1, 'Yes bussy', '1480596021', 1, 'just a message'),
(28, 1, 1, 2, 'hello', '1480598384', 1, 'just a message'),
(29, 1, 1, 2, 'Yesy man', '1480599576', 1, 'just a message'),
(30, 1, 1, 2, 'Yeys man how are you', '1480599602', 1, 'just a message'),
(31, 1, 2, 1, 'hey', '1480599624', 1, 'just a message'),
(32, 1, 1, 2, 'Hello', '1480600351', 1, 'just a message'),
(33, 1, 1, 2, 'Hello man', '1480600453', 1, 'just a message'),
(34, 1, 2, 1, 'Yes man', '1480600550', 1, 'just a message'),
(35, 1, 1, 2, 'Buddy comen', '1480600567', 1, 'just a message'),
(36, 1, 2, 1, 'Cmon boy did you see the man?', '1480600641', 1, 'just a message'),
(37, 1, 1, 2, 'no i dint see it', '1480600657', 1, 'just a message'),
(38, 1, 2, 1, 'Hello wilson', '1480600671', 1, 'just a message'),
(39, 1, 1, 2, 'Can you see 1gaSTA', '1480600686', 1, 'just a message'),
(40, 1, 2, 1, 'nNo i cant see him', '1480600708', 1, 'just a message'),
(41, 1, 1, 2, 'Hey man did you see the music?', '1480600969', 1, 'just a message'),
(42, 1, 1, 2, 'Hello james', '1480601196', 1, 'just a message'),
(43, 1, 2, 1, 'Yes Henry', '1480601227', 1, 'just a message'),
(44, 1, 1, 2, 'Can you see monster hi?', '1480601246', 1, 'just a message'),
(45, 1, 2, 1, 'No i cant wtch my Go tv is gonne', '1480601263', 1, 'just a message'),
(46, 1, 1, 2, 'Okay go fill it', '1480609876', 1, 'just a message'),
(47, 3, 1, 3, 'hi stella', '1480610395', 1, 'just a message'),
(48, 3, 3, 1, 'he henry', '1480610431', 1, 'just a message'),
(49, 3, 3, 1, 'I missed seeing you s', '1480611564', 1, 'just a message'),
(50, 3, 1, 3, 'Yah i seemed to be busy', '1480611664', 1, 'just a message'),
(51, 3, 3, 1, 'Sure comn nawe', '1480611798', 1, 'just a message'),
(52, 3, 3, 1, 'hahahaah', '1480612046', 1, 'just a message'),
(53, 3, 3, 1, '', '1480612047', 1, 'just a message'),
(54, 3, 1, 3, 'yah true', '1480612180', 1, 'just a message'),
(55, 3, 3, 1, 'what?', '1480612302', 1, 'just a message'),
(56, 3, 3, 1, 'yo mane', '1480612649', 1, 'just a message'),
(57, 3, 1, 3, 'Yah man', '1480612729', 1, 'just a message'),
(58, 3, 3, 1, 'okay', '1480612742', 1, 'just a message'),
(59, 3, 1, 3, 'no Imoji', '1480614057', 1, 'just a message'),
(60, 3, 3, 1, 'Yes Imoji', '1480614067', 1, 'just a message'),
(61, 3, 3, 1, 'Helllo Can you send me sms', '1480686004', 1, 'just a message'),
(62, 3, 1, 3, 'yeah i can', '1480686012', 1, 'just a message'),
(63, 3, 3, 1, 'okay thanks alot', '1480686070', 1, 'just a message'),
(64, 3, 1, 3, 'Good', '1480686087', 1, 'just a message'),
(65, 1, 1, 2, 'hhh', '1480695773', 1, 'just a message'),
(66, 1, 1, 2, 'Hello james can i see you today?', '1480703738', 1, 'just a message'),
(67, 1, 1, 2, 'Hello james can i see you today?', '1480703740', 1, 'just a message'),
(68, 1, 1, 2, 'No', '1480703851', 1, 'just a message'),
(69, 1, 2, 1, 'What?', '1480704050', 1, 'just a message'),
(70, 1, 1, 2, 'undefined', '1480704058', 1, 'just a message'),
(71, 1, 2, 1, 'hello', '1480711149', 1, 'just a message'),
(72, 1, 1, 2, 'Ye man', '1480711248', 1, 'just a message'),
(73, 1, 1, 2, 'hello', '1480711453', 1, 'just a message'),
(74, 1, 2, 1, 'Hello', '1480711470', 1, 'just a message'),
(75, 1, 2, 1, 'What?', '1480711487', 1, 'just a message'),
(76, 1, 1, 2, 'hi', '1480711968', 1, 'just a message'),
(77, 1, 1, 2, 'hi', '1480712242', 1, 'just a message'),
(78, 1, 1, 2, 'hi mm', '1480712472', 1, 'just a message'),
(79, 1, 2, 1, 'yo', '1480712497', 1, 'just a message'),
(80, 1, 1, 2, 'Hey', '1480744489', 1, 'just a message'),
(81, 1, 2, 1, 'Yo man', '1480744651', 1, 'just a message'),
(82, 1, 1, 2, 'Watsapp man', '1480745708', 1, 'just a message'),
(83, 1, 2, 1, 'Am cool', '1480745716', 1, 'just a message'),
(84, 1, 1, 2, 'Did you see the man', '1480745738', 1, 'just a message'),
(85, 1, 2, 1, 'no', '1480745747', 1, 'just a message'),
(86, 1, 1, 2, 'Kati when are you seeing the  man?', '1480745816', 1, 'just a message'),
(87, 1, 2, 1, 'I hope to see him tommorow', '1480745839', 1, 'just a message'),
(88, 1, 1, 2, 'hi James', '1480766914', 1, 'just a message'),
(89, 1, 2, 1, 'Yo', '1480767243', 1, 'just a message'),
(90, 1, 1, 2, 'Yo man', '1480768077', 1, 'just a message'),
(91, 1, 2, 1, 'How are you', '1480768688', 1, 'just a message'),
(92, 1, 1, 2, 'Am really fine', '1480768699', 1, 'just a message'),
(93, 1, 1, 2, 'Hello', '1480768751', 1, 'just a message'),
(94, 3, 3, 1, 'What are you', '1480768768', 1, 'just a message'),
(95, 3, 3, 1, 'What is you buddy', '1480772409', 1, 'just a message'),
(96, 3, 1, 3, 'po', '1480832434', 1, 'just a message'),
(97, 1, 1, 2, 'htth', '1481300245', 1, 'just a message'),
(98, 1, 1, 2, '', '1481300248', 1, 'just a message'),
(99, 1, 1, 2, 'yo', '1481300272', 1, 'just a message');";

$sql3 = "INSERT INTO `myclass` (`id`, `name`, `school_id`, `code`, `description`) VALUES
(1, 'computer science class', 1, '', 'Involves  deep knowlegde about the computer'),
(2, 'Architecture class', 2, '', 'involves technology and art of house designing'),
(3, 'Energy Systems', 2, '', 'This is study of Energy systmems'),
(4, 'Forest science', 3, '', 'science about forests'),
(5, 'General studies', 4, '', 'general');";

$sql4="INSERT INTO `school` (`id`, `name`, `university_id`, `description`) VALUES
(1, 'School of computing', 1, 'This involves computing and information technology'),
(2, 'School of Art And Technology', 2, 'This is the school that works with technology advancements'),
(3, 'School of forestry', 1, 'about forests'),
(4, 'School of Medicals', 1, 'about being a doctor');";

$sql5="INSERT INTO `status` (`id`, `name`, `remarks`) VALUES
(1, 'pending', 'This is a message that a user has clicked sent but has not yet arrives to recivers phone'),
(2, 'sent', 'This is message sent and recived by reciver'),
(3, 'seen', 'This is a message that the reciver has seen and read');";

$sql6 = "INSERT INTO `strong_subject` (`id`, `subject_id`, `user_id`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 7, 1),
(4, 6, 1),
(5, 7, 1),
(6, 4, 1),
(7, 6, 1),
(8, 7, 1),
(9, 6, 11),
(10, 7, 11),
(11, 1, 12),
(12, 7, 12),
(13, 1, 13),
(14, 7, 13),
(15, 7, 2),
(16, 8, 2),
(17, 1, 14),
(18, 7, 14),
(19, 1, 15),
(20, 6, 15),
(21, 7, 15);";

$sql7 = "INSERT INTO `subject` (`id`, `name`, `code`, `description`) VALUES
(1, 'Calculus', 'CSC2100', 'This is about integration mathematics'),
(2, 'Statictics', 'STC1102', 'This is about massive counting and computing'),
(3, 'Automata', 'CSC1022', 'This is automata'),
(4, 'Engineering Mathematics', 'ENG1230', 'This is Engineering in mathematics'),
(5, 'History', 'HIS1320', 'This is about European History'),
(6, 'Business Logic', 'BSE1203', 'This is predicate logic'),
(7, 'Data Structures and Algorithms', 'BSSE1200', 'This is about designing software algorithms'),
(8, 'Big Energy Systems', 'ENR 1202', 'The study about big energy systems');";

$sql8 = "INSERT INTO `subject_myclass` (`id`, `myclass_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 6),
(4, 3, 7),
(5, 3, 6),
(6, 2, 4),
(7, 2, 5),
(8, 3, 5),
(9, 1, 7),
(10, 3, 8);";

$sql9 = "INSERT INTO `university` (`id`, `name`, `country`, `description`, `date_created`) VALUES
(1, 'University of Upasalla', 'Sweden', 'This  is one of the best universities in upsalla town', '1481383407'),
(2, 'University of Stockholm', 'Sweden', 'Thi  is one of the best universities in stockholm', '1481383407'),
(3, 'university of Makrere', 'Uganda', 'thiis isiiisdd', '1481472764');";

$sql10 = "INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `email`, `password_hash`, `phone_number`, `university`, `school`, `classs`, `auth_tocken`, `avatar`, `chat_status`, `level`) VALUES
(1, 'henry', 'Bbosa', 'female', 'bbosa.henry1@gmail.com', '$2a$10$bb7c46b506c1ccf374be4u5fNopGDYh0LzFwAzo5yBWhVsUYBgqN2', '077777777', '1', '1', '1', '6325ab30f8d2b4543e637507ebc820cd', 'avatar.png', 1, 0),
(2, 'james', 'Walusimbi', 'male', 'jameswalusimbi@gmail.com', '$2a$10$c700a7e0d2ab05f6a7a51uFMDeLYS97wH7gS72Oqb4AsVnydXZKda', '0777777557', '1', '1', '1', '78ecc61ff9401e0fafeb50d98b26d7dc', 'avatar.png', 1, 0),
(3, 'Stellah', 'Nakiboneka', 'female', 'nakiboneka@gmail.com', '$2a$10$bb7c46b506c1ccf374be4u5fNopGDYh0LzFwAzo5yBWhVsUYBgqN2', '', '1', '1', '1', '168533e524a5c7e51cbb0dfde18964fb', 'avatar.png', 1, 0),
(4, 'arnold', 'Petterssoon', 'male', 'arnold.pettersson@gmail.com', '$2a$10$46af66222c8966e246c09OJyN6nl4uyIQMRtcYwc1A5A1ocwhm9Fq', '0777777557', '1', '1', '1', '0dcf8e049752fa9cbe04c4037c3e015b', 'avatar.png', 0, 0),
(5, 'petter', 'james', 'male', 'peter@james.com', '$2a$10$678c7390c2b6819770cf2uGKjd4M64B2KjjcHPa0bUycEqs1Keci2', '077788899', '1', '1', '1', '59ab1b4cdb056e4f05cd501dc3dde0da', 'avatar.png', 0, 0),
(6, 'james', 'petter', 'male', 'james@peter.com', '$2a$10$f12fab63030d33e10a020uLxZS4w4U450jy0zce8.GPUTBJU3D146', '08989899', '1', '1', '1', 'b8c8e9118bd0615e1b3a6b4e8ec90cfe', 'avatar.png', 0, 0),
(7, 'lujja', 'Bbosa', 'male', 'henrybbosa@rocketmail.com', '$2a$10$22a5a3bb2f892bc8a71e5uS5RI7/OHpl8v1N.DWmv1epXhNIln7u2', '0777777557', '1', '1', '1', '9d8369c8aa3fbb1658b874629e6a420a', 'avatar.png', 0, 0),
(8, 'peter', 'opata', 'male', 'peter@opata.com', '$2a$10$d7d72f051674fb82c8138eJVWS2JacUAPem8ngiqH3zHpMVUh2hR2', '0777777477', '1', '1', '1', '73a61ae74d45ec9875cc0d2056e6d029', 'avatar.png', 0, 0),
(9, 'james', 'walu', 'male', 'jameswalu', '$2a$10$9ba82bc7d4108389de81ceJMQNNGyA1Qsh7DmfaFcfs/eeSXulLWW', '0789789789', '1', '1', '1', '053dcd54661298b200d10c2f32dcecae', 'avatar.png', 0, 0),
(10, 'wilson', 'normis', 'male', 'nomiswilson@gmail.com', '$2a$10$4602d8db1ecdceed085dfuvzRiIjGxePk1yQAmYWrGii/xU0B.YcG', '0789789789', '1', '3', '4', '8bb758c1de6d313ef189ddd13faf829a', 'avatar.png', 0, 0),
(11, 'mike', 'nyola', 'male', 'nyola@live.com', '$2a$10$af255a6ac1c6135eb1051uzkH4x2ih2fiydHQupsGYSklqyrF6f8q', '089898989', '1', '1', '1', 'fda1a281e6602672b910257c36b20dea', 'avatar.png', 0, 0),
(12, 'winner', 'muwanguzi', 'male', 'samuel.muwa@gmail.com', '$2a$10$b16e7dbcff597859507faOvCs2tHsrAXKAmwV4vccwKqEtjkKyAce', '07897898', '1', '1', '1', 'fb789dab11d08be00d4d82976aa95d12', 'avatar.png', 0, 0),
(13, 'Bongani', 'Impendulo', 'male', 'bongani@gmail.com', '$2a$10$dc75040d6cd0012758ffeet.9wPJO2moGback1HZzretn7XVhq/um', '0777887887', '1', '1', '1', 'd4005332b4c45da440e602076df46e6d', 'avatar.png', 0, 0),
(14, 'diana', 'Mbatudde', 'male', 'mbatudde.sam@gmail.com', '$2a$10$62514247be778fe250159ugNnDKQ3RU5mdMOfP.d7Udq/mrssEFqS', '0789789789', '1', '1', '1', 'ae1b6e22318fcd3c7d84676978547400', 'avatar.png', 0, 0),
(15, 'Nisha', 'Nyola', 'male', 'nyola@gmail.com', '$2a$10$62d7b1d498a60613d5e77Oj8ThdLWQSlvqAX6B1SZf57tQMIMuMI6', '0789789', '1', '1', '1', 'ebf45594f9d0a19ab9c1537c0857fd1c', 'NishaNyola1481297573.png', 0, 0);";

$sql11 = "INSERT INTO `user_connection` (`id`, `user_id`, `resource_id`, `chat_id`, `remarks`) VALUES
(22, 1, 90, 1, 'new connection'),
(39, 1, 167, 3, 'new connection');";

$sql12 = "INSERT INTO `weak_subject` (`id`, `subject_id`, `user_id`) VALUES
(1, 7, 1),
(2, 6, 1),
(3, 7, 1),
(4, 1, 11),
(5, 4, 11),
(6, 4, 12),
(7, 6, 12),
(8, 4, 13),
(9, 6, 13),
(10, 4, 14),
(11, 6, 14),
(12, 4, 15);";

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
