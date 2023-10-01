<?php
require_once("models/index.php");
class modeloController
{
    private $model; // Almacena una instancia de la clase Modelo.

    function __construct()
    {
        $this->model = new Modelo(); // Crea una instancia de la clase Modelo cuando se crea un objeto de esta clase.
    }

    // Método para mostrar una lista de productos.
    static function index()
    {
        $producto = new Modelo(); // Crea una instancia de la clase Modelo.
        $dato = $producto->mostrar("productos", "1"); // Llama al método mostrar de la clase Modelo.
        require_once("viewmodel/index.php"); // Requiere la vista correspondiente.
    }

    // Método para mostrar el formulario de creación de un nuevo producto.
    static function nuevo()
    {
        require_once("viewmodel/nuevo.php"); // Requiere la vista correspondiente para mostrar el formulario.
    }

    // Método para guardar un nuevo producto en la base de datos.
    static function guardar()
    {
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $data = "'" . $nombre . "'," . $precio;
        $producto = new Modelo(); // Crea una instancia de la clase Modelo.
        $dato = $producto->insertar("productos", $data); // Llama al método insertar de la clase Modelo para agregar un nuevo producto.
        header("location:" . urlsite); // Redirige a la página principal después de guardar el producto.
    }
}


    // //editar
    // static function editar()
    // {
    //     $id = $_REQUEST['id'];
    //     $producto = new Modelo();
    //     $dato = $producto->mostrar("productos", "id=" . $id);
    //     require_once("views/editar.php");
    // }
    //actualizar
    // static function actualizar()
    // {
    //     $id = $_REQUEST['id'];
    //     $nombre = $_REQUEST['nombre'];
    //     $precio = $_REQUEST['precio'];
    //     $data = "nombre=" . $nombre . "',precio=" . $precio;
    //     $producto = new Modelo();
    //     $dato = $producto->actualizar("productos",$data, "id=" .$id);
    //     header("location:" . urlsite);
    // }
