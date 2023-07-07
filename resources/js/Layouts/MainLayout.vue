<script setup>
import Footer from '@/Components/Footer.vue';
import Nav from '@/Components/Nav.vue';
import NavAutenticado from '@/Components/NavAutenticado.vue';
import FooterAutenticado from '@/Components/FooterAutenticado.vue';

defineProps({
    user: Object
});

</script>

<template>
    <div>
        <NavAutenticado v-if="!!user" />
        <Nav v-else />
        <main class="dark:bg-gray-800 dark:text-white">
            <slot />
        </main>
        <FooterAutenticado v-if="!!user" />
        <Footer v-else />
    </div>
</template>
