<?php

class Message {
	private $mId;
	private $userId_nad;
	private $userId_odb;
	private $data;
	private $message;
	private $status;
	
	
	public function __construct() {
		$this->status= -1;
		$this->userId_nad=" ";
		$this->userId_odb=" ";
		$this->data=" ";
		$this->message=" ";
		$this->mId=" ";
	}

	public function setUserId_nad($userId_nad){
		$this->userId_nad=$userId_nad;
	}
	
	public function setUserId_odb($userId_odb) {
		$this->userId_odb=$userId_odb;
	}
	public function setMessage($message) {
		$this->message=$message;
	}
	
	public function setStatus($status) {
		$this->status=$status;
	}

	public function getUser_nad() {
		return $this->userId_nad;
	}
	public function getUser_odb() {
		return $this->userId_odb;
	}
	public function getMessage() {
		return $this->message;
	}
	public function getData() {
		return $this->data;
	}
	public function getStatus() {
		return $this->status;
	}
	public function getMId() {
		return $this->mId;
	}
	
	static public function loadAllSentAndReceivedMsgByUserId($conn, $userId_odb, $userId_nad) {
		$sql="SELECT * FROM messages WHERE (userId_odb='$userId_odb' AND userId_nad='$userId_nad') OR (userId_odb='$userId_nad' AND userId_nad='$userId_odb') ORDER BY 'data' ASC";		
		$result=$conn->query($sql);
		
		$mesList=[];
	
		if($result==true && $result->num_rows != 0) {
			foreach($result as $variable) {
				$mes= new Message() ;
				$mes->mId=$variable['mId'];
				$mes->userId_nad=$variable['userId_nad'];
				$mes->userId_odb=$variable['userId_odb'];
				$mes->data=$variable['data'];
				$mes->message=$variable['message'];
				$mes->status=$variable['status'];
				
				$mesList[]=$mes;
			}
		}
		return $mesList;
	
	}

	public function saveMsg ($conn) {
		
		$query="INSERT INTO messages (status, userId_nad, userId_odb, data, message) VALUES ('$this->status','$this->userId_nad','$this->userId_odb',NOW(), '$this->message')";
		$result = $conn->query($query);
		var_dump($query);
		
		if ($result==true) {
				return true;
		}else{
			return false;
		}
	}
	
	public function updateMsg($conn,$mId) {
		
		$query="UPDATE messages SET status='1' WHERE mId='$mId' ";
		
		$result = $conn->query($query);
		
		
		if ($result==true) {
				return true;
		}else{
			return false;
		}
	}	

	static public function loadMsgByMId($conn,$mId) {
		$sql="SELECT * FROM messages WHERE mId='$mId' ";
		$result=$conn->query($sql);
	
		if($result==true && $result->num_rows == 1) {
				$variable = $result->fetch_assoc();
				
				$mes= new Message() ;
				
				$mes->mId=$variable['mId'];
				$mes->userId_nad=$variable['userId_nad'];
				$mes->userId_odb=$variable['userId_odb'];
				$mes->data=$variable['data'];
				$mes->message=$variable['message'];
				$mes->status=$variable['mId'];

		}
	return $mes;
	}
	
}