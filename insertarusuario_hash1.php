<?php session_start ();

    if (isset($_SESSION['usuario'])){
        header ('Location: ./views/formulariohash1.view.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $usuario= filter_var(strtolower($_POST['usu']), FILTER_SANITIZE_STRING);
        $email = filter_var($_POST ['correo'], FILTER_SANITIZE_EMAIL);
        $telefono =$_POST ['telefono'];
        $contraseña  = $_POST ['contra'];


        $errores = '';
        //comprobar que los datos esten escritos correctamente
        if (empty ($nombre) or empty($usuario) or empty($email) or empty($telefono) or empty($contraseña)){
            $errores .= '<li>Por favor rellena todos los datos correctamente</li>';

            //crear la conexion con la bd
        } else{
            try{
                $conexion = new PDO ('mysql:host=localhost;dbname=cifrado', 'root', '');
            
            
            }catch(PDOException $e){
                echo "ERROR :". $e->getMessage();
            }
            //comprobar que el usuario no exista en bd
            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario'=> $usuario));
            $resultado = $statement->fetch();

            if ($resultado != false){
                $errores.= '<li>El nombre de usuario ya existe</li>';
            }

            //encriptar contraseña sha1
            $contraseña = hash('sha1', $contraseña);
               
        }
            //agregar registros a la bd
        if($errores == ''){
            $statement = $conexion->prepare('INSERT INTO usuarioshash1 (id, nombre, usuario, email, telefono, contra_cif_hash1) VALUES(null,:nombre, :usu, :email,:telefono,sha1(:contra))');
            $statement->execute(array(
                ':nombre'=>$nombre, 
                ':usu'=> $usuario, 
                ':email'=> $email, 
                ':telefono'=>$telefono, 
                ':contra'=>$contraseña
            ));

            header ('Location: ./views/formulariohash1.view.php');
        }

    }

    require('./views/formulariohash1.view.php');
?>