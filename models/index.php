<?php

class Modelo
{
    private $Modelo; // Esta variable no se utiliza y parece innecesaria.
    private $db; // Almacena una instancia de la conexión a la base de datos.
    private $datos; // Un arreglo donde se almacenan los resultados de las consultas.

    // Constructor de la clase.
    public function __construct()
    {
        $this->Modelo = array(); // No se utiliza esta variable.
        $this->db = new PDO('mysql:host=localhost;dbname=mvc', "root", ""); // Se crea una conexión a la base de datos usando PDO.
    }

    // Método para insertar datos en la base de datos.
    public function insertar($tabla, $data)
    {
        $consulta = "INSERT INTO $tabla VALUES ('null', $data)"; // Creación de la consulta SQL de inserción.
        $resultado = $this->db->query($consulta); // Ejecución de la consulta.
        
        if ($resultado) {
            return true; // Si la consulta se ejecuta con éxito, devuelve verdadero.
        } else {
            return false; // Si hay un error en la consulta, devuelve falso.
        }
    }

    // Método para mostrar datos de la base de datos.
    public function mostrar($tabla, $condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . ";"; // Creación de la consulta SQL de selección.
        $resu = $this->db->query($consul); // Ejecución de la consulta.

        while ($filas = $resu->fetchAll(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas; // Almacena los resultados de la consulta en $this->datos.
        }
        
        return $this->datos; // Devuelve los datos obtenidos de la consulta.
    }
}



    // public function actualizar($tabla, $data, $condicion)
    // {
    //     $consulta = "UPDATE $tabla SET $data WHERE $condicion";

    //     $resultado = $this->db->query($consulta);
    //     if ($resultado) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }



    // public function eliminar($tabla, $condicion)
    // {
    //     $eli = "delete from " . $tabla . " where " . $condicion;
    //     $res = $this->db->query($eli);
    //     if ($res) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }



