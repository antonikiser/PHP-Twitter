<?php 
require_once("tweet.php");
require_once("user.php");
require_once("comment.php");
?>

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tweety <small>					
					<?php
					$user=User::getById($conn, $_GET['identyfikator']);
					echo $user->getUsername();
					?>
				</small></h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">            																				


              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">


                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Tweet Id</th>
                          <th>User Id</th>
                          <th>Text</th>
                          <th>Date</th>
						  <th>Comments</th>
						  <th>Add Comment</th>                       
					   </tr>
                      </thead>
                      <tbody>
					 <?php 
						$tweetList = Tweet:: loadAllTweetByUserId($conn,$_GET['identyfikator']) ;
						foreach($tweetList as $tweet): 
					 ?>	
                        <tr>
                          <th scope="row"><?= $tweet->getTweetId();?></th>
                          <td><?= $tweet->getUserId(); ?></td>
                          <td> <?= $tweet->getText();?></td>
                          <td><?= $tweet->getDate();?></td>		  
						 <td>
							<div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="includer_view_comments.php?tweet_id=<?=$tweet->getTweetId(); ?>"><i class="fa fa-comments-o"></i></a></div>
						 </td>						  
						  
						  
					<td>
						   <form action="do_new_comment_to_DB.php" method="post"  id="demo-form2"  class="form-horizontal form-label-left">
							  <div class="form-group">
									<div class="col-md-10 col-sm-6 col-xs-12">
									  <input type="text" name="comment_content" required="required" placeholder="Dodaj komentarz" class="form-control col-md-7 col-xs-12">
									</div>
										<div class="x_content">
											<div class="buttons">           
												<input type="submit" class="btn btn-info btn-sm" value="Podziel sie komentarzem kolego">	
												<input type="hidden" value="<?=$tweet->getTweetId(); ?>" name ="tweetid">			
												<input type="hidden" value="<?=$_GET['identyfikator'] ?>" name ="userid">												
											</div>
										</div>
							  </div>
							  
						  </form>						  
						  </td>	  
                        </tr>
						<?php endforeach; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
				
	

              </div>
            </div>                    					
          </div>
        </div>
