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

    <link rel="stylesheet" type="text/css" href="panel/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="panel/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="panel/css/local.css" />

    <script type="text/javascript" src="panel/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="panel/bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
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
                    <li class="selected"><a href="panel.php"><i class="fa fa-bullseye"></i> Menu</a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="fa fa-google"></i> Gmail</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Outlook</a></li>
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
                      include("config.php");
                    
                      if(isset($_SESSION['username'])){
                    ?>  
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>

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
                <div class="col-lg-12">
                    <!-- <h1>Dashboard <small>Statistics and more</small></h1> -->
                </div>
            </div>
        </div>
        <center><h1 style="font-family: verdana;">TE QUIERO MUCHO MI AMOR <img src="https://libertadbajopalabra.com/wp-content/uploads/2018/11/coraz%C3%B3n.png" style="width: 60px; height: 60px;"></h1>
            <h4 style="font-family: verdana; color: grey">ERES LO MEJOR QUE ME HA PASADO</h4>
        </center>
          
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                traffic = [
                {
                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                },
                {
                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                },
                {
                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                },
                {
                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                },
                {
                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                }];


            $("#shieldui-chart1").shieldChart({
                theme: "dark",

                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                theme: "dark",
                primaryHeader: {
                    text: "Traffic Per week"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "pie",
                    collectionAlias: "traffic",
                    data: visits
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: traffic
                },
                sorting: {
                    multiple: true
                },
                rowHover: false,
                paging: false,
                columns: [
                { field: "Source", width: "170px", title: "Source" },
                { field: "Amount", title: "Amount" },                
                { field: "Percent", title: "Percent", format: "{0} %" },
                { field: "Target", title: "Target" },
                ]
            });            
        });        
    </script>
</body>
</html>
 <?php
        } else{

            header("location:index.php");

            }
         ?>
