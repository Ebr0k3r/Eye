
<html lang="en">
<head>
	<title>Eagleye</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/icon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<img src="images/logo.png">
				</span>
		<?php
		session_start();
		include ("config.php");

		function dec($action, $string) {
                            $output = false;    
                            $encrypt_method = "AES-256-CBC";
                            $secret_key = 'Ab$zU7shXT';
                            $secret_iv = 'Ab$zU7shXT';    
                            $key = hash('sha256', $secret_key);
                            $iv = substr(hash('sha256', $secret_iv), 0, 16);
                            if( $action == 'encrypt' ) {
                                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                                $output = base64_encode($output);
                            }
                            else if( $action == 'decrypt' ){
                                     $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                            }
 
                            return $output;
                        }

		if(isset($_POST['isesion'])) {
			$query = $mysqli->query("SELECT `nick`,`password` FROM `usuarios` WHERE nick='$_POST[username]'");

				$session=$query->fetch_assoc();

				if($_POST['userpassword']==dec("decrypt",$session['password'])){

					$_SESSION['username']=$_POST['username'];
					
					header("location: panel.php");

    		}  else{
    			?>
			    <div class="alert alert-danger alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Usuario o contraseña incorrectos.</div>
			    <?php
    		}       
		
	}
		?>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Ingrese un usuario">
					<input class="input100" type="text" name="username" id="username" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese una contraseña">
					<input class="input100" type="password" name="userpassword" id="userpassword" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="isesion">Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<footer class="sm-padding bg-dark" id="footer">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- footer logo -->
                        <div class="footer-logo">
                        	<br>
                        	<center><img src="images/net.png" style="width: 200px; height: 45px;"></img></center>
                        	<br>
                        </div>
                        <div class="footer-copyright">
                        	<center>
                        		 <p style="font-family: verdana; color: white;" >
                                Copyright © 2018 todos los derechos reservados | Desarrollado por
                                <a href="https://netSecurity.ga" target="_blank">
                                    NetSecurity
                                </a>
                            </p>
                            <br>
                        	</center>
                        </div>
                        <!-- /footer copyright -->
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </footer>
</body>
</html>

