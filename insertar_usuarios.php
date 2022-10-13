<?php session_start ();

    if (isset($_SESSION['usuario'])){
        header ('Location: ./views/formulario.view.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $usuario= filter_var(strtolower($_POST['usu']), FILTER_SANITIZE_STRING);
        $email = filter_var($_POST ['correo'], FILTER_SANITIZE_EMAIL);
        $telefono  = $_POST ['telefono'];
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

            
            //CIFRADO ASIMÉTRICO RSA

            //Crear llaves
            $configargs = array(
                "config" => "C:/xampp/php/extras/openssl/openssl.cnf", //Argumentos para generar las llaves
                'private_key_bits' => 2048,
                'default_md' => "sha256",
            );


            $generar=openssl_pkey_new($configargs); //creacion de las dos llaves

            openssl_pkey_export($generar, $keypriv, NULL, $configargs); //Exporta el contenida de la llave privada a la variable

            $keypub = openssl_pkey_get_details($generar); //Obtiene los detalles para generar la llave publica

            file_put_contents('privada.key',$keypriv); //Crea el archivo .key de la llave privada
            file_put_contents('publica.key',$keypub['key']); //Crea el archico .key de la llave publica



            //cifrar - descifrar

            $contrasena  = $_POST ['contra']; //Texto a cifrar

            $keypublica = openssl_pkey_get_public(file_get_contents('publica.key')); //Extrae el contenido del archivo de la llave

            openssl_public_encrypt($contrasena, $datos_cifrados, $keypublica); //Método para cifrar los datos

            $keyprivada = openssl_pkey_get_private(file_get_contents('privada.key')); //Extrae el contenido del archivo de la llave

            openssl_private_decrypt($datos_cifrados, $datos_descifrados, $keyprivada); //Metodo para descrifrar los datos



            //encriptar contraseña
            $contraseña = ( $datos_cifrados);
            echo "<input type='password' id='contra1' name='contra1' required>";
            $contraseña1 =($datos_descifrados);
               
        }
            //agregar registros a la bd
        if($errores == ''){
            $statement = $conexion->prepare('INSERT INTO usuarios (id, nombre, usuario, email, telefono, contra_cif_rsa, contra_descifrada) VALUES(null,:nombre, :usu, :email,:telefono,:contra,:contra1)');
            $statement->execute(array(
                ':nombre'=>$nombre, 
                ':usu'=> $usuario, 
                ':email'=> $email, 
                ':telefono'=>$telefono, 
                ':contra'=>$contraseña,
                ':contra1'=>$contraseña1
            ));
            //Enviar mensaje 
            header("./views/formulario.view.php");
        }

    }

    require('./views/formulario.view.php');
?>