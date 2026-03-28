<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.webp" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3.000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque illum consequuntur laborum ipsum itaque recusandae in laboriosam harum quod! Unde enim vero ducimus sequi mollitia voluptates, temporibus dolore facilis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis ipsum vero accusamus unde, cum commodi autem, voluptas blanditiis itaque doloremque aliquid obcaecati ut sequi quae nisi impedit adipisci minus. Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p>Ratione suscipit quasi illo? Necessitatibus voluptatem maiores, tempora repudiandae laborum molestias modi in fugiat, quia facilis enim dignissimos atque delectus rerum nihil? Lorem ipsum dolor sit amet consectetur adipisicing elit. At quisquam excepturi sapiente aliquid error, quis est magni ea. Eaque quae ut voluptas deserunt sapiente officiis aliquid incidunt vero odio minus</p>
        </div>
    </main>
    
<?php incluirTemplate("footer"); ?>