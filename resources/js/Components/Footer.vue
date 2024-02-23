<script setup>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faFacebook, faTwitter, faInstagram, faLinkedin } from '@fortawesome/free-brands-svg-icons';

library.add(faFacebook, faTwitter, faInstagram, faLinkedin);

</script>

<template>
    <footer class="bg-gray-800 text-white p-20 ">
        <div class="container mx-auto flex flex-wrap">
            <div class="w-full md:w-1/4 px-4 mb-4 md:mb-0">
                <h3 class="text-lg font-bold mb-2">Institucional</h3>
                <ul>
                    <li><a href="#">Acerca de nosotros</a></li>
                    <li><a href="#">Nuestro equipo</a></li>
                    <li><a href="#">Contáctanos</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 px-4 mb-4 md:mb-0">
                <h3 class="text-lg font-bold mb-2">Personas</h3>
                <ul>
                    <li><a href="#">Buscar empleo</a></li>
                    <li><a href="#">Consejos para el CV</a></li>
                    <li><a href="#">Testimonios</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 px-4 mb-4 md:mb-0">
                <h3 class="text-lg font-bold mb-2">Reclutadores</h3>
                <ul>
                    <li><a href="#">Publicar un trabajo</a></li>
                    <li><a href="#">Planes y precios</a></li>
                    <li><a href="#">Contáctanos</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 px-4 mb-4 md:mb-0">
                <h3 class="text-lg font-bold mb-2">Síguenos en redes sociales</h3>
                <ul class="flex space-x-4">
                    <li>
                        <font-awesome-icon :icon="['fab', 'facebook']" />
                    </li>
                    <li>
                        <font-awesome-icon :icon="['fab', 'twitter']" />
                    </li>
                    <li>
                        <font-awesome-icon :icon="['fab', 'instagram']" />
                    </li>
                    <li>
                        <font-awesome-icon :icon="['fab', 'linkedin']" />
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>
