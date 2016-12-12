<?php	
	
	
	

	//header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	//require_once =;
	require_once('include/DbHandler.php');
	/*require_once 'include/PassHash.php';*/
	/*require '../libs/Slim/Slim/Slim.php';*/
   /*funcs*/

    $dbHandler = new DbHandler();

	function getUniversities()
	{
		global $dbHandler;

	    $universities = $dbHandler->getAll("SELECT *FROM university");

	    if(!empty($universities))
	    {
	        
	        //$app->response()->header("Content-Type", "application/json");
	        header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
		header('Access-Control-Allow-Origin: *');
		//header('Access-Control-Request-Headers: access-control-allow-origin');
		header('Accept: */*');
		header('Content-Type: application/json');	
	        echo json_encode($universities);
	        
	    }
	    //echo json_encode("cyout");
	}

	function getUsers($querystring)
	{
		global $dbHandler;

	    $users = $dbHandler->getAll($querystring);

	    if(!empty($users))
	    {
	        $final_users = [];
	        //$app->response()->header("Content-Type", "application/json");
	        foreach($users as $user){
	        	//getting university
	        	$real_universities = $dbHandler->getAll("SELECT *FROM university WHERE id='".$user['university']."'");
	        	if(!empty($real_universities))
	        	{
	        		$user['real_university']=$real_universities[0];
	        	}

	        	//getting school
	        	$real_schools = $dbHandler->getAll("SELECT *FROM school WHERE id='".$user['school']."'");
	        	if(!empty($real_schools))
	        	{
	        		$user['real_school']=$real_schools[0];
	        	}

	        	//getting class
	        	$real_classes = $dbHandler->getAll("SELECT *FROM myclass WHERE id='".$user['classs']."'");
	        	if(!empty($real_classes))
	        	{
	        		$user['real_class']=$real_classes[0];
	        	}


	        	$user['strong_subjects'] = [];
	        	$user['weak_subjects'] = [];

	        	$strong_subjects = $dbHandler->getAll("SELECT *FROM strong_subject WHERE user_id='".$user['id']."'");

	        	foreach ($strong_subjects as $strong_subject) {
	        		# code...
	        		$strong_real_subjects = $dbHandler->getAll("SELECT *FROM subject WHERE id='".$strong_subject['subject_id']."'");
	        		if(!empty($strong_real_subjects)){

		        		$strong_real_subject = $strong_real_subjects[0];
		        		array_push($user['strong_subjects'],$strong_real_subject);
	        		}

	        	}

	        	$weak_subjects = $dbHandler->getAll("SELECT *FROM weak_subject WHERE user_id='".$user['id']."'");

	        	
	        	foreach ($weak_subjects as $weak_subject) {
	        		# code...
	        		$weak_real_subjects = $dbHandler->getAll("SELECT *FROM subject WHERE id='".$weak_subject['subject_id']."'");
	        		if(!empty($weak_real_subjects)){
	        		$weak_real_subject = $weak_real_subjects[0];
	        			array_push($user['weak_subjects'],$weak_real_subject);
	        		}
	        	}

	        	
	        	$final_user =array(



	        		'id'=>$user['id'],
	        		'first_name' =>$user['first_name'],
	        		'last_name' =>$user['last_name'],
	        		'gender'=>$user['gender'],
	        		'email'=>$user['email'],
	        		'password_hash'=>$user['password_hash'],
	        		'phone_number'=>$user['phone_number'],
	        		'university'=>$user['real_university'],
	        		'school'=>$user['real_school'],
	        		'class'=>$user['real_class'],
	        		'auth_tocken'=>$user['auth_tocken'],
	        		'avatar'=>$user['avatar'],
	        		'strong_subjects'=>$user['strong_subjects'],
	        		'weak_subjects'=>$user['weak_subjects']



	        	);

	        	array_push($final_users,$final_user);


	        }
	        echo json_encode($final_users);
	        
	    }else if(empty($users))
	    {
	    	echo json_encode(0);
	    }
	    //echo json_encode("cyout");
	}


	/*end points*/

	if(isset($_GET['universities']))
	{
		
	    getUniversities();
	}else if(isset($_GET['users']))
	{
		header('Access-Control-Allow-Origin: *');
		getUsers("SELECT *FROM user");
	}
	else if(isset($_GET['university_id']))
	{
		header('Access-Control-Allow-Origin: *');
		$university_schools = $dbHandler->getAll("SELECT *FROM school WHERE university_id='".$_GET['university_id']."'");
		echo json_encode($university_schools);
	}else if(isset($_GET['school_id']))
	{
		header('Access-Control-Allow-Origin: *');
		$school_classes = $dbHandler->getAll("SELECT *FROM myclass WHERE school_id='".$_GET['school_id']."'");
		echo json_encode($school_classes);
	}else if (isset($_POST['func']))
	{
		header('Access-Control-Allow-Origin: *');
		//var_dump($_FILES);
		$functionality=$_POST['func'];
		if(strcmp($functionality,'signup')==0)
		{
			$first_name =$_POST['first_name'];
			$last_name =$_POST['last_name'];
			$gender =$_POST['gender'];
			$email =$_POST['email'];
			$password =$_POST['password'];
			$phone =$_POST['phone'];
			$university_id=$_POST['university_id'];
			$school_id=$_POST['school_id'];
			$class_id=$_POST['class_id'];

			//$avatar= "avatar.png";
			$chat_status=0;

			$current_time = time();
			

			if(isset($_FILES))
	        {
	        	move_uploaded_file($_FILES['my_avatar']["tmp_name"], "uploads/".$first_name.$last_name.$current_time.".png");
	        	$avatar=$first_name.$last_name.$current_time.".png";

	        }else
	        {
	        	$avatar= "avatar.png";

	        }


			 $res =$dbHandler->createUser($first_name,$last_name,$gender,$email,$password,$phone,$university_id,$school_id,$class_id,$avatar,$chat_status);
			 echo json_encode($res);

		}else if(strcmp($functionality,'login')==0)
		{
		    session_start();
			$email =$_POST['email'];
			$password =$_POST['password'];

			$lres =$dbHandler->checkLogin($email, $password);
			if($lres!=0 || $lres!=-1 ){
				$_SESSION['SESS_MEMBER_ID']=$lres['auth_tocken'];
		    }
			echo json_encode($lres);

		}else if(strcmp($functionality,'add_str_sub')==0)
		{
			$user_id=$_POST['user_id'];
			$subject_id=$_POST['subject_id'];
			$keyword='strong';

			$dbHandler->insertSubject($user_id,$subject_id,$keyword);

		}else if(strcmp($functionality,'add_wk_sub')==0)
		{
			$user_id=$_POST['user_id'];
			$subject_id=$_POST['subject_id'];
			$keyword='weak';

			$dbHandler->insertSubject($user_id,$subject_id,$keyword);

		}

	}else if(isset($_GET['strong_subjects'])&&isset($_GET['authentication_tocken']))
	{
		header('Access-Control-Allow-Origin: *');
		$tocken = $_GET['authentication_tocken'];
		$mysubjects = [];
		$users = $dbHandler->getAll("SELECT *FROM user WHERE auth_tocken='".$tocken."'");
		if(!empty($users))
		{
			$user = $users[0];
			$class_id =$user['classs'];
			$subject_myclasses = $dbHandler->getAll("SELECT *FROM subject_myclass WHERE myclass_id='".$class_id."'");
			if(!empty($subject_myclasses))
			{
				foreach ($subject_myclasses as $subject_myclass) {
					# code...
					$subject_id = $subject_myclass['subject_id'];
					$subjects = $dbHandler->getAll("SELECT *FROM subject WHERE id='".$subject_id."'");
					if(!empty($subjects))
					{

						$subject = $subjects[0];
						array_push($mysubjects, $subject);

					}
				}
			}

			echo json_encode($mysubjects);

		}


	}else if(isset($_GET['weak_subjects'])&&isset($_GET['authentication_tocken']))
	{
		header('Access-Control-Allow-Origin: *');
		$tocken = $_GET['authentication_tocken'];
		$mysubjects = [];

		$users = $dbHandler->getAll("SELECT *FROM user WHERE auth_tocken='".$tocken."'");
		if(!empty($users))
		{
			$user = $users[0];
			$class_id =$user['classs'];
			$subject_myclasses = $dbHandler->getAll("SELECT *FROM subject_myclass WHERE myclass_id='".$class_id."'");
			if(!empty($subject_myclasses))
			{
				foreach ($subject_myclasses as $subject_myclass) {
					# code...
					$subject_id = $subject_myclass['subject_id'];
					$alreadysubjects = $dbHandler->getAll("SELECT *FROM strong_subject WHERE subject_id='".$subject_id."' AND user_id='".$user['id']."'");
					if(count($alreadysubjects)==0){
						$subjects = $dbHandler->getAll("SELECT *FROM subject WHERE id='".$subject_id."'");
						if(!empty($subjects))
						{

							$subject = $subjects[0];
							array_push($mysubjects, $subject);

						}
					}
				}
			}

			echo json_encode($mysubjects);

		}

	}else if(isset($_GET['chats'])&&isset($_GET['user_id']))
	{
		
		
		header('Access-Control-Allow-Origin: *');
		$mychats =[];
		$user_id = $_GET['user_id'];
		$chats = $dbHandler->getAll("SELECT *FROM chat WHERE user_id='".$user_id."' OR to_user_id='".$user_id."'");
		//echo ($chats);
		if(!empty($chats))
		{
			foreach ($chats as $chat) {
				$chat['messages']=[];
				if($user_id==$chat['to_user_id']){

					$toUsers = $dbHandler->getAll("SELECT *FROM user WHERE id='".$chat['user_id']."'");

				}else if($user_id==$chat['user_id'])
				{
					$toUsers = $dbHandler->getAll("SELECT *FROM user WHERE id='".$chat['to_user_id']."'");
				}
				

				if(!empty($toUsers))
				{
					$toUser = $toUsers[0];
				}
				# code...
				$chat_messages = $dbHandler->getAll("SELECT *FROM chat_message WHERE chat_id='".$chat['id']."'");
				
				if(!empty($chat_messages)){

					$chat = array(
	                'id'=>$chat['id'],
	                'user_id'=>$chat['user_id'],
	                'to_user'=>$toUser,
	                'chat_messages'=>$chat_messages

					);


				    array_push($mychats,$chat);
			   }

			}

			

			echo json_encode($mychats);


		}

		
		//returning my chats array from database


	}else if(isset($_POST['typed_message']))
	{
		header('Access-Control-Allow-Origin: *');

		$chat_id = $_POST['chat_id'];
		$sender_id = $_POST['sender_id'];
		$reciever_id = $_POST['reciever_id'];
		$message_details = $_POST['message_details'];
		$my_index = $_POST['my_index'];
		$sent_time = time();
		$status_id = $_POST['status_id'];
		$remarks = $_POST['remarks'];

		$id = $dbHandler->insertMessage($chat_id,$sender_id,$reciever_id,$message_details,$sent_time,$status_id,$remarks);
		$msg_obj = array(
				"message_id"=>$id,
				"index" =>$my_index
			);
		echo json_encode($msg_obj);





	}else if(isset($_GET['chat_status'])&&isset($_GET['user_id']))
	{
		header('Access-Control-Allow-Origin: *');
		$user_id = $_GET['user_id'];
		$chats = $dbHandler->getAll("SELECT *FROM chat WHERE user_id='".$user_id."' OR to_user_id='".$user_id."'");
		if(empty($chats))
		{
			$msg_obj = array(
				"user_id"=>$user_id,
				"chats_count" =>0
			);

		}else if(!empty($chats))
		{
			$msg_obj = array(
				"user_id"=>$user_id,
				"chats_count" =>count($chats)
			);

		}
	}else if(isset($_GET['search'])&&isset($_GET['searcher_id'])&&isset($_GET['filter']))
	{

		header('Access-Control-Allow-Origin: *');
		$user_id = $_GET['searcher_id'];
		$searchWord  = $_GET['filter'];
		//echo $searchWord;

		if($searchWord!=''||$searchWord!=null)
		{
			//echo 'togodo';

			$qryB="SELECT * FROM  user WHERE first_name LIKE '%$searchWord%' OR last_name LIKE '%$searchWord%'OR phone_number LIKE '%$searchWord%'OR email LIKE '%$searchWord%'  AND  NOT (id='".$_GET['searcher_id']."')" ;
			 getUsers($qryB);
			

		}else
		{
			echo json_encode(0);
		}

		
	}else if(isset($_GET['new_chat'])&&isset($_GET['user_id'])&&isset($_GET['to_user_id']))
	{
		header('Access-Control-Allow-Origin: *');
		$user_id =$_GET['user_id'];
		$to_user_id =$_GET['to_user_id'];
		$date_created=time();
		$new_chat = $dbHandler->insertNewChat($user_id,$to_user_id,$date_created);
		$chat_user_id = $new_chat['user_id'];
		$chat_to_user_id = $new_chat['to_user_id'];
		$chat_users = $dbHandler->getAll("SELECT *FROM user WHERE id='".$chat_user_id."'");
		$chat_user = null;
		$chat_to_user = null;
		if(!empty($chat_users))
		{
			$chat_user =$chat_users[0];
		}

		$chat_to_users = $dbHandler->getAll("SELECT *FROM user WHERE id='".$chat_to_user_id."'");

		if(!empty($chat_to_users))
		{
			$chat_to_user =$chat_to_users[0];
		}
		$chat = array(


				'id'=>$new_chat['id'],
				'user'=>$chat_user,
				'to_user'=>$chat_to_user
				

		);
		echo json_encode($chat);

	}

	

	

?>
