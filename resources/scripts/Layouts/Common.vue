<script setup>
    defineProps({
        title: String,
        links: Array
    });
</script>

<template>
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div v-if="title" class="breadcrumb-area" data-bg-image="/public/pronia/assets/images/breadcrumb/bg/1-1-1919x388.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">{{ title }}</h2>
                            <ul>
                                <li v-for="([url, name], index) in links" :key="index">
                                    <a href="{{ url }}">{{ name }}</a>
                                </li>
                                <li>{{ title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <slot />
    </main>
    <!-- Begin Main Content Area -->
</template>
