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


            //CIFRADO SIMETRICO

            function cifrar($contrasena, $llave){ //función para cifrar el mensaje
                $inivec = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC')); //vector de inicialización para guardar el cifrado
                $men_encriptado = openssl_encrypt($contrasena, "AES-256-CBC", $llave, 0, $inivec); //Método para cifrar la información
            
                return base64_encode($men_encriptado. "::".$inivec); //Regresa el mensaje cifrado
                
            }
            
            function descifrar($contrasena, $llave){ //funcion para descifrar el mensaje
                list($datos_encriptados, $inivec) = explode('::', base64_decode($contrasena),2); 
                return openssl_decrypt($datos_encriptados, 'AES-256-CBC', $llave, 0, $inivec); //Método para descrifrar la información
                
            }
            
            $llave = base64_encode(openssl_random_pseudo_bytes(64)); //Contraseña para cifrar y descifrar
            
            
            $mensaje_cifrar  = $_POST ['contra'];; //Mensaje a cifrar
            
            $mensaje_cifrado = cifrar($mensaje_cifrar, $llave); //Llama la función para cifrar la información
            
            $mensaje_descifrado = descifrar($mensaje_cifrado, $llave); //Llama la función para descifrar la información
            
            //encriptar contraseña
            $contraseña = ( $mensaje_cifrado);

            echo "<input type='password' id='contra1' name='contra1' required>";
            $contraseña1 =($mensaje_descifrado);


               
        }
            //agregar registros a la bd
        if($errores == ''){
            $statement = $conexion->prepare('INSERT INTO usuarios2 (id, nombre, usuario, email, telefono, contra_cif_aes, contra_descifrada) VALUES(null,:nombre, :usu, :email,:telefono,:contra,:contra1)');
            $statement->execute(array(
                ':nombre'=>$nombre, 
                ':usu'=> $usuario, 
                ':email'=> $email, 
                ':telefono'=>$telefono, 
                ':contra'=>$contraseña,
                ':contra1'=>$contraseña1
            ));
            //Enviar a inicio de sesion
            header ('Location: ./views/formulario2.view.php');
        }

    }

    require(',/views/formulario.view.php');
?>