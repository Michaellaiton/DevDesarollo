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
        }
    })

    defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Actualizar Rol' : 'Crear Nuevo Rol' }}
        </template>
        <template #description>
            {{ updating ? 'Actualizar Rol existente' : 'Estos roles representan conjuntos predefinidos de permisos que determinan qué acciones y recursos puede realizar o acceder un usuario en particular dentro de la aplicación' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span6">
                <div>
                    <InputLabel for="name" value="Nombre del rol" />
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
            </div>
        </template>

        <template #actions>
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ updating ? 'Actualizar' : 'Registrar' }}
            </PrimaryButton>
        </template>
    </FormSection>

</template>
