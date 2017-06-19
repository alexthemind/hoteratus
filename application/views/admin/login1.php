<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>
.error{color: red;}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="root" >

    <title style="color: white">Newsletter Builder</title>
	
	
<link href="<?php echo base_url().'css/validationEngine.jquery.css'?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>admin_css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>admin_css/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>admin_css/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>admin_css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	
	<script src="<?php echo base_url();?>admin_css/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>admin_css/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>admin_css/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>admin_css/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>admin_css/js/plugins/morris/morris-data.js"></script>
	
	 <script src="<?php echo base_url();?>js/jquery-1.11.0.min.js"></script>
   
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>admin_css/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'js/jquery.validationEngine-en.js'?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url().'js/jquery.validationEngine.js'?>" type="text/javascript" charset="utf-8"></script>
	
	 <!-- <script src="<?php //echo base_url(); ?>forget_pwd/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript
    <script src="<?php //echo base_url(); ?>forget_pwd/js/bootstrap.min.js"></script> -->

    <!-- Morris Charts JavaScript 
    <script src="<?php //echo base_url(); ?>forget_pwd/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php //echo base_url(); ?>forget_pwd/js/plugins/morris/morris-data.js"></script>-->


</head>
<body style="background-color:white">

    <div class="container" >
        <div class="row">
		<div class="col-md-12 center login-header" style="display: block;float: none !important;margin-left: auto !important;
    margin-right: auto !important;text-align: center;">
            <h2>Welcome to Newsletter Builder</h2>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
<?php
			if (isset($error))
			{?>
				 <div class="alert alert-danger">
                <?php echo $error;?>
				
            </div>
			<?php
			}else{?>
			   <div class="alert alert-info">
                Please login with your Username and Password.
				
            </div>
			<?php }?>
			
                    <div class="panel-body">
					<?php $attributes=array('class'=>'form form-horizontal','id'=>'log');
                                  echo form_open('admin/index1',$attributes); ?>
								  
								    <div class="panel-body">
                       <?php echo form_open('admin/index'); ?>
					   
<?php

if($reg!="Your Password has been sent to your mail")
{
 echo '<td width="20%" style="color:red;">';
echo "Mail have been sent successfully";
 echo '</td>';
}
else
{
echo "Failed in sending mail";
}
?>

</div>
								  
					   <fieldset>
                                <div class="form-group">
                                    <input class="form-control validate[required]" placeholder="Username" name="username" size="50" autofocus="" type="text" value="<?php echo set_value('username'); ?>">
									<span class="error"><?php echo form_error('title');?></span>
									                                </div>
                                <div class="form-group">
                                    <input class="form-control validate[required]" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" size="50" type="password">
								
									                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" value="Remember Me" type="checkbox">Remember Me
                                    </label>
                                </div>
								 <a data-target=".forget-modal" data-toggle="modal" class="forget" href="javascript:;">Forgot your password?</a>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login
                            </button>
							</fieldset>
                        <?php echo form_close(); ?>        
						</div>
                </div>
            </div>
        </div>
    </div>
	


       

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery_email" id="recovery_email" class="form-control validate[required]" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom" id="recover">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<!-- jQuery -->
    

	
	<script type="text/javascript">

$('#forget_pwd').click(function(){
$('#modal_dialog').show();
});

$(document).ready(function(){
	$("#log").validationEngine();
	$("#recovery_email").validationEngine();
	});


$('#recover').click(function(){
$("#recovery_email").validationEngine();
var maval=$('#recovery_email').val();
//alert(maval);
var dataString = 'forgot_email='+ maval;
	     $.ajax({
		 url : '<?php echo lang_url();?>admin/emailcheck',
		 data: dataString, 
		 type: 'POST',
		 success: function(resp) { 
		 if(resp=="Mail has been sent successfully")
		 {
		var reg="1";
		window.location.href="<?php  echo lang_url().'admin/login1/' ?>"+reg; 
		 }
		 else
		 {
		 var reg="2";
		window.location.href="<?php  echo lang_url().'admin/login1/' ?>"+reg; 
		 }
		 }
});
});


function show_box()
{	alert('//');
		$('#ssttst').show();
}



function show_login()
{	//alert('//');
		$('#modal_dialog').hide();
}

</script>
</body>

</html>
