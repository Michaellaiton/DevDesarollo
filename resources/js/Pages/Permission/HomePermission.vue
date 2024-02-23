<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';

    defineProps({
        permissions:{
            type: Object,
            required: true
        }
    })
</script>


<template>
    <AppLayout title="Permisos">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Permisos</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <Link :href="route('permissions.create')"  class="text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded" v-if="$page.props.user.permissions.includes('create permissions')">
                            Crear Permiso
                        </Link>
                    </div>
                    <div class="mt-4">

                        {{ permissions.data }}
                        <!-- <ul role="list" class="divide-y divide-gray-100">
                            <li v-for="permission in permissions" class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <div class="flex">
                                            <p class="text-base font-semibold leading-6 text-gray-900 mr-2">{{ permission.name}}</p>
                                        </div>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ permission.guard_name}}</p>
                                    </div>
                                    <div class="min-w-0 flex-auto">

                                    </div>
                                </div>

                                <div class="shrink-0 sm:flex sm:items-center">
                                    <Link class="mr-5 bg-blue-600 py-1 px-3 text-white rounded">Editar</Link>
                                    <Link  class="mr-5 bg-red-600  py-1 px-3 text-white rounded">Eliminar</Link>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
