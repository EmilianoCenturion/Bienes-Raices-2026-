<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu Hogar</h1>

        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.webp" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>13/06/2026</span> por <span>Admin</span> </p>
        
    </main>

<?php incluirTemplate("footer"); ?>