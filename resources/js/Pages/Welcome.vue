<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import { Dialog, DialogPanel } from '@headlessui/vue';
    import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
    import EventCard from '@/Components/EventCard.vue';
    import Tag from '@/Components/Tag.vue';
    import Footer from '../Components/Footer.vue';

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    });

    const navigation = [
    { name: 'Atención al cliente', href: '#' },
    { name: 'Empresas', href: '#' },
    { name: 'Información', href: '#' },
    { name: 'Sobre Nosotros', href: '#' },
    ]

    const mobileMenuOpen = ref(false)
</script>

<template>
    <Head title="Bienvenido" />

    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">BolsaTalentum</span>
                        <img class="h-16 w-auto" src="../../img/logo-negro.png" alt="LogoEmpresa"/>
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
                        <span class="sr-only">Abrir menú principal</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <Link :href="route('login')" class="text-sm font-semibold leading-6 text-gray-900">Iniciar Sesion <span aria-hidden="true">&rarr;</span></Link>
                </div>
            </nav>
            <Dialog as="div" class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                <div class="fixed inset-0 z-50" />
                <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">BolsaTalentum</span>
                            <img class="h-16 w-auto" src="../../img/logo-negro.png" alt="LogoEmpresa" />
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                            <span class="sr-only">Cerrar menú principal</span>
                            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                        </div>
                        <div class="py-6">
                            <Link :href="route('login')" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Iniciar Sesion</Link>
                        </div>
                    </div>
                </div>
                </DialogPanel>
            </Dialog>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8 bg-[url('../img/foto.jpg')] h-[600px]bg-no-repeat bg-cover">
            <div class=" mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 ">
                <div class="flex flex-col justify-center items-center text-center mt-20">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Descubre tu camino profesional con nosotros.</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Conectamos sueños con oportunidades, porque cada empleo es una puerta abierta hacia un futuro lleno de logros. Encuentra tu camino con nosotros.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link :href="route('login')" class="rounded-md bg-blue-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Empezar</Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8">
            <div class="">
                <h1 class="text-3xl font-medium">
                    Últimos Empleos Publicados de tu interés
                </h1>
                <p>Las empresas más importantes están contratando personas para los siguientes cargos:</p>
            </div>
            <div class="flex justify-around flex-wrap mt-9">

                <EventCard>
                    <template #title>
                        Desarrollador de Software Senior
                    </template>

                    <template #description>
                        Estamos buscando un desarrollador de software senior altamente motivado para unirse a nuestro equipo. Debe tener experiencia en el desarrollo de aplicaciones web y móviles utilizando tecnologías modernas como React, Node.js y SQL.
                    </template>

                    <template #span>
                        <Tag>Tecnología</Tag>
                        <Tag>Tiempo Completo</Tag>
                        <Tag>Junior</Tag>
                    </template>
                </EventCard>

                <EventCard>
                    <template #title>
                        Diseñador Gráfico Creativo
                    </template>

                    <template #description>
                        Estamos en la búsqueda de un diseñador gráfico creativo para unirse a nuestro equipo. Debe tener experiencia en el diseño de materiales visuales tanto para medios digitales como impresos, y habilidades en el uso de herramientas como Adobe Photoshop, Illustrator y/o InDesign.
                    </template>

                    <template #span>
                        <Tag>Diseño</Tag>
                        <Tag>Tiempo Completo</Tag>
                        <Tag>Senior</Tag>
                    </template>
                </EventCard>

                <EventCard>
                    <template #title>
                        Chef Ejecutivo
                    </template>

                    <template #description>
                        Estamos buscando un chef ejecutivo apasionado y creativo para liderar nuestra cocina. Debe tener experiencia en la gestión de equipos, planificación de menús y garantizar la calidad de los platos servidos. Se valorará la capacidad para innovar y crear experiencias culinarias excepcionales.
                    </template>

                    <template #span>
                        <Tag>Gastronomía</Tag>
                        <Tag>Tiempo Completo</Tag>
                        <Tag>Senior</Tag>
                    </template>
                </EventCard>

                <EventCard>
                    <template #title>
                        Ejecutivo de Ventas Senior
                    </template>

                    <template #description>
                        Estamos buscando un ejecutivo de ventas senior para liderar nuestro equipo de ventas. El candidato ideal deberá tener experiencia en la gestión de equipos comerciales, desarrollo de estrategias de ventas y habilidades sólidas de negociación. Se valorará la capacidad para establecer relaciones sólidas con clientes clave.
                    </template>

                    <template #span>
                        <Tag>Ventas</Tag>
                        <Tag>Tiempo Completo</Tag>
                        <Tag>Senior</Tag>
                    </template>
                </EventCard>
            </div>
        </div>

        <div class="relative isolate px-6 pt-14 lg:px-8 bg-[url('../img/fondo2.jpg')] h-[600px]bg-no-repeat bg-cover">
            <div class=" mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 ">
                <div class="flex flex-col justify-center items-center text-center mt-20">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">¡Encuentra tu próximo trabajo con nosotros! </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Nuestra bolsa de empleos te conecta con oportunidades laborales emocionantes y bien remuneradas.</p>

                </div>
            </div>
        </div>
    </div>

    <Footer/>

</template>
