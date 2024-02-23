<script setup>

    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import RolForm from '@/Components/Role/Form.vue';

    const form = useForm({
        name: '',
    })
</script>

<template>
    <AppLayout title="Clientes">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Crear Rol</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <RolForm :form="form" @submit="form.post(route('roles.store'))"/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
