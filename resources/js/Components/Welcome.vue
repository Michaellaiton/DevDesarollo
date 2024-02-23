<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import { ref } from 'vue';
</script>

<template>
    <div class="w-full bg-[url('../img/fondo-tecnologia.jpg')] bg-no-repeat bg-cover">
        <div class="h-[600px] w-full relative">
            <div class="w-full h-full flex justify-center items-center">
                <img src="../../img/logo-negro.png" alt="Logo empresa" class="w-80 h-auto">
            </div>
            <div class="absolute bottom-0 px-4 py-3 bg-gray-700/50 w-[600px] justify-start">
                <h1 class="text-white font-semibold text-4xl">{{ $page.props.auth.user.name }} {{ $page.props.auth.user.lastname }}</h1>
                <p class="text-gray-200">Cargo - {{  $page.props.user.roles }}</p>
            </div>
        </div>

        <p>{{ $page.props.user.role }}</p>

    </div>

</template>
