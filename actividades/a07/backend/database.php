<?php
    namespace Actividades\backend;
    abstract class Database { // Clase abstracta para la conexión a la base de datos
        protected $conexion;

        // Constructor de la clase, recibe como parametros los datos de la conexión
        public function __construct($usuario, $contrasena, $baseDatos) {
            $this->conexion = @mysqli_connect(
                'localhost',
                $usuario,
                $contrasena,
                $baseDatos
            );
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }
?>