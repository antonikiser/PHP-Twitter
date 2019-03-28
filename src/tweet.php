<?php

class Tweet {
	private $tweetId;
	private $userId;
	private $text;
	private $data;
	
	
	public function __construct() {
		$this->tweetId= -1;
		$this->userId= ' ';
		$this->text= ' ';
		$this->data= ' ';																//	jak z data ?
	}

	public function setUserId($userId) {
		$this->userId=$userId;
	}
	public function setText($text) {
		$this->text=$text;
	}
	public function setDate($data) {
		$this->data=$data;
	}
	public function getDate() {
		return $this->data;
	}
	public function getTweetId() {
		return $this->tweetId;
	}	
	public function getUserId() {
		return $this->userId;
	}
	public function getText() { 
		return $this->text;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getUsername() {
		return $this->username;
	}

	static public function loadTweetById($conn,$tweetId) {												
		$sql="SELECT * FROM tweety WHERE tweetId=$tweetId";
		$result=$conn->query($sql);
		
		if($result==true && $result->num_rows==1) {
			$gotTweet=$result->fetch_assoc();
			
			$nowy=new Tweet();
			$nowy->tweetId=$gotTweet['tweetId'];
			$nowy->userId=$gotTweet['userId'];
			$nowy->text=$gotTweet['text'];
			$nowy->data=$gotTweet['data'];
			return $nowy;
		}
	return null;
	}
	
	static public function loadAllTweetByUserId($conn,$userId) {
		$sql="SELECT * FROM tweety WHERE userId='$userId' ORDER BY 'data' DESC";
		
		$result=$conn->query($sql);
		$tweetList=[];
		
		if($result==true && $result->num_rows != 0) {
			foreach($result as $variable) {
				$gotIt= new Tweet() ;
				$gotIt->tweetId=$variable['tweetId'];
				$gotIt->userId=$variable['userId'];
				$gotIt->text=$variable['text'];
				$gotIt->data=$variable['data'];
				
				$tweetList[]=$gotIt;
			}
		}
		return $tweetList;
	}
	
	static public function loadAllTweets($conn) {
		$sql="SELECT tweety.*, users.username FROM tweety JOIN users ON tweety.userId = users.userId ORDER BY data DESC";
		
		$result=$conn->query($sql);
		var_dump($result);
		
		
		$tweetList=[];
		
		if($result==true && $result->num_rows != 0) {
			foreach($result as $variable) {
				$gotTweet= new Tweet() ;
				$gotTweet->tweetId=$variable['tweetId'];
				//$gotTweet->userId=$variable['userId'];
				$gotTweet->text=$variable['text'];
				$gotTweet->data=$variable['data'];
				$gotTweet->userId=$variable['username'];
				
				$tweetList[]=$gotTweet;
			}
		}
		var_dump($tweetList);
		//die();
		return $tweetList;		
	}

	public function saveToDB($conn) {
		if($this->tweetId==-1){
			$sql="INSERT INTO tweety (userId,text,data) VALUES ($this->userId, '$this->text',NOW())";
			$result=$conn->query($sql);
			
			if($result==true) {
				$this->tweetId=$conn->insert_id;
				return true;
			} 
		} else {
			$sql="UPDATE tweety SET userId=$this->userId,
														 text='$this->text',
														 data='$this->data'
					WHERE tweetId=$this->tweetId";
			$result=$conn->query($sql);
			
			if($result==true) {
				return true;
			}
		}
	}








}