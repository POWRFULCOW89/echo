<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import NavAutenticado from "@/Components/NavAutenticado.vue";
import FooterAutenticado from "@/Components/FooterAutenticado.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    tags: Array,
    user: Object,
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
                        <div class="w-1/12 py-20">
                            <div class="py-2">
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

                <p v-if="tags.length === 0" class="text-center w-full dark:text-white text-2xl">
                    No tags found
                </p>

                <ul v-else class="w-5/6 p-4 flex flex-wrap gap-6">
                    <li v-for="tag in tags" :key="tag.id">
                        <a :href="`/posts/${tag.id}`"
                            class="btn bg-gray-300 px-4 py-1.5 rounded-full hover:bg-blue text-lg mb-8">
                            {{ tag.name }}
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
