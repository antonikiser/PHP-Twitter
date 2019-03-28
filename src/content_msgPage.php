<?php 
require_once("../connection.php");
require_once("user.php");
if ($_SESSION["logged_in"] == false) {
	header( "location: includer_form.php"); 
} 


?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chat(msgpage) <small>Napisz do ziomala</small></h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">            																				


              <div class="col-md-6 col-sm-6 col-xs-12">
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
                          <th>User Id </th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Chat</th>
                          <th>User's Tweets</th>						  
                        </tr>
                      </thead>
                      <tbody>
					<?php 
						$loggedIn=$_SESSION['user_id'];
						$users = User::viewAllUsersMsg($conn,$loggedIn) ;
						foreach($users as $x): 
					?>
                        <tr>
                          <th scope="row"><?=  $x->getUserId();  ?> </th>
                          <td><?= $x->getEmail();  ?></td>
                          <td><?= $x->getUsername();  ?></td>
						  <td>
							 <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="includer_chat.php?identyfikator=<?=$x->getUserId();  ?>"><i class="fa fa-envelope"></i> .</a>
							</div>
						  </td>
						  <td>
							 <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="includer_user_tweets.php?identyfikator=<?=$x->getUserId();  ?>"><i class="fa fa-twitter-square"></i> .</a>
							</div>
						  </td>						  
                        </tr>
                      </tbody>
					  <?php endforeach; ?>
                    </table>

                  </div>
                </div>			
              </div>
            </div>                    					
          </div>
        </div>
     </div>
	         </div>