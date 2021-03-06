<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J.A.Eventos - Casamientos</title>
	
	<!--<link rel="stylesheet" type="text/css" href="css/inicio.css">-->
    <!-- Bootstrap Core CSS -->
    <link href="components/bootstrap-css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="components/bootstrap-css/css/business-frontpage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- media queries css -->
<!--
    <script src="components/jquery/dist/jquery.min.js"></script> -->

    <!-- jQuery -->
    <script src="components/bootstrap-css/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="components/bootstrap-css/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script> <!-- para google maps-->

    <script type="text/javascript" src="js/funciones.js"></script>
    <script type="text/javascript" src="js/funcionesABM.js"></script>
    <script type="text/javascript" src="js/funcionesLogin.js"></script>
    <script type="text/javascript" src="js/funcionesMapa.js"></script>
    <script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
    <script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>

    <!-- Para estadisticas 05/11/2015-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>


</head>

<body style="background-image:url(components/images/bg5.jpg); position:"back"; opacity: 0.4;">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""> <span class="glyphicon glyphicon-home"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a onclick="Mostrar('mostrarlogin')" href="#"><span class="glyphicon glyphicon-user"></span>Cuenta</a>
                    </li>
                    <li>
                        <a onclick="Mostrar('mostrarregistro')" href="#">Registrarse</a>
                    </li> 
                        
                    <li>
                        <a onclick="Mostrar('ingresoInvitados')" href="#">Invitados</a>
                    </li>
                    <li>
                        <a onclick="Mostrar('mostrarInvitados')" href="#"><span class="glyphicon glyphicon-heart"></span>Listado</a>
                    </li>
                    <li>
                        <a onclick="Mostrar('MostrarEstadisticas')" href="#"></span>Estadisticas</a>
                    </li>

                      ?> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src="components/images/logo.png" style="width:250px;height:170px;">
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content    class="container"-->
    <div >

        <hr>

        <div class="row">
            <div class="col-sm-8" id="principal" align="center"><!--Van los forms que vienen de los botones-->
                    
                   <!-- <a class="btn btn-default btn-lg" href="#" onclick="mostrarlogin()">Call to Action &raquo;</a>-->
                
            </div><!--principal-->
            <div class="col-sm-4">
                <h2>Contacto</h2>
                <address>
                    <strong>J.A.Eventos - Casamientos</strong>
                    <br>Av. Bartolome Mitre 750
                    <br>Avellaneda, Bs As 1870
                    <br><td><button onclick="VerEnMapa('Buenos Aires','Avenida Bartolome Mitre 750','Avellaneda')" class="btn btn-info">Ver en Mapa</td> 
                </address>
                <address>
                    <abbr title="Email"><span class="glyphicon glyphicon-envelope"></abbr> <a href="mailto:contacto@arcejennifer.tuars.com">contacto@arcejennifer.tuars.com</a>
                </address>

                 <h4 class="widgettitle">informe </h4>
                <div id="informe">
                <!--contenido dinamico cargado por ajax-->
                </div><!-- informe para cookies -->
            </div><!--contacto-->
           
        </div><!-- /.row -->
    <!-- /#sidebar -->
       <!-- <hr>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
                <h2>Marketing Box #1</h2>
                <p>These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
                <h2>Marketing Box #2</h2>
                <p>The images are set to be circular and responsive. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
                <h2>Marketing Box #3</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            </div>
        </div>-->
        <!-- /.row -->

        <hr> 

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center"><img src="components/images/logo1.png"></p>
                    <p align="center">Copyright &copy; 2015 - 2016</p>
                    <p> 
                        
                    </p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->




</body>

</html>