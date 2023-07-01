<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    posts: Array
});
</script>
<template>
    <div>
        <h1>All Posts</h1>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <a :href="`/posts/${post.id}`">{{ post.title }}</a>
            </li>
        </ul>
    </div>
</template>