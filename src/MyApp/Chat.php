<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
//include 'include/DbHandler.php';

class Chat implements MessageComponentInterface {
    protected $clients;
    private $connn;

    public function __construct() {

         // $servername ='localhost';
         // $dbname ='studentaid';
         // $username ='root';
         // $password ='';

         $servername ='172.30.52.180';
         $dbname ='aid_db';
         $username ='aid_user';
         $password ='aid_password';
        
         $this->connn = new \PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
         $this->connn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    	 echo "Connecting ......";
        
           //  = new \mysqli($servername, $username, $password, $dbname);
          
       
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
         
    	/*Called when a new client has connected*/

        // Store the new connection to send messages to later
        $querystring = $conn->WebSocket->request->getQuery()->toArray();

        if(!empty($querystring))
        {
            $id = $querystring['user_id'];
            $chat_id = $querystring['chat_id'];
             echo $id;
        }
        echo json_encode($querystring);
        $this->clients->attach($conn);

        $remarks="new connection";

        $stmt = $this->connn->prepare("INSERT INTO user_connection(user_id,resource_id,chat_id,remarks) VALUES ('".$querystring['user_id']."','".$conn->resourceId."','".$querystring['chat_id']."','".$remarks."')");
         $result = $stmt->execute();
          if ($result) {
                  // User successfully inserted message
                echo json_encode(
                    array(

                            'user_id'=>$querystring['user_id'],
                            'resource_id'=>$conn->resourceId,
                            'chat_id'=>$querystring['chat_id']

                    )
                );
                
                
        } else {
                // Failed to create user
                echo 0;;
        }
        $remarks="current connection";

        

        echo "New connection! ({$conn->resourceId})\n";
        
    }

    public function onMessage(ConnectionInterface $from, $msg) {

    	/*called when a message is recieved by a connection*/

        

        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $decoded_message =json_decode($msg,true);

        $reciever_id = $decoded_message['toId'];
        $decoded_chat_id = $decoded_message['chatId'];

        $query = $this->connn->query("SELECT *FROM user_connection WHERE chat_id='".$decoded_chat_id."'");
         $rows = $query->fetchAll(\PDO::FETCH_ASSOC);

         foreach ($rows as $row) {

            $res_id = $row['resource_id'];
            $chat_id = $row['chat_id']; 
             # code...
            foreach ($this->clients as $client) {
           
                if ($from !== $client && $client->resourceId == $res_id) {
                    // The sender is not the receiver, send to each client connected

                    $client->send($msg);
                }

            }
            
         }
         


        
    }

    public function onClose(ConnectionInterface $conn) {

    	/*Called when the connection is closed*/

        // The connection is closed, remove it, as we can no longer send it messages

        $stmt = $this->connn->prepare("DELETE FROM user_connection WHERE resource_id='".$conn->resourceId."' ");
        $stmt->execute();

        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {

    	/*Called when there is an error to the connection*/

        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
?>
