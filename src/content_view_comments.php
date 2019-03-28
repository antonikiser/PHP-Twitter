<?php 
require_once("comment.php");
?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Komentarze! <small>Co mysla znajomi o tym pojebie?</small></h3>
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
                          <th>CommentId</th>
                          <th>UserId</th>
                          <th>TweetId</th>
                          <th>Date</th>
						  <th>Comment</th>
                        </tr>
                      </thead>
					  <?php 
							$com=Comment::loadAllCommentByTweetId($conn,$_GET['tweet_id']);
							foreach($com as $var): 
						?>	
                      <tbody>
                        <tr>
                          <th scope="row"><?= $var->getCommentId();?></th>
                          <td><?= $var->getUserId(); ?></td>
                          <td><?= $var->getTweetId();?></td>
                          <td><?= $var->getDate();?></td>
						  <td><?= $var->getComment();?></td>
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
