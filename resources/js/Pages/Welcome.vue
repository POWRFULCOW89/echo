<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from "../Utils/getTimeAgo";
import getTimeToRead from "../Utils/getTimeToRead";
import MainLayout from '@/Layouts/MainLayout.vue';
import Post from '@/Components/Post.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    posts: Array,
    user: Object
});

</script>

<template>
    <Head title="Welcome" />

    <MainLayout :user="user">
        <div class="relative ">
            <img src="/images/home.png" alt="Background Image" class="w-full h-full object-cover">
            <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-20 lg:px-10 lg:text-left absolute left-0 top-0">
                <h1 class="text-6xl sm:text-6xl">Let your voice<a class="font-bold"> be
                        heard</a>
                </h1><br />
                <p class="py-4 text-4xl sm:text-4xl">Share your story with the <br />world,
                    anytime.
                </p><br />
                <a href="/feed" class="btn bg-blue px-6 py-2 rounded-full hover:bg-gray-400  text-2xl">Begin
                    exploring</a><br />
            </div>


            <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-5 lg:px-10 lg:text-left">
                <p class="py-4 text-2xl sm:text-2xl font-poppins ">What people are saying</p><br />

                <ul class="w-3/4 mx-auto">
                    <li v-for="post in posts" :key="post.id">
                        <Post :post="post" />
                    </li>
                </ul>
            </div>
        </div>
    </MainLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
