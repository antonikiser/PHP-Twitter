<?php

if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
		die();
} 
require_once("../connection.php");
require_once("tweet.php");
require_once("comment.php");
 ?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Twee! Twee! <small>Tweety znajomych</small></h3>
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
						  <th>Edit Tweet</th>
						  <th>View Comments</th>
						  <th>Add Comment </th>						  
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
							<?php 
							//$tweetList = Tweet:: loadAllTweetByUserId($conn,$_SESSION['user_id']) ;
							$tweetList = Tweet:: loadAllTweets($conn) ;
							foreach($tweetList as $tweet): 
							?>							
							  <th scope="row"><?= $tweet->getTweetId();?></th>
							  <td><?= $tweet->getUserId(); ?></td>
							  <td><?= $tweet->getText();?></td>
							  <td><?= $tweet->getDate();?></td>

					<td>
						<div class="fa-hover col-md-3 col-sm-4 col-xs-12"><?php if( $tweet->getUserId()==$_SESSION['user_id']){?><a href="includer_edit_tweet.php?identyfikator=<?=$tweet->getTweetId(); ?>"><i class="fa fa-pencil"></i></a><?php }; ?></div>
					</td>
					<td>
						<div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="includer_view_comments.php?tweet_id=<?=$tweet->getTweetId(); ?>"><i class="fa fa-comments-o"></i></a></div>
					</td>						  
						  
						  
					<td>
						   <form action="do_new_comment_to_DB.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
							  <div class="form-group">
									<div class="col-md-10 col-sm-6 col-xs-12">
									<input type="text" name="comment_content" maxlength 140 required="required" placeholder="Dodaj komentarz" class="form-control col-md-7 col-xs-12">
									<input type="hidden" value="<?=$tweet->getTweetId(); ?>" name ="tweetid">
											<div class="x_content">
												<div class="buttons">           
													<input type="submit" class="btn btn-info btn-sm"> 
												</div>
										</div>
									</div>
							  </div>
						  </form>						  
						  </td>	  
                        </tr>
                      </tbody>
					  <?php endforeach; ?>
                    </table>

                  </div>
                </div>
				
				

					  <form action="new_tweet_to_DB.php" method="post" id="demo-form" data-parsley-validate>
                          <label for="message">WPISZ NOWEGO TWEETA </label>
                          <textarea name="tweet" maxlength 140 id="message" required="required" class="form-control"  data-parsley-trigger="keyup" "
                            data-parsley-validation-threshold="10"></textarea>

                          <br/>
                          <input type="submit"  class="btn btn-primary">Tweet!</span>
					 </form>

              </div>
            </div>                    					
          </div>
        </div>
