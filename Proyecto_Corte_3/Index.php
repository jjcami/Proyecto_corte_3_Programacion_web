<!doctype html>
<html>
    <head>
        <!-- Para el CSS -->
        <link rel="stylesheet" type="text/css" href="CSS/Estilos.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Proyecto Corte 3</title>
        <!--Página web que permita a un auxiliar medico manejar la base de datos de los pacientes, 
        hacer las consultas y actualizaciones necesarias, nunca eliminar a un paciente, 
        ya que eso es del área administrativa.-->
    </head>
    <body>        
        <div id = "main">
            <!--Encabezado-->
            <div id = "encabezado">
                <header>
                    <div id = "titulo">
                        <img src="imagenes/logo.png" width="60" height="60" alt="logo" id="logo">
                        <h1 id = "titulo_encabezado">Info Medic</h1>
                        <h2 id = "subtitulo_encabezado">Sistema de Gestion de Informacion</h2>
                    </div>
                    <nav><!--navegador-->
                        <ul>
                            <li><a href="Inicio">Inicio</a></li>
                            <li><a href="Inicio">Inicio</a></li>
                            <li><a href="Inicio">Inicio</a></li>
                            <li><a href="Inicio">Inicio</a></li>
                        </ul>
                    </nav>
                </header>            
            </div>
            <!--Formulario-->
            <div id = "formulario">
            <!--
                <form action="Index.php" method="POST">
                    C.C. <input type="text" name="id"> <br>
                    <input type="submit" name="Consultar" value="Consultar">
                </form>
            -->
            
                <form class="row g-3" action="Index.php" method="POST"> 
                    <div class="col-auto">
                        <label>No. de Identidad</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="cc" name="cc">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Consultar</button>
                    </div>
                </form>
            </div>
            <div id = "datos">
                <?php
                    $inc = include("Pages/config_db.php");

                    $cc = $_POST['cc'];

                    echo "Datos Recolectados <br>";
                    echo "CC: ".$cc."<br>";    

                    $sql = "SELECT * FROM citas WHERE cc = '$cc'";                    
                ?>
                <table ib="tabla_1" class="table">
                    <thead>
                        <tr>
                            <td>Numero de cita</td>
                            <td>Nomero de Documento</td>
                            <td>Nit de hospital o clinica</td>
                            <td>Nombre del Medico</td>
                            <td>Fecha</td>
                        </tr>
                    </thead>
                        <?php
                            if ($inc) {    
                                $result = mysqli_query($conn,$sql);
                                if ($result){
                                    while ($row = $result->fetch_array()){
                        ?>
                    <tbody>  
                        <tr>
                            <td><?php echo $row['num_c']?></td>
                            <td><?php echo $row['cc']?></td>
                            <td><?php echo $row['nit']?></td>
                            <td><?php echo $row['nombre_doctor']?></td>
                            <td><?php echo $row['fecha']?></td>                    
                        </tr>
                        <?php
                                    }
                                }
                            }
                        ?>
                    </tbody>  
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>