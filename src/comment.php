<?php

class Comment {
	private $commentId;
	private $userId;
	private $tweetId;
	private $data;
	private $comment;
	

	
	public function __construct() {
		$this->commentId= -1;
		$this->userId= ' ';
		$this->tweetId= ' ';
		$this->data= ' ';				
		$this->comment= ' ';
	}

	public function setComment($comment) {
		$this->comment=$comment;
		}
	public function setTweetId($tweetId) {
		$this->tweetId=$tweetId;
	}
	public function setDate($data) {
		$this->data=$data;
	}
	public function getCommentId() {
		return $this->commentId;
	}	
	public function setUserId($userId) {
		$this->userId=$userId;
	}	
	public function getTweetId() {
		return $this->tweetId;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function getComment() { 
		return $this->comment;
	}
	public function getDate() {
		return $this->data;
	}

	static public function loadCommentByCommentId($conn,$commentId) {												
		$sql="SELECT * FROM comments WHERE commentId=$commentId";
		$result=$conn->query($sql);
		
		if($result==true && $result->num_rows==1) {
			$gotComment=$result->fetch_assoc();
			
			$nowy=new Comment();
			$nowy->commentId=$gotComment['commentId'];
			$nowy->userId=$gotComment['userId'];
			$nowy->text=$gotComment['comment'];
			$nowy->data=$gotComment['data'];
			$nowy->tweetId=$gotComment['tweetId'];
			return $nowy;
		}
	return null;
	}
	
	static public function loadAllCommentByTweetId($conn,$tweetId) {
		$sql="SELECT * FROM comments WHERE tweetId='$tweetId' ORDER BY 'data' DESC";
		
		$result=$conn->query($sql);
		$tweetList=[];
		
		if($result==true && $result->num_rows != 0) {
			foreach($result as $variable) {
				$gotIt= new Comment() ;
				$gotIt->commentId=$variable['commentId'];
				$gotIt->tweetId=$variable['tweetId'];
				$gotIt->userId=$variable['userId'];
				$gotIt->comment=$variable['comment'];
				$gotIt->data=$variable['data'];
				
				$tweetList[]=$gotIt;
			}
		}
		return $tweetList;
	}
	
	public function saveComment($conn) {	
		if($this->commentId== -1) {
			$query="INSERT INTO comments (tweetId, userId, data, comment) VALUES ('$this->tweetId','$this->userId',NOW(),'$this->comment')";
			$result = $conn->query($query);
			var_dump($query);
		
			if($result==true) {
				$this->commentId =$conn->insert_id;
				return true;			
			}
		} else {
			$query=" UPDATE comments SET tweetId='$this->tweetId',
																userId='$this->userId',
																data='$this->data',
																comment='$this->comment'
							WHERE commentId=$this->commentId" ;																
			
			$result=$conn->query($query);
			if ($result==true) {
				return true;
			}
		}
		return false;
	}	





}