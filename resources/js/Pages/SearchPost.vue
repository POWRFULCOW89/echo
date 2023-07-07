<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import NavAutenticado from "@/Components/NavAutenticado.vue";
import FooterAutenticado from "@/Components/FooterAutenticado.vue";

defineProps({
    posts: Array,
});


</script>


<template>
    <Head title="Search" />
    <NavAutenticado/>

    <main class="p-12 font-poppins">
        <div class="flex justify-between items-center">
            <p class="text-2xl">Results for <a class="font-bold">Airbending</a></p>
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
                <li v-for="post in posts" :key="post.id">
                    <a :href="`/posts/${post.id}`" class="flex border p-3 rounded-lg m-3 place-items-center">
                        <div class="flex-1 flex flex-col">
                            <div class="flex gap-3">
                                <!-- <img :src="post.image" alt="post image" class="w-32 h-32 rounded-lg" /> -->
                                <img :src="post.user.profile_photo_url"/>
                                <div>
                                    <p class="text-lg">{{ post.user.name }}</p>
                                    <p class="text-sm text-gray-500">{{ getTimeAgo(post.created_at) }}</p>
                                </div>
                            </div>
                            <div class="flex gap-5 items-center">
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'heart']" />
                                    <p>{{ post.likes }}</p>
                                </div>
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'star']" />
                                    <p>19</p>
                                </div>
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'comment']" />
                                    <p>277</p>
                                </div>
                            </div>
                        </div>
                        <p class="flex-[1.5] text-right text-xl">
                            {{ post.title }}
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </main>
    <FooterAutenticado/>
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
