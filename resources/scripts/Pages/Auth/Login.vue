<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import BreezeCheckbox from '@/Components/Checkbox.vue';
    import Layout from '@/Layouts/Common.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false
    });

    const submit = () => {
        console.log(form)
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };

    const navLinks = [
        [route('home.index'), 'Главная'],
        [route('register'), 'Регистрация'],
    ];
</script>

<template>
    <Layout :links="navLinks" title="Вход для пользователя">
        <Head title="Вход в учётную запись" />

        <div class="login-register-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <BreezeValidationErrors class="mb-4" />

                        <div v-if="status" class="mb-1 alert alert-success">
                            {{ status }}
                        </div>

                        <form @submit.prevent="submit">
                            <div class="login-form">
                                <h4 class="login-title">Вход в учётную запись</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <BreezeLabel for="email" value="Email или номер" />
                                        <BreezeInput id="email" type="text" v-model="form.email" required autofocus autocomplete="username" />
                                    </div>

                                    <div class="col-lg-12">
                                        <BreezeLabel for="password" value="Password" />
                                        <BreezeInput id="password" type="password" v-model="form.password" required autocomplete="current-password" />
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="check-box">
                                            <BreezeCheckbox name="remember" id="remember_me" v-model:checked="form.remember" :checkedDefault="true" class="me-1"/>
                                            <BreezeLabel for="remember_me" value="Запомнить меня" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 pt-1 mt-md-0">
                                        <div class="forgotton-password_info">
                                            <Link v-if="canResetPassword" :href="route('password.request')">
                                                Забыли пароль?
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-5">
                                        <BreezeButton class="btn btn-custom-size lg-size btn-pronia-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Вход
                                        </BreezeButton>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>