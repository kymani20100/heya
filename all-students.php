<?php require_once 'core/init_one.php'; ?>
<?php 
// FETCH.PHP
if(isset($_POST['id']))
{
	foreach($_POST['id'] as $id)
	{
		DB::getInstance()->delete('student4', array('id', '=', $id));
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>Jumrock - Registration</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />  
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    <link rel='stylesheet' type='text/css' href='css/fullcalendar.print.css' media='print' />
    
    <script type='text/javascript' src='js/plugins/jquery/jquery-1.10.2.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.2.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/charts/excanvas.min.js'></script>
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/uniform/uniform.js'></script>
    
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='js/plugins/animatedprogressbar/animated_progressbar.js'></script>
    
    <script type='text/javascript' src='js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.js'></script>
    
    <script type='text/javascript' src='js/plugins/dataTables/jquery.dataTables.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='js/plugins/pnotify/jquery.pnotify.min.js'></script>
    <script type='text/javascript' src='js/plugins/ibutton/jquery.ibutton.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/cookies.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
</head>
<body>
    <div class="wrapper"> 
            
        <div class="header">
            <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
                <li class="settings_icon">
                    <a href="#" class="link_themeSettings">&nbsp;</a>
                    
                    <div id="themeSettings" class="popup">
                        <div class="head clearfix">
                            <div class="arrow"></div>
                            <span class="isw-settings"></span>
                            <span class="name">Theme settings</span>
                        </div>
                        <div class="body settings">
                            <div class="row">
                                <div class="col-md-3"><strong>Style:</strong></div>
                                <div class="col-md-9">
                                    <a class="styleExample tip active" title="Default style" data-style="">&nbsp;</a>                                    
                                    <a class="styleExample silver tip" title="Silver style" data-style="silver">&nbsp;</a>
                                    <a class="styleExample dark tip" title="Dark style" data-style="dark">&nbsp;</a>
                                    <a class="styleExample marble tip" title="Marble style" data-style="marble">&nbsp;</a>
                                    <a class="styleExample red tip" title="Red style" data-style="red">&nbsp;</a>                                    
                                    <a class="styleExample green tip" title="Green style" data-style="green">&nbsp;</a>
                                    <a class="styleExample lime tip" title="Lime style" data-style="lime">&nbsp;</a>
                                    <a class="styleExample purple tip" title="Purple style" data-style="purple">&nbsp;</a>                                    
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-3"><strong>Background:</strong></div>
                                <div class="col-md-9">
                                    <a class="bgExample tip active" title="Default" data-style="">&nbsp;</a>
                                    <a class="bgExample bgCube tip" title="Cubes" data-style="cube">&nbsp;</a>
                                    <a class="bgExample bghLine tip" title="Horizontal line" data-style="hline">&nbsp;</a>
                                    <a class="bgExample bgvLine tip" title="Vertical line" data-style="vline">&nbsp;</a>
                                    <a class="bgExample bgDots tip" title="Dots" data-style="dots">&nbsp;</a>
                                    <a class="bgExample bgCrosshatch tip" title="Crosshatch" data-style="crosshatch">&nbsp;</a>
                                    <a class="bgExample bgbCrosshatch tip" title="Big crosshatch" data-style="bcrosshatch">&nbsp;</a>
                                    <a class="bgExample bgGrid tip" title="Grid" data-style="grid">&nbsp;</a>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-3"><strong>Fixed layout:</strong></div>
                                <div class="col-md-9">
                                    <input type="checkbox" name="settings_fixed" value="1"/>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Hide menu:</strong></div>
                                <div class="col-md-9">
                                    <input type="checkbox" name="settings_menu" value="1"/>
                                </div>                                           
                            </div>                            
                        </div>
                        <div class="footer">                            
                            <button class="btn btn-default link_themeSettings" type="button">Close</button>
                        </div>
                    </div>                    
                    
                </li>
            </ul>    
        </div>

        <?php 
			include("includes/menu.php");
		?>

        <div class="content">


            <div class="breadLine">

                <ul class="breadcrumb">
                    <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                    <li class="active">Dashboard</li>
                </ul>

                <ul class="buttons">
                    <li>
                        <a href="#" class="link_bcPopupList"><span class="glyphicon glyphicon-user"></span><span class="text">Users list</span></a>

                        <div id="bcPopupList" class="popup">
                            <div class="head clearfix">
                                <div class="arrow"></div>
                                <span class="isw-users"></span>
                                <span class="name">List users</span>
                            </div>
                            <div class="body-fluid users">

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/aqvatarius_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Aqvatarius</a>                                    
                                        <span>online</span>
                                    </div>
                                </div>

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/olga_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Olga</a>                                
                                        <span>online</span>
                                    </div>
                                </div>                        

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/alexey_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Alexey</a>  
                                        <span>online</span>
                                    </div>
                                </div>                              

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/dmitry_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Dmitry</a>                                    
                                        <span>online</span>
                                    </div>
                                </div>                         

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/helen_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Helen</a>                                                                        
                                    </div>
                                </div>                                  

                                <div class="item clearfix">
                                    <div class="image"><a href="#"><img src="img/users/alexander_s.jpg" width="32"/></a></div>
                                    <div class="info">
                                        <a href="#" class="name">Alexander</a>                                                                        
                                    </div>
                                </div>                                  

                            </div>
                            <div class="footer">
                                <button class="btn btn-default" type="button">Add new</button>
                                <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
                            </div>
                        </div>                    

                    </li>                
                    <li>
                        <a href="#" class="link_bcPopupSearch"><span class="glyphicon glyphicon-search"></span><span class="text">Search</span></a>

                        <div id="bcPopupSearch" class="popup">
                            <div class="head clearfix">
                                <div class="arrow"></div>
                                <span class="isw-zoom"></span>
                                <span class="name">Search</span>
                            </div>
                            <div class="body search">
                                <input type="text" placeholder="Some text for search..." name="search"/>
                            </div>
                            <div class="footer">
                                <button class="btn btn-default" type="button">Search</button>
                                <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
                            </div>
                        </div>                
                    </li>
                </ul>

            </div>
			
			
            <div class="workplace">
				
				  <div class="row">

                    <div class="col-md-12">                    
                        <div class="head clearfix">
                            <div class="isw-grid"></div>
                            <h1>Simple Sortable table</h1>                               
                        </div>
                        <div class="block-fluid table-sorting clearfix">
                            <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkall"/></th>
                                        <th width="25%">First Name</th>
                                        <th width="25%">Last Name</th>
                                        <th width="25%">E-mail</th>
                                        <th width="25%">Gender</th>  
										<th width="25%">Edit</th>  
                                    </tr>
                                </thead>
                                <tbody>
									<?php 	
										$users = DB::getInstance()->query("SELECT * FROM student4 order by id ASC");
										foreach($users->results() as $value)
										{
									?>
                                    <tr id="<?php echo $value->id; ?>">
                                        <td><input type="checkbox" name="student_id[]" class="delete_student" value="<?php echo $value->id; ?>"/></td>
                                        <td><?php echo $value->firstname; ?></td>
                                        <td><?php echo $value->lastname; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td><?php echo $value->gender; ?></td>
										<td><a href="#fModal" role="button" name="edit" id="<?php echo $value->id; ?>" class="btn btn-default edit_data" data-toggle="modal">Edit</a></td>                                  
                                    </tr>
									<?php 
										}
									?>    
									<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
										<td><button class="btn btn-danger" name="btn_delete" id="btn_delete">TRASH</button></td>                                  
                                    </tr>
                                </tbody>
                            </table>
							
                        </div>
                    </div>                                

                </div> 
			
                <div class="dr"><span></span></div>
				
				<!-- Bootrstrap modal form -->
				<div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                        
								<h4>Edit</h4>
							</div>
							<div class="modal-body modal-body-np">
								<div class="row">
									<div class="block-fluid">
										<div class="row-form clearfix">
											<div class="col-md-3">First name:</div>
											<div class="col-md-9">
												<input type="text" id="firstname" name="firstname" value=""/>
												<input type="hidden" name="student_id" id="student_id"/>
											</div>
										</div>            
										<div class="row-form clearfix">
											<div class="col-md-3">Last name:</div>
											<div class="col-md-9"><input type="text" id="lastname" name="lastname" value=""/></div>                    
										</div>   

										<div class="row-form clearfix">
											<div class="col-md-3">Email:</div>
											<div class="col-md-9"><input type="text" id="email" name="email" value=""/></div>                    
										</div> 
										
										<div class="row-form clearfix">
											<div class="col-md-3">Gender:</div>
											<div class="col-md-9">
												<select id="gender" name="gender">
														<option value="">Ask Me Later</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
												</select>
											</div>
										</div> 
										
										<div class="row-form clearfix">
											<div class="col-md-3">About:</div>
											<div class="col-md-9"><textarea id="about" name="about"></textarea></div>
										</div> 
										
									</div>                
									<div class="dr"><span></span></div>
								</div>
							</div>   
							<div class="modal-footer">
								<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Save updates</button> 
								<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>            
							</div>
						</div>
					</div>
				</div>
				
				
            </div>

        </div>   
    </div>
</body>
<script>
$(document).ready(function(){
	
	$('#btn_delete').click(function(){
		var id = [];
		$(':checkbox:checked').each(function(i){
			id[i] = $(this).val();
		});
		
		if(id.length === 0)
		{
			alert("PLEASE SELECT A CHECKBOX");
		}else{
			if(confirm("ARE YOU SURE YOU WANT TO DELETE?"))
			{
				$.ajax({
				url: 'all-students.php',
				method:'POST',
				data:{id:id},
				success:function()
				{
						for(var i=0; i<id.length; i++)
						{
							$('tr#'+id[i]+'').css('background-color', '#CCC');
							$('tr#'+id[i]+'').fadeOut('slow');
						}
					}
				});
			}else{
				return false;
			}
		}
	});
		
});

</script>
</html>
