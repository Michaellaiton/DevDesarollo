<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import ClientForm from '@/Components/Clients/Form.vue';

    const props = defineProps({
        clients:{
            type: Object,
            required: true
        },
    })

    const form = useForm({
        name: props.clients.name,
        lastname: props.clients.lastname,
        phone_number: props.clients.phone_number,
        document_type: props.clients.document_type,
        document_number: props.clients.document_number,
        email: props.clients.email,
        password: props.clients.password
    })
</script>


<template>
    <AppLayout title="Editar Cliente">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Editar Clientes</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ClientForm :updating="true" :form="form" @submit="form.put(route('clients.update', clients.id))"/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
