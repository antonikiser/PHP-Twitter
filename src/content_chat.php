<?php 
require_once("user.php");
require_once("messages.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 
?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chat <small>Napisz do ziomala</small></h3>
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
                          <th>Data</th>
                          <th>Tresc</th>
                          <th>Status</th>
                         <th></th>
                        </tr>
                      </thead>
                      <tbody>
						<?php
							$msg=Message::loadAllSentAndReceivedMsgByUserId($conn,$_GET['identyfikator'],$_SESSION['user_id'] );
							foreach($msg as $x): 
						?>
                        <tr>
                          <th scope="row"><?=$x->getData()?></th>
                          <td> <?=$x->getMessage() ?></td>
                          <td><?=$x->getStatus()?></td>
							<td>
								<div class="fa-hover col-md-5 col-sm-4 col-xs-12"><a href="includer_did_read_message.php?msg_id=<?=$x->getMId(); ?>"><i class="fa fa-at"></i></a></div>
							</td>
                        </tr>
							<?php 
								endforeach;
							?>
                      </tbody>
                    </table>

                  </div>
                </div>



					  <form action="do_new_message_to_DB.php" method="post" id="demo-form" data-parsley-validate>
                          <label for="message">WPISZ NOWA WIADOMOSC </label>
                          <textarea name="message_content" maxlength 140 id="message" required="required" class="form-control" ></textarea>
                          <br/>
						  <input type="hidden" value="<?=$_GET['identyfikator']?>" name ="user_odb">
						  <input class="btn btn-primary" type="submit" value="Wyslij"></button>



					 </form>

              </div>
            </div>                    					
          </div>
        </div>
