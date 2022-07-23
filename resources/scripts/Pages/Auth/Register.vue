<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import Layout from '@/Layouts/Common.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
    import {
        Head,
        Link,
        useForm
    } from '@inertiajs/inertia-vue3';

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        phone: ''
    });

    const submit = () => {
        form.post(route('register'), {
            onFinish: () => {
                form.reset('password', 'password_confirmation')
                form.style.hover = 'none';
            },
        });
    };
    
    const navLinks = [
        [route('home.index'), 'Главная'],
        [route('login'), 'Вход'],
    ];
</script>

<template>
    <Layout title="Создание учётной записи" :links="navLinks">
        <Head title="Регистрация" />
        <div class="login-register-area section-space-y-axis-100">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <BreezeValidationErrors class="mb-4" />

                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <form @submit.prevent="submit">
                                <div class="login-form">
                                    <div class="row">
                                        <h4 class="login-title">Заполните форму</h4>
                                        <div class="col-md-6 col-12">
                                            <BreezeLabel for="name" value="Имя*" />
                                            <BreezeInput id="name" type="text" v-model="form.name" required autofocus autocomplete="name" />
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <BreezeLabel for="phone" value="Мобильный телефон*" />
                                            <BreezeInput id="phone" type="text" v-model="form.phone" required autocomplete="phone" placeholder="9020099922" />
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <BreezeLabel for="email" value="Email" />
                                            <BreezeInput id="email" type="email" v-model="form.email" required autocomplete="username" />
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <BreezeLabel for="password" value="Пароль*" />
                                            <BreezeInput id="password" type="password" v-model="form.password" required autocomplete="new-password" />
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <BreezeLabel for="password_confirmation" value="Подтверждение пароля*" />
                                            <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <Link :href="route('login')" class="text-sm mb-2">
                                            Уже зарегистрированы?
                                        </Link>


                                        <BreezeButton class="btn btn-custom-size lg-size btn-pronia-primary me-1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Создать учётную запись
                                        </BreezeButton>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>