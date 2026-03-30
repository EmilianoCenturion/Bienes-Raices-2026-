<?php 

    // Validar que sea un Id valido

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: /admin");
    }

    require "../../includes/config/database.php";

    $db = conectarDB();

    // Consulta para obtener los datos de la propíedad

    $consultaProp = "SELECT * FROM propiedades WHERE id = $id";
    $resultadoProp = mysqli_query($db, $consultaProp);
    $propiedad = mysqli_fetch_assoc($resultadoProp);

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];
    
    $titulo = $propiedad["titulo"];
    $precio = $propiedad["precio"];
    $descripcion = $propiedad["descripcion"];
    $habitaciones = $propiedad["habitaciones"];
    $wc = $propiedad["wc"];
    $estacionamiento = $propiedad["estacionamiento"];
    $vendedores_id = $propiedad["vendedores_id"];
    $imagenProp = $propiedad["imagen"];
    
    // Ejecutar el codigo despues de que el usuario envia el formulario
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        /* 
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        */

        $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio = mysqli_real_escape_string($db, $_POST["precio"]);
        $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
        $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
        $wc = mysqli_real_escape_string($db, $_POST["wc"]);
        $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
        $vendedores_id = mysqli_real_escape_string($db, $_POST["vendedor"] ?? " ");
        $creado = date("Y/m/d");

        // Asignar files hacia una variable
        $imagen = $_FILES["imagen"];

        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        
        if(!$descripcion) {
            $errores[] = "La descripcion es obligatoria";
        }
        
        if(!$habitaciones) {
            $errores[] = "El numero de habitaciones es obligatorio";
        }
        
        if(!$wc) {
            $errores[] = "El numero de wc es obligatorio";
        }
        
        if(!$estacionamiento) {
            $errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }
        
        if(!$vendedores_id) {
            $errores[] = "Elige un vendedor";
        }
        
        // Validar por tamaño (100kb maximo)

        $medida = 1000 * 1000;

        if($imagen["size"] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)) {

            // Crear carpeta

            $carpetaImagenes = "../../imagenes/";
            
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            
            $nombreImagen = " ";

            // Subida de Archivos

            if($imagen["name"]){ 
                // Eliminar img previa

                unlink($carpetaImagenes . $propiedad["imagen"]);

                // Generar un nombre unico

                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                // Subir la imagen

                move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen);

            } else {
                $nombreImagen = $propiedad["imagen"];
            }
            
            // Insertar en la Base de Datos 

            $query = " UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedores_id WHERE id = $id";
            
            echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header("Location: /admin?resultado=2");
            }

        }

    }

    require "../../includes/funciones.php";
    incluirTemplate("header")
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>
    
    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" placeholder="Titulo Propiedad" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
            
            <label for="precio">Precio:</label>
            <input type="number" placeholder="Precio Propiedad" id="precio" name="precio" value="<?php echo $precio; ?>">
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="/imagenes/<?php echo $imagenProp; ?>" alt="imagen propiedad" class="imagen-small">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            
            <label for="wc">wc:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc ?>">
            
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option disabled selected>-- Seleccione --</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)) :?>
                    <option <?php echo $vendedores_id === $vendedor["id"] ? "selected" : ""; ?>   value="<?php echo $vendedor["id"]; ?>"> <?php echo $vendedor["nombre"] . " " . $vendedor["apellido"]; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate("footer") ?>