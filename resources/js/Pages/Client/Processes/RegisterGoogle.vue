<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    defineProps({
        googleUser:{
            type: Object,
            required: true
        }
    })

    const form = useForm({
        name: '',
        lastname: '',
        email: '',
        phone_number: '',
        document_type: '',
        document_number: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });


    const submitForm = () => {
        post(route('clients.store'), {
            name: googleUser.user.given_name,
            lastname: googleUser.user.family_name,
            email: googleUser.email,
            phone_number: form.phone_number.value,
            document_type: form.document_type.value,
            document_number: form.document_number.value,
            password: form.password.value,
            password_confirmation: form.password_confirmation.value,
            terms: form.terms.value,
        });
    }
</script>

<template>
    <Head title="Registrarse" />
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submitForm">
                <div>
                    <InputLabel for="name" value="Nombres" />
                    <TextInput
                        id="name"
                        v-model="googleUser.user.given_name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        disabled
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="lastname" value="Apellidos" />
                    <TextInput
                        id="lastname"
                        v-model="googleUser.user.family_name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        disabled
                    />
                    <InputError class="mt-2" :message="form.errors.lastname" />
                </div>

                <div class="mt-4">
                    <InputLabel for="document_type" value="Tipo de Documento" />
                    <TextInput
                        id="document_type"
                        v-model="form.document_type"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="document_type"
                    />
                    <InputError class="mt-2" :message="form.errors.document_type" />
                </div>

                <div>
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
                    v-model="googleUser.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    disabled
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

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmar Contraseña" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            Acepto <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terminos</a> y <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Condiciones</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    ¿Ya esta registrado?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
