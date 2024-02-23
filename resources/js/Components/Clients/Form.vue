<script setup>
    import FormSection from '@/Components/FormSection.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating:{
            type: Boolean,
            default: false
        },
    })

    defineEmits(['submit'])
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Actualizar Cliente' : 'Crear Nuevo Cliente' }}
        </template>
        <template #description>
            {{ updating ? 'Actualizar Cliente existente' : 'Crear un nuevo cliente' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span6">
                <div>
                    <InputLabel for="name" value="Nombres" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mt-4">
                    <InputLabel for="lastname" value="Apellidos" />
                    <TextInput
                        id="lastname"
                        v-model="form.lastname"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="lastname"
                    />
                    <InputError class="mt-2" :message="form.errors.lastname" />
                </div>
                <div class="mt-4">
                    <label for="document_type" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                    <select
                        id="document_type"
                        v-model="form.document_type"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required
                        autofocus
                    >
                        <option value="" disabled selected>Selecciona</option>
                        <option value="C.C">Cedula Ciudadania</option>
                        <option value="T.I">Tarjeta Identidad</option>
                        <option value="C.E">Cedula Extranjeria</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.document_type" />
                </div>

                <div class="mt-4">
                    <InputLabel for="document_number" value="Numero de Documento" />
                    <TextInput
                        id="document_number"
                        v-model="form.document_number"
                        type="number"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="document_number"
                    />
                    <InputError class="mt-2" :message="form.errors.document_number" />
                </div>

                <div class="mt-4">
                    <InputLabel for="phone_number" value="Numero de Telefono" />
                    <TextInput
                        id="phone_number"
                        v-model="form.phone_number"
                        type="number"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="phone_number"
                    />
                    <InputError class="mt-2" :message="form.errors.phone_number" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Correo Electronico" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

            </div>
        </template>

        <template #actions>
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ updating ? 'Actualizar' : 'Registrar' }}
            </PrimaryButton>
        </template>

    </FormSection>

</template>
