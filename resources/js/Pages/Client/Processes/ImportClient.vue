<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { ref, onMounted } from 'vue';

    let csrfToken = ref(null);

    onMounted(() => {
        const tokenElement = document.querySelector('meta[name="csrf-token"]');
        console.log(tokenElement + "Token")
        if (tokenElement) {
            csrfToken.value = tokenElement.getAttribute('content');
        } else {
            console.error('CSRF token no encontrado');
        }
    });


</script>

<template>
    <AppLayout title="Importar Cliente">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Importar Clientes</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="md:col-span-1 flex justify-between">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        Importar Cliente
                                    </h3>

                                    <p class="mt-1 text-sm text-gray-600">
                                        La importación de un archivo Excel para registrar clientes permite a los usuarios cargar de manera eficiente grandes cantidades de datos de clientes desde un archivo Excel a un sistema o aplicación. Esto facilita la creación rápida y precisa de registros de clientes, evitando la necesidad de ingresar manualmente cada dato individualmente.
                                    </p>
                                </div>
                            </div>

                            <div class="md:col-span-1 px-4 sm:px-0">
                                <div class="mt-5 md:mt-0">
                                    <form :action="route('clients.import')" method="POST" enctype="multipart/form-data">
                                        <div class="px-4 py-5 bg-white sm:p-6 shadow"  >
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span6">
                                                    <input type="hidden" name="_token" :value="tokenElement">
                                                    <input type="file" name="import_file" class="mt-1 block w-full" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div  class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                            <button class="text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded" type="submit">Importar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <form :action="route('clientsImports.store')" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="_token" :value="csrfToken">
                            <input type="file" name="import_file">
                            <button class="text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded" type="submit">Importar</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
