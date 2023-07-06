<script setup>
import Footer from '@/Components/Footer.vue';
import Nav from '@/Components/Nav.vue';
</script>

<template>
    <div>
        <Nav />
        <main class="dark:bg-gray-800 dark:text-white">
            <slot />
        </main>
        <Footer />
    </div>
</template>
