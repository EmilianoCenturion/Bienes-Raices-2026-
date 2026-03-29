<?php 
    require "../../includes/config/database.php";

    $db = conectarDB();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

    require "../../includes/funciones.php";
    incluirTemplate("header")
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>
    
    <form class="formulario" method="POST" action="/admin/properties/crear.php">

        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" placeholder="Titulo Propiedad" id="titulo" name="titulo">
            
            <label for="precio">Precio:</label>
            <input type="number" placeholder="Precio Propiedad" id="precio" name="precio">
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion"></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9">
            
            <label for="baños">Baños:</label>
            <input type="number" id="baños" placeholder="Ej: 3" min="1" max="9">
            
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select>
                <option value="1">Emiliano</option>
                <option value="2">Morena</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate("footer") ?>