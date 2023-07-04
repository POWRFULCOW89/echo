<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Nav from "@/Components/Nav.vue";
import Footer from "@/Components/Footer.vue";
import NavLink from "@/Components/NavLink.vue";
import getTimeAgo from "utils/getTimeAgo";
import getTimeToRead from "utils/getTimeToRead";


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    posts: Array
});

</script>

<template>
    <Head title="Welcome" />

    <div>
        <Nav/>
    </div>


    <main class="relative">
        <img src="/images/home.png" alt="Background Image" class="w-full h-full object-cover">
        <div class="absolute inset-0">
            <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-20 lg:px-10 lg:text-left ">
                <h1 class="text-6xl sm:text-6xl font-poppins text-white">Let your voice<a class="font-bold"> be heard</a>
                </h1><br />
                <p class="py-4 text-4xl sm:text-4xl font-poppins text-white">Share your story with the <br />world, anytime.
                </p><br />
                <a href=""
                    class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins text-2xl">Begin
                    exploring</a><br />
            </div>
        </div>


        <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-5 lg:px-10 lg:text-left">
            <p class="py-4 text-2xl sm:text-2xl font-poppins ">What people are saying</p><br />

            <div class="grid justify-center space-y-4 ">

                <a :href="`/posts/${post.id}`" v-for="post in posts" :key="post.id">
                    <div class="flex flex-wrap bg-left-top">
                        <!-- <p>{{ post?.tags?.[0].name }}</p> -->
                        <div class="max-w-xs px-4 rounded-lg">

                            <img :src="post.image_url" class="shadow rounded max-w-full h-auto align-middle border-none" />
                        </div>

                        <div class="flex flex-col justify-evenly p-4 text-2xl  font-poppins ">
                            <p class="mt-4">{{ post.title }}</p>
                            <div class="flex items-center flex-wrap bg-left-top">
                                <div class="flex flex-1 justify-between items-center text-xl">
                                    <div class="flex gap-3 items-center">
                                        <img :src="post.user.profile_photo_url"
                                            class=" shadow rounded-full max-w-full h-auto align-middle border-none" />
                                        <div>
                                            <p class="text-lg">{{ post.user.name }}</p>
                                            <p class="text-base text-gray-500">{{ getTimeAgo(post.created_at) }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm" v-if="post.tags && post.tags.length > 0">{{ post.tags[0].name }}</p>
                                    <p class="text-sm">{{ getTimeToRead(post.content) }} min</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <Footer/>

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
