<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import NavAutenticado from "@/Components/NavAutenticado.vue";
import FooterAutenticado from "@/Components/FooterAutenticado.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    posts: Array,
    user: Object,
});


</script>


<template>
    <Head title="Search" />
    <MainLayout :user="user">
    <div class="p-12 font-poppins">
        <div class="flex justify-between items-center">
            <p class="text-2xl">Results for <a class="font-bold">Airbending</a></p>
        </div>

        <div class="flex p-4">
            <div class="w-1/6">
                <div class="flex">
                    <div class="w-1/12 py-20">
                        <div class="py-2">
                            <span class="vertical-line"></span>
                        </div>
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
            <ul class="w-5/6 p-4 flex flex-wrap gap-6">
                <li v-for="post in posts" :key="post.id">
                        <a :href="`/posts/${post.id}`"
                           class="btn bg-gray-300 px-4 py-1.5 rounded-full hover:bg-blue text-lg mb-8">
                            {{post.user.name}}
                        </a>
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
