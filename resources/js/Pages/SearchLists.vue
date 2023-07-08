<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import NavAutenticado from "@/Components/NavAutenticado.vue";
import FooterAutenticado from "@/Components/FooterAutenticado.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    posts: Array,
    user: Object,
    post: Object,
    lists: Array
});

const params = new URLSearchParams(window.location.search);
const query = params.get('q');


</script>


<template>
    <Head title="Search" />
    <MainLayout :user="user">
        <div class="p-12 font-poppins min-h-screen">
            <div class="flex justify-between items-center">
                <p class="text-2xl">Results for <a class="font-bold">{{ query }}</a></p>
            </div>

            <div class="flex p-4">
                <div class="w-1/6">
                    <div class="flex">
                        <div class="w-1/12 py-32">
                            <div class="py-1">
                                <span class="vertical-line"></span>
                            </div>
                        </div>
                        <div class="w-11/12">
                            <ul class="space-y-4 text-xl">
                                <li><a :href="`/search-post${query != null ? '?q=' + query : ''}`">Post</a></li>
                                <li><a :href="`/search-people${query != null ? '?q=' + query : ''}`">People</a></li>
                                <li><a :href="`/search-tags${query != null ? '?q=' + query : ''}`">Tags</a></li>
                                <li><a :href="`/search-lists${query != null ? '?q=' + query : ''}`">Lists</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-px bg-gray-200"></div>

                <p v-if="lists.length === 0" class="text-center w-full dark:text-white text-2xl">
                    No lists found
                </p>

                <ul v-else class="w-5/6 p-4">
                    <li v-for="list in lists" :key="list.id">
                        <!-- <a :href="`/posts/${post.id}`" class="flex border rounded-lg m-3 place-items-center"> -->
                        <div class="flex">
                            <div class="w-1/3 p-3">
                                <div class="gap-3">
                                    <div class="flex items-center">
                                        <img :src="list.image_url" class="rounded-full h-8 w-8 object-cover mr-2" />
                                        <p class="text-ls">{{ list.name }}</p>
                                    </div>

                                    <!-- <img :src="post.image" alt="post image" class="w-32 h-32 rounded-lg" /> -->
                                    <div class="p-2">
                                        <p class="text-xl font-bol">{{ list.description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/3 p-3">
                                <div class="flex justify-end items-center h-full">
                                    <div class="text-right">
                                        <p class="flex items-center justify-end text-s">
                                            200k followers
                                            <font-awesome-icon class="text-lg ml-2" :icon="['fas', 'user-group']" />
                                        </p>
                                        <p class="flex items-center justify-end text-s">
                                            June 12, 2023
                                            <font-awesome-icon class="px-1 text-lg ml-2" :icon="['fas', 'calendar']" />
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="w-1/3">
                                <img src="/images/articlePost.png" alt="Membership Image"
                                    class="w-full h-full object-cover rounded-r-lg">
                            </div>

                        </div>


                        <!-- </a> -->
                    </li>
                </ul>
            </div>
        </div>
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

