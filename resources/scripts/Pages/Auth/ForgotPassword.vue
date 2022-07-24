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

    defineProps({
        status: String,
    });

    const form = useForm({
        email: '',
    });

    const submit = () => {
        form.post(route('password.email'));
    };

    const navLinks = [
        [route('home.index'), 'Главная'],
        [route('login'), 'Вход'],
        [route('register'), 'Регистрация'],
    ];
</script>

<template>
    <BreezeGuestLayout title="Восстановление пароля" :links="navLinks">
        <Head title="Восстановление пароля" />
        <div class="login-register-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">

                        <div v-if="status" class="alert alert-success">
                            {{ status }}
                        </div>

                        <BreezeValidationErrors class="mb-4" />

                        <form @submit.prevent="submit">
                            <div class="login-form">
                                <h4 class="login-title">Вход в учётную запись</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <BreezeLabel for="email" value="Email" />
                                        <BreezeInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />
                                    </div>

                                    <div class="col-lg-12">
                                        <BreezeButton :class="{ 'opacity-25': form.processing }" class="btn btn-custom-size lg-size btn-pronia-primary" :disabled="form.processing">
                                            Отправить ссылку
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