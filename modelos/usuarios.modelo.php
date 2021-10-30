<?php
     
    require_once "conexion.php";

    class ModeloUsuarios{

    /*=================================================================================================================================
        MOSTRANDO LOS USUARIOS 
    ==================================================================================================================================*/


        static public function mdlMostrarUsuarios($tabla, $item, $valor){

            //validación para el método MOSTRANDO LA LISTA DE USUARIOS 
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else{
                //trayendo todos los registros de la base de datos
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt -> execute();

                return $stmt -> fetchAll();

            }        

            $stmt -> close();
            $stmt = null;
        }

    /*=================================================================================================================================
        MÉTODO REGISTRO DE USUARIO  
    ==================================================================================================================================*/

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,nombres,apellidos,telefono,correo,password,rol)
                                                VALUES (:usuario, :nombres, :apellidos, :telefono, :correo, :password, :rol)");
        
        //los atributos de bindParam (:nombres, :apellidos, etc) pueden ser cualquier nombre. 
        //Estos nombres son asignados únicamente para almacenar los datos que se ingresarán en los campos
        //de la tabla a insertar
        //los parámetros de $datos son los extraidos del controlador en el  array de $datos
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["perfil"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();
        $stmt = null;


    }

    /*=================================================================================================================================
        MÉTODO EDITAR USUARIO   
    ==================================================================================================================================*/

    static public function mdlEditarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellidos = :apellidos ,
                                                                 telefono = :telefono, correo = :correo, password = :password,
                                                                 rol = :rol WHERE usuario = :usuario");                        

        //los parámetros de $datos son los extraidos del controlador en el  array de $datos    
            $stmt->bindParam(":nombres", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["celular"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos["perfil"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
    
    
        }
    }