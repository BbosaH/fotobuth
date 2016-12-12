<?php
header('Access-Control-Allow-Origin: *');

require_once '../include/DbHandler.php';
require_once '../include/PassHash.php';
require '../libs/Slim/Slim/Slim.php';
 
\Slim\Slim::registerAutoloader();
 
$app = new \Slim\Slim();

$dbHandler = new DbHandler();
 
// User id from db - Global Variable
$user_id = NULL;
 


 

/**
 * User Registration
 * url - /register
 * method - POST
 * params - name, email, password
 */
// $app->post('/register', function() use ($app) {
//             // check for required params
//             verifyRequiredParams(array('first_name','last_name', 'email', 'password',));
 
//             $response = array();
 
//             // reading post params
//             $name = $app->request->post('name');
//             $email = $app->request->post('email');
//             $password = $app->request->post('password');
 
//             // validating email address
//             validateEmail($email);
 
//             $db = new DbHandler();
//             $res = $db->createUser($name, $email, $password);
 
//             if ($res == USER_CREATED_SUCCESSFULLY) {
//                 $response["error"] = false;
//                 $response["message"] = "You are successfully registered";
//                 echoRespnse(201, $response);
//             } else if ($res == USER_CREATE_FAILED) {
//                 $response["error"] = true;
//                 $response["message"] = "Oops! An error occurred while registereing";
//                 echoRespnse(200, $response);
//             } else if ($res == USER_ALREADY_EXISTED) {
//                 $response["error"] = true;
//                 $response["message"] = "Sorry, this email already existed";
//                 echoRespnse(200, $response);
//             }
//         });

/**
 * User Login
 * url - /login
 * method - POST
 * params - email, password
 */
// $app->post('/login', function() use ($app) {
//             // check for required params
//             verifyRequiredParams(array('email', 'password'));
 
//             // reading post params
//             $email = $app->request()->post('email');
//             $password = $app->request()->post('password');
//             $response = array();
 
//             $db = new DbHandler();
//             // check for correct email and password
//             if ($db->checkLogin($email, $password)) {
//                 // get the user by email
//                 $user = $db->getUserByEmail($email);
 
//                 if ($user != NULL) {
//                     $response["error"] = false;
//                     $response['name'] = $user['name'];
//                     $response['email'] = $user['email'];
//                     $response['apiKey'] = $user['api_key'];
//                     $response['createdAt'] = $user['created_at'];
//                 } else {
//                     // unknown error occurred
//                     $response['error'] = true;
//                     $response['message'] = "An error occurred. Please try again";
//                 }
//             } else {
//                 // user credentials are wrong
//                 $response['error'] = true;
//                 $response['message'] = 'Login failed. Incorrect credentials';
//             }
 
//             echoRespnse(200, $response);
//         });


$app->get("//fotoserver/v1//universities","getUniversities");

$app->run();

echo var_dump($_SERVER);

function getUniversities()
{
    $universities = $dbHandler.getAll("SELECT *FROM university");

    if(!empty($universities))
    {
        
        $app->response()->header("Content-Type", "application/json");
        echo json_encode($universities);
        
    }
    echo json_encode("cyout");
}

/**
 * Verifying required params posted or not
 */
function verifyRequiredParams($required_fields) {

    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoRespnse(400, $response);
        $app->stop();
    }
}
 
/**
 * Validating email address
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoRespnse(400, $response);
        $app->stop();
    }
}
 
/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}





?>