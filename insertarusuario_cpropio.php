<?php session_start ();

    if (isset($_SESSION['usuario'])){
        header ('Location: ./views/formulariocpropio.view.php');
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
            $statement = $conexion->prepare('SELECT * FROM usuarioscpropio WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario'=> $usuario));
            $resultado = $statement->fetch();

            if ($resultado != false){
                $errores.= '<li>El nombre de usuario ya existe</li>';
            }


            //encriptar contraseña
            $pass= $contraseña;
            $arr_msj=str_split($pass);

            $incremento=0;
            $decremento=count($arr_msj)-1;
            $cifrado=[];
            $tam=intdiv(count($arr_msj), 2);
            $contraseña.$tam;
            $msj="";

            for($i=0;$i<$tam;$i++){
            $cifrado[$incremento]=$arr_msj[$decremento];
            $incremento++;
            $cifrado[$incremento]=$arr_msj[$i];
            $incremento++;
            $decremento--;
            }
            if(!(count($arr_msj)%2==0))
                $cifrado[count($arr_msj)-1]=$arr_msj[$tam];
                
            for($i=0;$i<count($cifrado);$i++)
                $msj=$msj.$cifrado[$i];


             //descifrar contraseña
            
            $pass1=$msj;// dato que recibes de tu contraseña o mensaje cifrado :D
            $arr_msj1=str_split($pass1);
            $incremento1=0;
            $decremento1=count($arr_msj1)-1;
            $descifrado=[];
            $tam1=intdiv(count($arr_msj1), 2);
            $msj.$tam1;
            $passdes="";
            for($j=0;$j<$tam1;$j++){
            $descifrado[$decremento1]=$arr_msj1[$incremento1];
            $incremento1++;
            $descifrado[$j]=$arr_msj1[$incremento1];
            $incremento1++;
            $decremento1--;
            }
            if(!(count($arr_msj1)%2==0))
                $descifrado[$tam1]=$arr_msj1[count($arr_msj1)-1];
                
            for($j=0;$j<count($descifrado);$j++)
                $passdes=$passdes.$descifrado[$j];
            

            echo "<input type='password' id='contra1' name='contra1'>";
            
               
        }
            //agregar registros a la bd
        if($errores == ''){
            $statement = $conexion->prepare('INSERT INTO usuarioscpropio (id, nombre, usuario, email, telefono, contra, contra_cif_propio) VALUES(null,:nombre, :usu, :email,:telefono, :contra, :contra1)');
            $statement->execute(array(
                ':nombre'=>$nombre, 
                ':usu'=> $usuario, 
                ':email'=> $email, 
                ':telefono'=>$telefono, 
                ':contra1'=>$msj,
                ':contra'=>$passdes
            ));

            header ('Location: ./views/formulariocpropio.view.php');
        }

    }

    require('./views/formulariocpropio.view.php');
?>
