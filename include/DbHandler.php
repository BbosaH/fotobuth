<?php
 
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Tariiq Henry Bbosa
 */
//require_once 'PassHash.php';
class DbHandler {
 
    private $conn;

    
 
    function __construct() {
        // require_once dirname(__FILE__) . './DbConnect.php';
        // require_once dirname(__FILE__) . './PassHash.php';
        require_once 'DbConnect.php';
        require_once 'PassHash.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    /* ------------- `users` table method ------------------ */
 
    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $password User login password
     */
    public function createUser($first_name,$last_name,$gender, $email, $password,$phone,$university_id,$school_id,$class_id,$avatar,$chat_status){
        require_once 'PassHash.php';
        $response = array();
 
        // First check if user already existed in db
        if (!$this->isUserExists($email)) {
            // Generating password hash
            $password_hash = PassHash::hash($password);
 
            // Generating API key
            $api_key = $this->generateApiKey();
 
            // insert query
          $stmt = $this->conn->prepare("INSERT INTO user(first_name,last_name,gender,email, password_hash,phone_number,auth_tocken,university,school,classs,avatar,chat_status) VALUES ('".$first_name."','".$last_name."','".$gender."','".$email."','".$password_hash."','".$phone."','".$api_key."','".$university_id."','".$school_id."','".$class_id."','".$avatar."','".$chat_status."')");
           
            $result = $stmt->execute();
 
            //$stmt->close();
 
            // Check for successful insertion
            if ($result) {
                // User successfully inserted
                //return USER_CREATED_SUCCESSFULLY;
                $users = $this->getAll("SELECT *FROM user WHERE auth_tocken ='".$api_key."'");
                return $users[0];

            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
        } else {
            // User with same email already existed in the db
            return USER_ALREADY_EXISTED;
        }
 
        return $response;
    }
 
    /**
     * Checking user login
     * @param String $email User login email id
     * @param String $password User login password
     * @return boolean User login status success/fail
     */
    public function checkLogin($email, $password) {
        // fetching user by email
        //$stmt = $this->conn->prepare("SELECT password_hash FROM user WHERE email ='".$email."'");

        $users = $this->getAll("SELECT *FROM user WHERE email ='".$email."'");
        if(!empty($users))
        {
          $password_hash =$users[0]['password_hash'];
        
       
       
 
            if (PassHash::check_password($password_hash, $password)) {
                // User password is correct
                return $users[0];
            } else {
                // user password is incorrect
                return 0;
            }
        } else {
            //$stmt->close();
 
            // user not existed with the email
            return -1;
        }
    }
 
    /**
     * Checking for duplicate user by email address
     * @param String $email email to check in db
     * @return boolean
     */
    private function isUserExists($email) {
        $userExists = false;
        $query = $this->conn->query("SELECT id from user WHERE email ='".$email."'");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC); 
        if(count($rows)>0)
        {
            $userExists = true;
        }else
        {
           $userExists = false; 
        }
        return $userExists;
        //return $num_rows > 0;
    }
 
    /**
     * Fetching user by email
     * @param String $email User email id
     */
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT name, email, api_key, status, created_at FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }
 
    /**
     * Fetching user api key
     * @param String $user_id user id primary key in user table
     */
    public function getApiKeyById($user_id) {
        $stmt = $this->conn->prepare("SELECT api_key FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            $api_key = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $api_key;
        } else {
            return NULL;
        }
    }
 
