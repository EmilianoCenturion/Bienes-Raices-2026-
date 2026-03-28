<?php
    require "includes/funciones.php";
    incluirTemplate("header");
?>
    
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="sobre nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experienca
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil neque illum consequuntur laborum ipsum itaque recusandae in laboriosam harum quod! Unde enim vero ducimus sequi mollitia voluptates, temporibus dolore facilis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis ipsum vero accusamus unde, cum commodi autem, voluptas blanditiis itaque doloremque aliquid obcaecati ut sequi quae nisi impedit adipisci minus. Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

                <p>Ratione suscipit quasi illo? Necessitatibus voluptatem maiores, tempora repudiandae laborum molestias modi in fugiat, quia facilis enim dignissimos atque delectus rerum nihil? Lorem ipsum dolor sit amet consectetur adipisicing elit. At quisquam excepturi sapiente aliquid error, quis est magni ea. Eaque quae ut voluptas deserunt sapiente officiis aliquid incidunt vero odio minus!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt laudantium incidunt reiciendis mollitia.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt laudantium incidunt reiciendis mollitia.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt laudantium incidunt reiciendis mollitia.</p>
            </div>
        </div>
    </section>

<?php incluirTemplate("footer"); ?>