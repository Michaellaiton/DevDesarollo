<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { library } from '@fortawesome/fontawesome-svg-core';
    import { faPencilAlt, faTrash, faUserPlus, faFileUpload  } from '@fortawesome/free-solid-svg-icons';

    library.add(faPencilAlt, faTrash, faUserPlus, faFileUpload);

    defineProps({
        clients:{
            type: Object,
            required:true
        }

    })

    const deleteClient = id =>{
        if(confirm('¿Esta Seguro de eliminar este Cliente?')){
            Inertia.delete(route('client.destroy', id))
        }
    }

</script>

<template>

    <AppLayout title="Clientes">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Clientes</h1>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <Link :href="route('clients.create')" class="text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded" v-if="$page.props.user.permissions.includes('create user')" title="Crear un nuevo cliente deseado">
                            <font-awesome-icon icon="user-plus" />
                        </Link>

                        <Link :href="route('clients.importClient')" class="text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded" v-if="$page.props.user.permissions.includes('import user')" title="Importar un archivo Excel">
                            <font-awesome-icon icon="file-upload" />
                        </Link>

                    </div>
                    <div class="mt-6">
                        <!-- <ul role="list" class="divide-y divide-gray-100">
                            <li v-for="client in clients.data" class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <div class="flex">
                                            <p class="text-base font-semibold leading-6 text-gray-900 mr-2">{{ client.name}}</p>
                                            <p class="text-base font-semibold leading-6 text-gray-900">{{ client.lastname}}</p>
                                        </div>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ client.email}}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ client.phone_number}}</p>
                                    </div>
                                    <div class="min-w-0 flex-auto">

                                    </div>
                                </div>

                                <div class="shrink-0 sm:flex sm:items-center">
                                    <Link :href="route('clients.edit', client.id )" class="mr-5 bg-blue-600 py-1 px-3 text-white rounded">Editar</Link>
                                    <Link @click="deleteClient(client.id)" class="mr-5 bg-red-600  py-1 px-3 text-white rounded">Eliminar</Link>
                                </div>
                            </li>
                        </ul> -->

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombres
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Numero Telefonico
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Documento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Numero de Documento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Correo Electronico
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="client in clients.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ client.id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ client.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ client.lastname }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ client.phone_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ client.document_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ client.document_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ client.email }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <Link :href="route('clients.edit', client.id )" class="mr-5 font-medium text-blue-600 dark:text-blue-500 hover:underline" title="Editar Cliente">
                                            <font-awesome-icon icon="pencil-alt" />
                                        </Link>
                                        <Link @click="deleteClient(client.id)" class="font-medium text-red-600 dark:text-blue-500 hover:underline" title="Eliminar Cliente">
                                            <font-awesome-icon icon="trash" />
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>
