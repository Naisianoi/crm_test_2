<?php 

include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($user->loggedIn()) {	
	header("Location: index.php");
	exit();	
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {	
	$username = $_POST["username"];
	$password = $_POST["password"];	

	if($user->login($username, $password)) {
		header("Location: index.php");
		exit();	
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} else {
	$loginMessage = 'Fill all fields.';
}
include('inc/header4.php');
?>
<title>aquashine.co.ke : Demo Customer Relationship Management (CRM) System</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<body>
	<?php include('top_menus.php'); ?>	
  <div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">      
	  <div class="col-md-9 col-lg-10 main"> 
		<div class="panel panel-info">			
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="username" name="username" value="<?php if(!empty($_POST["username"])) { echo $_POST["username"]; } ?>" placeholder="username" style="background:white;" required>                                       
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
					</div>	

					<!--<label class="radio-inline">
					  &nbsp;<input type="radio"  name="loginType" value="General Manager">&nbsp;General Manager
					</label>
					<label class="radio-inline">
					  &nbsp;<input type="radio"  name="loginType" value="Marketing">&nbsp;Marketing
					</label>
					<label class="radio-inline">
					  &nbsp;<input type="radio" name="loginType" value="Sales">&nbsp;Sales
					</label>-->							
					<div class="form-group">   
						<input type="submit" name="login" value="Login" class="btn btn-info">			
					</div>						
					<!--<p>
					<h3>Sales Manager Login</h3>
					<strong>Email: </strong>andy@phpzag.com<br>
					<strong>Password:</strong> 123
					
					<h3>Sales People Login</h3>
					<strong>Email: </strong>mark@phpzag.com<br>
					<strong>Password:</strong> 123<br>-->
									
					
				</form>   
			</div>                     
		</div>  
	</div>       
    </div>        
	</div>       
		
</body>
</html>
