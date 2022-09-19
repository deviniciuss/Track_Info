 <?php 
 
 class trackinfo{
    //database
   private $connection;
   private $table = "trackinginfo";

    //trackInfo properties
 
    public $InternalClient;
    public $Client;
    public $Module;
    public $Language;
    public $URL;
    public $Date;
    public $Width;
    public $Height;
    public $Browser;
    public $BrowserVersion;
    public $Java;
    public $Mobile;
    public $OS;
    public $OSVersion;
    public $Cookies;
    public $track;

    //Contructing with database connection
    public function __construct($db){
        $this->connection = $db;
    }

    //read track
    public function findAllTrack(){
        //query SQL
        $query = 'SELECT * FROM ' . $this->table;

        //prepare() make a statement for execution
        $statement = $this->connection->prepare($query);
        
        //execute() executes a prepared statement
        $statement->execute();

        return $statement;
    } 

    //real all tracks
    public function findByTrack(){
        $query = 'SELECT  * FROM ' . $this->table . ' WHERE track=:x ';
       
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':x', $this->track);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
 
        $this->InternalClient = $row['InternalClient']; 
        $this->Client = $row['Client']; 
        $this->Module = $row['Module']; 
        $this->Language = $row['Language']; 
        $this->URL = $row['URL']; 
        $this->Date = $row['Date']; 
        $this->Width = $row['Width']; 
        $this->Height = $row['Height']; 
        $this->Browser = $row['Browser'] ; 
        $this->BrowserVersion = $row['BrowserVersion']; 
        $this->Java = $row['Java']; 
        $this->Mobile = $row['Mobile']; 
        $this->OS = $row['OS']; 
        $this->OSVersion = $row['OSVersion']; 
        $this->Cookies = $row['Cookies'];
        $this->track = $row['track'];
    
       echo(json_encode($row));

    }

    //create track 
    public function addTrack(){
      

        //making query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET InternalClient = :InternalClient, 
        Client = :Client, 
        Module = :Module, 
        Language = :Language, 
        URL = :URL, 
        Width = :Width, 
        Height = :Height, 
        Browser = :Browser, 
        BrowserVersion = :BrowserVersion, 
        Java = :Java, 
        Mobile = :Mobile, 
        OS = :OS, 
        OSVersion = :OSVersion, 
        Cookies = :Cookies,  
        track = :track';

        //prepare statement
        $statement = $this->connection->prepare($query);

        //clean data
        $this->InternalClient = htmlspecialchars(strip_tags($this->InternalClient));
        $this->Client = htmlspecialchars(strip_tags($this->Client));
        $this->Module = htmlspecialchars(strip_tags($this->Module));
        $this->Language = htmlspecialchars(strip_tags($this->Language));
        $this->URL = htmlspecialchars(strip_tags($this->URL));
        $this->Width = htmlspecialchars(strip_tags($this->Width));
        $this->Height = htmlspecialchars(strip_tags($this->Height));
        $this->Browser = htmlspecialchars(strip_tags($this->Browser));
        $this->BrowserVersion = htmlspecialchars(strip_tags($this->BrowserVersion));
        $this->Java = htmlspecialchars(strip_tags($this->Java));
        $this->Mobile = htmlspecialchars(strip_tags($this->Mobile));
        $this->OS = htmlspecialchars(strip_tags($this->OS));
        $this->OSVersion = htmlspecialchars(strip_tags($this->OSVersion));
        $this->Cookies = htmlspecialchars(strip_tags($this->Cookies));

        $joinCollumns = $this->InternalClient.';'.
        $this->Client.';'.
        $this->Module.';'.
        $this->Language.';'.
        $this->URL.';'.
        $this->Date.';'.
        $this->Width.';'.
        $this->Height.';'.
        $this->Browser.';'.
        $this->BrowserVersion.';'.
        $this->Java.';'.
        $this->Mobile.';'.
        $this->OS.';'.
        $this->OSVersion.';'.
        $this->Cookies;

        $this->track = str_to_hex($joinCollumns);

        //binding of parameters
        $statement->bindParam(':InternalClient', $this->InternalClient);
        $statement->bindParam(':Client', $this->Client);
        $statement->bindParam(':Module', $this->Module);
        $statement->bindParam(':Language', $this->Language);
        $statement->bindParam(':URL', $this->URL);
        $statement->bindParam(':Width', $this->Width);
        $statement->bindParam(':Height', $this->Height);
        $statement->bindParam(':Browser', $this->Browser);
        $statement->bindParam(':BrowserVersion', $this->BrowserVersion);
        $statement->bindParam(':Java', $this->Java);
        $statement->bindParam(':Mobile', $this->Mobile);
        $statement->bindParam(':OS', $this->OS);
        $statement->bindParam(':OSVersion', $this->OSVersion);
        $statement->bindParam(':Cookies', $this->Cookies);
        $statement->bindParam(':track', $this->track);

        //execute the query
        if($statement->execute()){
            return true;
        }

        //print error if it goes wrong
        printf("Error %s. \n" . $statement->error);
        return false;
    }

 
 }
 
 ?>