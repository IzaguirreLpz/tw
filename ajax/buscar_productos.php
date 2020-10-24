<?php
require '../funcs/conexion.php';
require '../funcs/funcs.php';

session_start();

$rol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usuario'];
?>

<div class="table-responsive" id="tableListar_length">
    <table class="table table-striped b-t b-light" id="tableListar" style="margin: 10px 0 0 0;">
        <thead>
            <tr class="success">
                <th>Nombre Del Producto</th>
                <th>Descripcion</th>
                <th>Proveedor</th>
                <th>Precio De Venta</th>
                <th>Precio Costo</th>
                <th>Unidades Disponibles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM tbl_productos order by id_productos ASC";
            $query = mysqli_query($mysqli, $sql);
            $count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM tbl_usuario");
            $row1 = mysqli_fetch_array($count_query);
            $numrows = $row1['numrows'];
            if ($numrows > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $product_id = $row['id_productos'];
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $proveedor = $row['proveedor'];
                    $cantidad = $row['cantidad'];
                    $precioCosto = $row['precio_costo'];
                    $precioVenta = $row['precio_venta'];
            ?>
                    <tr>
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td><?php echo $proveedor; ?></td>
                        <td><?php echo $precioVenta; ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td><?php echo $precioCosto; ?></td>
                        <td>
                            <a href="add_product.php?idProduct=<?php echo $product_id ?> " class='btn btn-default' ui-toggle-class=""><i class="fa fa-pencil text-success text-dark"></i></a>
                            <a href="#" class='btn btn-default' title='Eliminar Producto' data-toggle="modal" data-target="#myModal4" onclick='obtener_id("<?php echo $product_id; ?>")'><i class="glyphicon glyphicon-remove"></i></a>
                            <script>
                                function reportePDF2() {
                                    var desde = $id;
                                    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=0,height=0,left=-1000,top=-1000`;
                                    open('reporte/re_prueba.php?id=' + id, 'test', params);
                                }
                            </script>

                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No se encontraron resultados</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.es.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script src="js/global.js"></script>