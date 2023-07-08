<script setup>
import { Head } from '@inertiajs/vue3';
import Post from '@/Components/Post.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    user: Object,
    posts: Array,
    currentUser: Object,
});

</script>

<template>
    <Head :title="user.name + '\'s profile'" />

    <MainLayout :user="currentUser" class="font-poppins dark:bg-gray-800">
        <div class="w-1/2 mx-auto ">
            <section class="flex gap-8 mt-16 justify-center items-center">
                <img class="w-64 rounded-full" :src="user.profile_photo_url" alt="avatar" />
                <div class="flex flex-col gap-5">
                    <button class="bg-blue text-white px-6 py-2 rounded self-start">Follow</button>
                    <h1 class="text-4xl dark:text-white">{{ user.name }}</h1>
                    <p class="text-gray-800 dark:text-gray-400">{{ user.email }}</p>
                </div>
            </section>

            <div
                class="flex gap-3 my-12 justify-center items-center text-center mx-auto w-1/2 text-gray-700 dark:text-gray-400">
                <font-awesome-icon :icon="['fas', 'user']" />
                <p>200k followers, 200 following</p>
            </div>

            <p class="w-1/2 mx-auto text-lg text-center dark:text-white">{{ user.bio }}</p>

            <div v-if="user.member" class="flex gap-3 justify-center items-center my-8 font-bold text-blue text-xl">
                <font-awesome-icon :icon="['fas', 'crown']" />
                <p>Echo+ user</p>
            </div>

            <section class="mb-20">
                <h2 class="font-bold text-2xl mb-8 dark:text-white">Posts</h2>
                <ul>
                    <li v-for="post in posts" :key="post.id">
                        <Post :post="post" />
                    </li>
                </ul>
            </section>
        </div>
    </MainLayout>
</template>