    /**
     * Fetching user id by api key
     * @param String $api_key user api key
     */
    public function getUserId($api_key) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        if ($stmt->execute()) {
            $user_id = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user_id;
        } else {
            return NULL;
        }
    }
 
    /**
     * Validating user api key
     * If the api key is there in db, it is a valid key
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key) {
        $stmt = $this->conn->prepare("SELECT id from users WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
 
    /**
     * Generating random Unique MD5 String for user Api key
     */
    private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
 
    /* ------------- `tasks` table method ------------------ */
 
    /**
     * Creating new task
     * @param String $user_id user id to whom task belongs to
     * @param String $task task text
     */
    public function createTask($user_id, $task) {        
        $stmt = $this->conn->prepare("INSERT INTO tasks(task) VALUES(?)");
        $stmt->bind_param("s", $task);
        $result = $stmt->execute();
        $stmt->close();
 
        if ($result) {
            // task row created
            // now assign the task to user
            $new_task_id = $this->conn->insert_id;
            $res = $this->createUserTask($user_id, $new_task_id);
            if ($res) {
                // task created successfully
                return $new_task_id;
            } else {
                // task failed to create
                return NULL;
            }
        } else {
            // task failed to create
            return NULL;
        }
    }
 
    /**
     * Fetching single task
     * @param String $task_id id of the task
     */
    public function getTask($task_id, $user_id) {
        $stmt = $this->conn->prepare("SELECT t.id, t.task, t.status, t.created_at from tasks t, user_tasks ut WHERE t.id = ? AND ut.task_id = t.id AND ut.user_id = ?");
        $stmt->bind_param("ii", $task_id, $user_id);
        if ($stmt->execute()) {
            $task = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $task;
        } else {
            return NULL;
        }
    }
 
    /**
     * Fetching all user tasks
     * @param String $user_id id of the user
     */
    public function getAllUserTasks($user_id) {
        $stmt = $this->conn->prepare("SELECT t.* FROM tasks t, user_tasks ut WHERE t.id = ut.task_id AND ut.user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }
 
    /**
     * Updating task
     * @param String $task_id id of the task
     * @param String $task task text
     * @param String $status task status
     */
    public function updateTask($user_id, $task_id, $task, $status) {
        $stmt = $this->conn->prepare("UPDATE tasks t, user_tasks ut set t.task = ?, t.status = ? WHERE t.id = ? AND t.id = ut.task_id AND ut.user_id = ?");
        $stmt->bind_param("siii", $task, $status, $task_id, $user_id);
        $stmt->execute();
        $num_affected_rows = $stmt->affected_rows;
        $stmt->close();
        return $num_affected_rows > 0;
    }
 
    /**
     * Deleting a task
     * @param String $task_id id of the task to delete
     */
    public function deleteTask($user_id, $task_id) {
        $stmt = $this->conn->prepare("DELETE t FROM tasks t, user_tasks ut WHERE t.id = ? AND ut.task_id = t.id AND ut.user_id = ?");
        $stmt->bind_param("ii", $task_id, $user_id);
        $stmt->execute();
        $num_affected_rows = $stmt->affected_rows;
        $stmt->close();
        return $num_affected_rows > 0;
    }
 
    /* ------------- `user_tasks` table method ------------------ */
 
    /**
     * Function to assign a task to user
     * @param String $user_id id of the user
     * @param String $task_id id of the task
     */
    public function createUserTask($user_id, $task_id) {
        $stmt = $this->conn->prepare("INSERT INTO user_tasks(user_id, task_id) values(?, ?)");
        $stmt->bind_param("ii", $user_id, $task_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getAll($querystring)
    {
        try{
            
            if(strpos($querystring, "SELEC") !== false){
                $query = $this->conn->query($querystring);
                $rows = $query->fetchAll(PDO::FETCH_ASSOC); 
                
                return $rows;
            }
            else
             {
                $query = $this->conn->prepare($querystring);
                $query->execute();
                return;

             } 
            


        }catch(PDOException $ex){
            die($ex->getMessage());
        }

        return;
    }

   function insertNewUser($first_name,$last_name,$email,$password,$gender,$avatar)
    {
        global $dbase;

        $querystring= "INSERT INTO user (first_name,last_name,email,password,city_id,date_of_birth,sex,social,avatar,social_id,phone_number)VALUES ('".$first_name."','".$last_name."','".$email."','".$password."','".$city_id."','".$date_of_birth."','".$gender."','".$social."','".$avatar."','".$social_id."','".$phone."')";

        $query = $dbase->prepare($querystring);
        //echo $query;
        try{
            $query->execute();
            $querystring2 ="SELECT id FROM user WHERE email ='".$email."'";
            $res = $this->getAll($querystring2);


            //echo $res[0]["id"];
             $logObj =array(
                "email"=>$email,
                "password"=>$password
             );
            return $logObj;
        }catch(PDOException $ex){
            die($ex->getMessage());
        }

    }

    public function insertSubject($user_id,$subject_id,$keyword)
    {


        if(strcmp($keyword,'strong')==0)
        {
           $stmt = $this->conn->prepare("INSERT INTO strong_subject(user_id,subject_id) VALUES ('".$user_id."','".$subject_id."')");

        }else if(strcmp($keyword,'weak')==0)
        {
            $stmt = $this->conn->prepare("INSERT INTO weak_subject(user_id,subject_id) VALUES ('".$user_id."','".$subject_id."')");
        }

        $result = $stmt->execute();

        if ($result) {
                // User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
                
        } else {
                // Failed to create user
                return USER_CREATE_FAILED;
        }


    }

    public function insertMessage($chat_id,$sender_id,$reciever_id,$message_details,$sent_time,$status_id,$remarks)
    {
        $stmt = $this->conn->prepare("INSERT INTO chat_message(chat_id,sender_id,reciever_id,message_details,sent_time,status_id,remarks) VALUES ('".$chat_id."','".$sender_id."','".$reciever_id."','".$message_details."','".$sent_time."','".$status_id."','".$remarks."')");

         $result = $stmt->execute();

        if ($result) {
                // User successfully inserted message
                $myLastMessages = $this->getAll("SELECT *FROM chat_message WHERE sent_time='".$sent_time."' AND message_details= '".$message_details."' AND sender_id='".$sender_id."' ");
                if(!empty($myLastMessages))
                {
                   $myLastMessage=$myLastMessages[0]; 
                   return $myLastMessage['id'];
                }
                return -1;
                
                
        } else {
                // Failed to create user
                return MESSAGE_INSERT_FAILED;
        }


    }

    public function insertConnection($user_id,$resource_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO user_connection(user_id,resource_id,remarks) VALUES ('".$user_id."','".$resource_id."','".$remarks."')");


        $result = $stmt->execute();

        if ($result) {
                  // User successfully inserted message
                return json_encode(
                    array(

                            'user_id'=>$user_id,
                            'resource_id'=>$resource_id

                    )
                );
                
                
        } else {
                // Failed to create user
                return MESSAGE_INSERT_FAILED;
        }

    }

    public function deleteConnection($user_id,$resource_id)
    {

        $stmt = $this->conn->prepare("DELETE FROM user_connection WHERE user_id='".$user_id."' AND resource_id='".$resource_id."' ");


        $result = $stmt->execute();

    }
    public function insertNewChat($user_id,$to_user_id,$date_created)
    {
        $stmt = $this->conn->prepare("INSERT INTO chat(user_id,to_user_id,date_created) VALUES ('".$user_id."','".$to_user_id."','".$date_created."')");


        $result = $stmt->execute();

        if ($result) {
                  // User successfully inserted message
                $this_rows =$this->getAll("SELECT *FROM chat WHERE user_id='".$user_id."' AND to_user_id='".$to_user_id."' AND date_created='".$date_created."' ");
                if(!empty($this_rows))
                {
                    return $this_rows[0];
                }

                return -1;
                
                
        } else {
                // Failed to create user
                return MESSAGE_INSERT_FAILED;
        }

    }
 
}
 
?>