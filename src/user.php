<?php

class User {
	private $userId;
	private $login;
	private $password;
	private $email;
	private $username;
	
	//public $registerPage="location:rejestracja.php";
	//private $mainPage="location:main.php";
	//public $loginPage="location:form.php";
	const REGISTER_PAGE = "location:register.php";
	const LOGIN_PAGE = "location:includer_form.php";
	const MAIN_PAGE = "location:includer_main.php";
	
	public function __construct() {
	$this->userId=-1;
	$this->login=' ';
	$this->password=' ';
	$this->username=' ';
	}
	
	public function getUsername() {
		return $this->username;
	}	
	public function getUserId() {
		return $this->userId;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setLogin($newLogin) {
		$this->login=$newLogin;
	}

	public function setEmail($newEmail) {
		$this->email=$newEmail;
	}
	
	public function setPassword($newPassword) {
		$newPassword= password_hash($newPassword, PASSWORD_BCRYPT);
		$this->password=$newPassword;
	
	}
	
	static public function getById($conn, $userId) {
		$query="SELECT * FROM users WHERE userId= $userId";
		$result = $conn-> query($query);
		
		if($result==true & $result->num_rows==1) {
			$userData = $result->fetch_assoc();
		
			$user = new User();
		
			$user->userId = $userData['userId'];	
			$user->login = $userData['login'];
			$user->password = $userData['password'];
			$user->email = $userData['email'];
			$user->username = $userData['username'];
			
			return $user;
	}
	return null;                            
	}
	
	
	static public function getAll($conn) {
		$query="SELECT * FROM users";
		$pustatablica=[];
		
		$result = $conn-> query($query);
		
		if($result == true && $result->num_rows !== 0) {
			foreach( $result as $nowyrzad) {
				$loadedUser = new User ();
				$loadedUser ->userId=$nowyrzad['userId'];														
				$loadedUser->login=$nowyrzad['login'];
				$loadedUser->password=$nowyrzad['password'];
				$loadedUser->email=$nowyrzad['email'];
				$loadedUser->username=$nowyrzad['username'];
				
				$pustatablica[]=$loadedUser;
				
			}																							
		}	
		var_dump($pustatablica);
		return $pustatablica;
		//return $loadedUser;
	
		
	}	

	
	public function delete($conn) {
		if ($this->userId !== -1) {
			$query="DELETE FROM users WHERE userId= $this->userId";
			$result=$conn->query($query);
				if ($result==true) {
					$this->userId= -1 ;
					return true;
				}
				return false;
		}
		return true;	
	}
	
	public function save($conn) {	
		if($this->userId== -1) {
			$query="INSERT INTO users (login, password, email, username) VALUES ('$this->login','$this->password','$this->email','$this->username')";
			$result = $conn->query($query);
			var_dump($query);
		
			if($result==true) {
				$this->userId =$conn->insert_id;
				return true;			
			}
		} else {
			$query=" UPDATE users SET login='$this->login',
															password='$this->password',
															email='$this->email',
															username='$this->username'
							WHERE userId=$this->userId" ;																
			
			$result=$conn->query($query);
			if ($result==true) {
				return true;
			}
		}
		return false;
	}	
	
	
	
	static public function login($pass,$login) {
		$conn=new mysqli('localhost','root','','antek');
		$sql="SELECT * FROM users WHERE login= '$login'";
		$result=$conn->query($sql);
	
	
		
		if($result->num_rows==0) {
			$_SESSION['logged_in']=false;
			header(self::LOGIN_PAGE);
		} else {		
			$resultOfLogging=$result->fetch_all(MYSQLI_ASSOC);
			
			$userData = $resultOfLogging[0];
			if (password_verify($pass, $userData['password'])) {
				$_SESSION['logged_in']=true;
				$_SESSION['user_id']=$resultOfLogging[0]['userId'];			
				header(self::MAIN_PAGE);
				die();
			} else {
				$_SESSION['logged_in']=false;
				header(self::LOGIN_PAGE);
			}
			

		}
	}
	
	static public function register($conn) {

		$login=$_POST["login_rejestracji"];
		$haslo=$_POST["haslo_rejestracji"];
		$email=$_POST["email_rejestracji"];
		$username=$_POST["username__rejestracji"];

		if($haslo!==$_POST["haslo2_rejestracji"]){
		header (self::REGISTER_PAGE);
		die();																				
		}

		$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
		if(!preg_match($sprawdz, $email)){
		header(self::REGISTER_PAGE);
		die();
		}

		$user=new User();
		$user->login=$login;
		$user->setPassword($haslo);
		$user->email=$email;
		$user->username=$username;
		$user->save($conn);

		$_SESSION['logged_in']=true;
		$_SESSION['user_id']=$user->userId;		
		var_dump($_SESSION);
		//header(self::MAIN_PAGE);
		//die();
		}
	
	
	static public function logout() {
		$_SESSION['logged_in']=false;
		$_SESSION['user_id']= null;
		
		header(self::LOGIN_PAGE);
	}
	
	static public function viewAllUsersMsg($conn,$loggedIn) {
		$query="SELECT * FROM users WHERE userId!='$loggedIn' " ;
		$pustatablica=[];
		
		$result = $conn-> query($query);
		
		if($result == true && $result->num_rows !== 0) {
			foreach( $result as $nowyrzad) {
				$loadedUser = new User ();
				$loadedUser ->userId=$nowyrzad['userId'];
				$loadedUser->email=$nowyrzad['email'];
				$loadedUser->username=$nowyrzad['username'];
				
				$pustatablica[]=$loadedUser;
				
			}																							
		}	
		
		return $pustatablica;
		//return $loadedUser;
	
		
	}	
	
	
	
	
	
	
	
	
	
}
























