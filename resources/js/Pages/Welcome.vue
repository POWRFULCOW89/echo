<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    posts: Array
});

const getTimeToRead = (content) => {
    const wordCount = content.split(' ').length;
    const minutes = Math.ceil(wordCount / 200); // Assuming average reading speed of 200 words per minute
    return minutes;
};

const getTimeAgo = (createdAt) => {
    const currentTime = new Date();
    const diffInMilliseconds = currentTime - new Date(createdAt);
    const diffInSeconds = Math.floor(diffInMilliseconds / 1000);
    let timeAgo;

    if (diffInSeconds < 60) {
        timeAgo = `${diffInSeconds} seconds ago`;
    } else if (diffInSeconds < 3600) {
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        timeAgo = `${diffInMinutes} minutes ago`;
    } else if (diffInSeconds < 86400) {
        const diffInHours = Math.floor(diffInSeconds / 3600);
        timeAgo = `${diffInHours} hours ago`;
    } else if (diffInSeconds < 604800) {
        const diffInDays = Math.floor(diffInSeconds / 86400);
        timeAgo = `${diffInDays} days ago`;
    } else {
        const diffInWeeks = Math.floor(diffInSeconds / 604800);
        timeAgo = `${diffInWeeks} weeks ago`;
    }

    return timeAgo;
};

</script>

<template>
    <Head title="Welcome" />

    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    </head>



    <nav class="bg-blue py-6 relative">

        <div class="container mx-auto flex">
            <div class="flex flex-grow font-kalam">

                <a href="" class="text-white  text-2xl">((( Echo )))</a>
            </div>

            <div class="flex justify-end flex-grow">
                <div>
                    <a href="" class="text-white lg:mr-10 font-poppins">Our Mission</a>
                    <a href="" class="text-white lg:mr-10 font-poppins">Membership</a>
                    <a href="" class="text-white lg:mr-10 font-poppins">Create</a>
                    <a href="" class="btn bg-gray-900 text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins">Get
                        started</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-20 lg:px-10 lg:text-left">
            <div class="bg-fixed bg-no-repeat bg-left-top bg-cover bg-center"
                style="background-image: url('/images/home.png')">
            </div>

            <a class="text-3xl sm:text-4xl font-poppins">Let your voice</a><a
                class="text-3xl sm:text-4xl font-bold font-poppins"> be heard</a><br />
            <p class="py-4 text-2xl sm:text-2xl font-poppins">Share your story with the <br />world, anytime.</p><br />
            <a href="" class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins">Begin
                exploring</a><br />

        </div>

        <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-5 lg:px-10 lg:text-left">
            <p class="py-4 text-2xl sm:text-2xl font-poppins ">What people are saying</p><br />

            <!-- <li v-for="post in posts" :key="post.id">
                <a :href="`/posts/${post.id}`">{{ post.title }}</a>
            </li> -->

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

    <footer class="bg-gray py-6 relative">
        <div class="container mx-auto flex">
            <div class="flex flex-grow">
                <a href="" class="text-white font-kalam text-2xl">((( Echo )))</a>
            </div>

            <div class="flex justify-between flex-grow">
                <div>
                    <a class="text-white lg:mr-10 font-kalam text-2xl">Let your voice be heard!</a>
                </div>

                <div>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Terms</a>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Privacy</a>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Help</a>
                </div>
            </div>
        </div>
    </footer>
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
