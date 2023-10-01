<?php
//traer header
require_once("views/layouts/header.php");
?>
<!-- Enlace para agregar un nuevo producto -->
<a href="index.php?m=nuevo" class="btn">NUEVO</a>

<!-- Tabla para mostrar la lista de productos -->
<table>
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>PRECIOS</td> <!-- Aquí debería ser "PRECIO" en singular -->
    </tr>
    <tbody>
        <?php
        if (!empty($dato)): // Comprueba si $dato no está vacío

            // Recorre los datos obtenidos de la base de datos
            foreach ($dato as $key => $value) {
                foreach ($value as $v): ?>
                    <tr>
                        <td>
                            <?php echo $v['id'] ?> <!-- Muestra el ID del producto -->
                        </td>
                        <td>
                            <?php echo $v['nombre'] ?> <!-- Muestra el nombre del producto -->
                        </td>
                        <td>
                            <?php echo $v['precio'] ?> <!-- Muestra el precio del producto -->
                        </td>
                    </tr>
                <?php endforeach;
            }

        else: // Si no hay registros, muestra un mensaje

            ?>
            <tr>
                <td colspan="3">No hay registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once("views/layouts/footer.php");