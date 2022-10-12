<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cifrado simétrico</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-info mb-5">
        <div class="container justify-content-center">
            <a class="navbar-brand fs-4" href="../docs/index.html">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active fs-4 " aria-current="page" href="formulario2.view.php">Cifrado simétrico AES</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active fs-4 " aria-current="page" href="formulario.view.php">Cifrado asimétrico RSA</a>
            </li>
            </ul><br><br><br>
            </div>
        </div>
    </nav>
        <h4 class="h1 text-center text-success">Cifrado asimétrico RSA</h4><br><br>

        <div class="container fluid justify-content-center">            

            <form class="col-7 p-0 shadow-sm container fluid justify-content-center" action="../insertar_usuarios.php" method="POST">
                <div class="row m-0 px-5">
                    <div class="col-12 p-0 mb-4  text-center">
                        <h3 class="h1">Registrarse</h3>
                        <img src="https://cdn-icons-png.flaticon.com/512/74/74472.png" width="50px" height="50px"/>

                    </div> 
                <div class="col-6 p-0 mb-4 pe-3">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Nombre</label>
                    <input type="text" class="form-control rounded-0" id="nombre" name="nombre" placeholder="Viviana José Manuel" required>
                </div>
                <div class="col-6 p-0 mb-4 pe-3">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Usuario</label>
                    <input type="text" class="form-control rounded-0" id="usu" name="usu"placeholder="vivi34" required>
                </div>
                <div class="col-6 p-0 mb-4 pe-3">    
                    <label for="inputEmail4" class="col-sm-2 col-form-label">Email</label>
                    <input type="email" class="form-control rounded-0" id="correo" name="correo" placeholder="correo@correo.com" required>
                </div>
                <div class="col-6 p-0 mb-4 pe-3">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Telefono</label>
                    <input type="text" class="form-control rounded-0" id="telefono" name="telefono" placeholder="4561234543" required>
                </div>
                <div class="col-6 p-0 mb-4 pe-3">
                    <label for="inputPassword4" class="col-sm-2 col-form-label">Password</label>
                    <input type="password" class="form-control rounded-0" id="contra" name="contra" required>
                </div>

                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <a class="form-check-label" for="flexCheckDefault" href="#">
                    Aviso de privacidad
                </a>
                </div>


                <div class="col-12 mb-2 p-0 text-center">
                    <input type="submit" class="btn btn-primary mb-3" name="enviando" value="Enviar">
                </div>
            </div>
        </form><br><br><br>


        <h4 class="h1 text-center text-success">Consulta de datos:</h4><br><br>

        <?php

            $conexion=mysqli_connect('localhost', 'root','','cifrado' )    
        ?>
            <table class="table table-bordered text-center">
            <thead>
                <tr>
                <th scope="col">Id </th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Contraseña cifrada RSA</th>
                <th scope="col">Contraseña descifrada</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql="SELECT * FROM usuarios";
                $result=mysqli_query($conexion, $sql);
                
                while($mostrar=mysqli_fetch_array($result)){
                ?>
                <tr>
                <td  scope="row"><?php echo $mostrar['id']?></td>
                <td><?php echo $mostrar['nombre']?></td>
                <td><?php echo $mostrar['usuario']?></td>
                <td><?php echo $mostrar['email']?></td>
                <td><?php echo $mostrar['telefono']?></td>
                <td><?php echo $mostrar['contra_cif_rsa']?></td>
                <td><?php echo $mostrar['contra_descifrada']?></td>
                </tr>
            </tbody>
            <?php
                }
            ?>
            </table>
        </div>
        </div>
    </div>
    
</body>
</html>