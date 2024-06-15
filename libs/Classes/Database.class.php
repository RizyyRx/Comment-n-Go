<?
class Database{
    public static $conn=NULL;
    public static function getConnection(){
        
        if(Database::$conn==NULL){//creates new connection
            $servername=get_config('db_server');
            $username=get_config('db_username');
            $password=get_config('db_password');
            $dbname=get_config('db_name');

            $connection=new mysqli($servername,$username,$password,$dbname);

            if($connection->connect_error){
                die("connection failed".$connection->connect_error);
            }
            else{
                Database::$conn=$connection;
                return Database::$conn;
            }
        }
        else{
            return Database::$conn;//returns existing connection
        }
    }
    public static function setComment($username,$comment){
        $conn= Database::getConnection();
        $sql = "INSERT INTO comments (username, comment, comment_time) VALUES (?, ?, now())";
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("ss", $username, $comment);
        
        $result = $stmt->execute();
        if($result){
            return true;
        }
        else{
            error_log("Failed to set comment: " . $stmt->error);
            return false;
        }
    }

    public static function getComment(){
        $conn= Database::getConnection();
        $sql="SELECT * FROM `comments`";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            return [];
        }
    }
}
?>