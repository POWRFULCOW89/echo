<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import NavAutenticado from "@/Components/NavAutenticado.vue";
import FooterAutenticado from "@/Components/FooterAutenticado.vue";
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    // posts: Array,
    users: Array,
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
                        <div class="w-1/12 py-11">
                            <span class="vertical-line"></span>
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

                <p v-if="users.length === 0" class="text-center w-full dark:text-white text-2xl">
                    No users found
                </p>

                <ul v-else class="w-5/6 p-4">
                    <li v-for="user in users" :key="user.id">
                        <a :href="`/profile/${user.id}`" class="flex border p-3 rounded-lg m-3 place-items-center">
                            <div class="flex-1 flex flex-col">
                                <div class="flex gap-3">
                                    <!-- <img :src="post.image" alt="post image" class="w-32 h-32 rounded-lg" /> -->
                                    <img :src="user.profile_photo_url" />
                                    <div>
                                        <a href=""
                                            class="btn bg-blue text-white px-3 py-0.5 rounded-full hover:bg-sky-600 text-sm mb-8">Follow</a>
                                        <p class="text-lg">{{ user.name }}</p>
                                        <p class="text-sm text-gray-500">{{ getTimeAgo(user.created_at) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <div class="text-right">
                                    <p class="flex items-center justify-end text-s">
                                        200k followers
                                        <font-awesome-icon class="text-lg ml-2" :icon="['fas', 'user-group']" />
                                    </p>
                                    <p class="flex items-center justify-end text-s">
                                        200k posts
                                        <font-awesome-icon class="px-1 text-lg ml-2" :icon="['fas', 'file-lines']" />
                                    </p>
                                    <p class="flex items-center justify-end text-s">
                                        1m likes
                                        <font-awesome-icon class="text-lg ml-2" :icon="['fas', 'heart']" />
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
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
