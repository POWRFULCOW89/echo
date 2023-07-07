<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import MainLayout from '@/Layouts/MainLayout.vue';
import Post from '@/Components/Post.vue';

defineProps({
    posts: Array,
    user: Object
});

const params = new URLSearchParams(window.location.search);
const query = params.get('q');

</script>


<template>
    <Head title="Search" />

    <MainLayout :user="user">

        <main class="p-12 font-poppins min-h-screen">
            <div class="flex justify-between items-center">
                <p class="text-2xl">Results for <a class="font-bold">{{ query }}</a></p>
            </div>

            <div class="flex p-4">
                <div class="w-1/6">
                    <div class="flex">
                        <div class="w-1/12">
                            <span class="vertical-line"></span>
                        </div>
                        <div class="w-11/12">
                            <ul class="space-y-4 text-xl">
                                <li><a href="/search-post">Post</a></li>
                                <li><a href="/search-people">People</a></li>
                                <li><a href="/search-tags">Tags</a></li>
                                <li><a href="/search-lists">Lists</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-px bg-gray-200"></div>
                <ul class="w-5/6 p-4">
                    <Post v-for="post in posts" :key="post.id" :post="post" />
                </ul>
            </div>
        </main>
    </MainLayout>
</template>

<style>
.vertical-line {
    display: inline-block;
    border-left: 3px solid #02B4E8;
    height: 1.5em;
    margin-right: 0.5em;
    vertical-align: middle;
}
</style>
