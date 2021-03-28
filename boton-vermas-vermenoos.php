<?php
date_default_timezone_set("America/El_Salvador");

session_start(); 
if(!isset($_SESSION["my_memories"]) || ($_SESSION["my_memories"]==null)){
    print "<script>alert('No tienes derecho para acceder');window.location='../../../';</script>";

    exit();
}
/* ================================================================================================================== */
require_once("./admin/php/funciones.php");
$con = connectDB();
$ip = getRealIP();
$city = getCityByIP($ip);
$pais = getCountry($ip);
/* ================================================================================================================== */



/* ================================================================================================================== */
$yo = "Jose Luis";
$count = $con->prepare("SELECT COUNT(id) AS contar FROM my_publication");
$count->execute();
$count->store_result();
if($count->num_rows === 0) exit('No rows');
$count->bind_result($contar);
$count->fetch();
/* ================================================================================================================== */




/* ================================================================================================================== */
$fecha = $con->prepare("SELECT COUNT(id) AS rango FROM my_publication WHERE fecha_i BETWEEN date_add(NOW(), INTERVAL -7 DAY) AND NOW()");
$fecha->execute();
$fecha->store_result();
if($fecha->num_rows === 0) exit('No rows');
$fecha->bind_result($ultimos7dias);
$fecha->fetch();
/* ================================================================================================================== */




/* ================================================================================================================== */
$stmt = $con->prepare("SELECT * FROM my_publication ORDER BY id DESC");
$stmt->execute();
$r = $stmt->get_result();
$stmt->get_result();
/* ================================================================================================================== */ 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>This is my profile :)</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="./profile/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./profile/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .img {
                width: 100%;
                display: inline-block;
                text-decoration-color: 
            }
        </style>
      <!-- Funcion de JS boton Mostrar() -->
        <script type="text/javascript">
            function Mostrar(texto){
                var element = document.getElementById("texxto");
                element.innerHTML = texto;
            }

        </script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <section class="content" style="background-color:#000;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3" style="background-color:#000;">
                            <div class="card card-primary card-outline" style="background-color:#000;">
                                <div class="card-body box-profile" style="background-color:#000;">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="./profile/dist/img/WhatsApp Image 2020-03-02 at 5.09.25 PM.jpeg"
                                             alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center" style="color:#fff;">Jos&eacute; Luis</h3>
                                    <p class="text-muted text-center" style="color:#fff;">Software Engineer</p>
                                    <ul class="list-group list-group-unbordered mb-3" style="background-color:#000;">
                                        <li class="list-group-item" style="background-color:#000;">
                                            <b style="color:#fff;">Publicaciones Realizadas</b> <a style="color:#fff;" class="float-right"><?php echo $contar; ?></a>
                                        </li>
                                        <li class="list-group-item" style="background-color:#000;">
                                            <b style="color:#fff;">Interacciones esta semana</b> <a style="color:#fff;" class="float-right"><?php echo $ultimos7dias; ?></a>
                                        </li>
                                        <li class="list-group-item" style="background-color:#000;">
                                            <b style="color:#fff;">Fecha:</b> <a style="color:#fff;" class="float-right"><script src="../login/js/fecha.js"></script></a>
                                        </li>
                                        <li class="list-group-item" style="background-color:#000;">
                                            <b style="color:#fff;">Hora:</b> <a style="color:#fff;" class="float-right" id="hora"></a>
                                        </li>

                                    </ul>
                                    <a href="./admin/index.php" class="btn btn-success btn-block"><i class="fa fa-pencil-square-o"></i><b>   Agregar Historia</b></a>
                                    <a href="./admin/index.php" class="btn btn-danger btn-block"><i class="fa fa-power-off"></i><b>   Cerrar sesión</b></a>
                                    <a href="profile-day.php" class="btn btn-light btn-block"><i class="fa fa-sun-o"></i><b>   Modo Claro</b></a>
                                </div>
                            </div>
                            <div class="card card-primary" style="background-color:#000;">
                                <div class="card-header" style="color:#fff;">
                                    <h3 class="card-title">Sobre M&iacute;</h3>
                                </div>
                                <div class="card-body">
                                    <strong style="color:#fff;"><i class="fa fa-lock"></i> Datos de seguridad</strong>
                                    <p style="color:#fff;" class="text-muted">...
                                    </p>
                                    <hr>
                                    <strong style="color:#fff;"><i class="fa fa-map-marker mr-1"></i> Localizaci&oacute;n</strong>
                                    <p style="color:#fff;" class="text-muted" id="location"><?php echo $city.", ".$pais; ?>
                                    </p>
                                    <hr>
                                    <strong style="color:#fff;"><i class="fas fa-pencil-alt mr-1"></i>Datos extra</strong>
                                    <p style="color:#fff;" class="text-muted">
                                        <span style="color:#fff;" id="data"></span><br>
                                        <span style="color:#fff;" id="xd"></span><br>
                                        <span style="color:#fff;" id="type"></span><br>
                                        <span style="color:#fff;" id="system"></span><br>
                                        <span style="color:#fff;" id="version"></span><br>
                                        <span style="color:#fff;" id="browser"></span>
                                    </p>
                                    <hr>
                                    <strong style="color:#fff;"><i class="far fa-file-alt mr-1"></i> Agente de Usuario</strong>
                                    <p style="color:#fff;" id="ua"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9" style="background-color:#000;">
                            <div class="card" style="background-color:#000;">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <!-- Post -->

                                            <?php
