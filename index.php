<?php
include 'config.php';

$tablas = [
    "carnesymariscos" => ["titulo" => "Carnes y Mariscos", "precio" => "precio_kg", "stock" => "stock_kg"],
    "frutasverduras" => ["titulo" => "Frutas y Verduras", "precio" => "precio_kg", "stock" => "stock_kg"], // corregido
    "dulcesygolosinas" => ["titulo" => "Dulces y Golosinas", "precio" => "precio", "stock" => "stock"],
    "productosdelimpieza" => ["titulo" => "Productos de Limpieza", "precio" => "precio_unitario", "stock" => "stock"],
    "cuidadopersonal" => ["titulo" => "Cuidado Personal", "precio" => "precio", "stock" => "stock"]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aiven Viewer</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; margin-bottom: 30px; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<h1>Aiven Viewer - Visualización de Datos</h1>

<?php foreach ($tablas as $tabla => $info): ?>
    <h2><?php echo $info["titulo"]; ?></h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        <?php
        try {
            $stmt = $conn->query("SELECT * FROM $tabla");
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$fila['id']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['tipo']}</td>";
                echo "<td>" . (isset($fila[$info['precio']]) ? "\${$fila[$info['precio']]}" : '—') . "</td>";
                echo "<td>" . (isset($fila[$info['stock']]) ? $fila[$info['stock']] : '—') . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='5'>Error al consultar <b>$tabla</b>: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
<?php endforeach; ?>

</body>
</html>
