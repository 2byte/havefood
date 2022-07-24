<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import BreezeGuestLayout from '@/Layouts/Common.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        useForm
    } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        email: String,
        token: String,
    });

    const form = useForm({
        token: props.token,
        email: props.email,
        password: '',
        password_confirmation: '',
    });

    const submit = () => {
        form.post(route('password.update'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

    const navLinks = [
        [route('home.index'), 'Главная'],
        [route('login'), 'Вход'],
        [route('register'), 'Регистрация'],
    ];
</script>

<template>
    <BreezeGuestLayout title="Сброс пароля" :links="navLinks">
        <Head title="Сброс пароля" />

        <div class="login-register-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">

                        <BreezeValidationErrors class="mb-4" />

                        <form @submit.prevent="submit">
                            <div class="login-form">
                                <h4 class="login-title">Создание нового пароля</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <BreezeLabel for="email" value="Email" />
                                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                                    </div>

                                    <div class="col-lg-12">
                                        <BreezeLabel for="password" value="Password" />
                                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                    </div>

                                    <div class="col-lg-12">
                                        <BreezeLabel for="password_confirmation" value="Confirm Password" />
                                        <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="col-lg-12">
                                        <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="btn btn-custom-size lg-size btn-pronia-primary">
                                            Сбросить пароль
                                        </BreezeButton>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeGuestLayout>
</template>