/* ======================================================================================================================================================= */
                                          
                                          /*
                                          
                                          Funcion de recortar caracteres, reemplazo de otras cosas y bla bla bla :v
                                          
                                          */
                                            $simbolos = array("&aacute","&ntilde","&iquest","&eacute","&iacute","&oacute","&uacute","cuo");
                                            $tilde = array("á", "ñ", "¿", "é", "í", "ó","ú","cuando");

                                            while($row = $r->fetch_array()){

                                                $texto = $row["descripcion"];
                                                if(strlen($texto)>100){

                                                    $var = array("<br", "/>");
                                                    $xd = str_replace($simbolos, $tilde, $texto);
                                                    $xdd = str_replace($var, "", $xd);

                                                    $texto = substr($texto,0,100).'...<a href="javascript:void(0);" onClick="Mostrar(`'.html_entity_decode($xdd).'`)">Ver m&aacute;s</a>';
                                                }
/* ======================================================================================================================================================= */
                                              
                                            ?>
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="./profile/dist/img/WhatsApp Image 2020-03-02 at 5.09.25 PM.jpeg" alt="user image">
                                                    <span class="username">
                                                        <a style="color:#fff;" href="#"><?php echo $row["nombre"]; ?></a>
                                                    </span>
                                                    <span style="color:#fff;" class="description">Publicado<br>
                                                        <?php 
                                                $hora = new DateTime($row["hora_i"]);
                                                $date = $row["fecha_i"];
                                                echo fecha_espaniol($date)." a las ".$hora->format('g:i:sa');
                                                        ?></span>
                                                </div>
                                                <p style="color:#fff;">
                                                    "<?php echo html_entity_decode($row["titulo"]); ?>"<br><br>
/* ======================================================================================================================================================= */
                                                    <span id="texxto"><?php echo $texto; ?></span>
/* ======================================================================================================================================================= */
                                                </p> <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail">
                                                    <img src="./admin/img_memories/<?php echo $row['imagen'];?>" alt="<?php echo $row['titulo'];?>" class="img">
                                                </div>
                                                </div><br><br>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-rc
            </div>
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="./profile/plugins/jquery/jquery.min.js"></script>
        <script src="./profile/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./profile/dist/js/adminlte.min.js"></script>
        <script src="./profile/dist/js/demo.js"></script>
    </body>
</html>
