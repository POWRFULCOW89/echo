<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    post: Object,
    user: Object
});
</script>


<template>
    <Head title="Post" />
    <pre>{{ JSON.stringify(post) }}</pre>
    <pre>{{ JSON.stringify(user) }}</pre>
    <div>
      <h2>{{ post.title }}</h2>
      <p>{{ post.content }}</p>
      <p>Author: {{ user.name }}</p>
    </div>
  </template>
  