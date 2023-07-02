<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';

defineProps({
    posts: Object,
});


</script>


<template>
    <Head title="Editor" />

    <main class="p-12">
        <div class="flex justify-between items-center">
            <p class="text-2xl">My posts</p>
            <Link class="bg-blue px-4 py-2 rounded text-white " href="/editor">
            Create new post
            </Link>
        </div>

        <div class="flex justify-center items-center">
            <p class="text-xl text-gray-500 py-4" v-if="posts.length == 0">No posts</p>
            <ul v-else class="w-full my-16">
                <li v-for="post in posts" :key="post.id" class="w-3/4 m-auto py-3">

                    <div class="border-gray-500 border p-5 rounded-xl flex flex-col gap-3">
                        <div class="flex justify-between items-start gap-3">
                            <p class="text-lg w-3/4">{{ post.title }}</p>
                            <Link :href="`/posts/${post.id}`">
                            <font-awesome-icon class="text-2xl" :icon="['fas', 'arrow-right']" />
                            </Link>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-base text-gray-500">Last updated {{ getTimeAgo(post.updated_at) }}</p>
                            <Link :href="`/editor/${post.id}`">
                            <font-awesome-icon class="text-2xl" :icon="['fas', 'file-pen']" />
                            </Link>
                        </div>
                        <div class="flex justify-between items-center gap-y-5">
                            <div class="flex gap-5 items-center">
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'heart']" />
                                    <p>199</p>
                                </div>
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'star']" />
                                    <p>19</p>
                                </div>
                                <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'comment']" />
                                    <p>277</p>
                                </div>
                            </div>

                            <font-awesome-icon class="text-black text-2xl hover:text-red-500" :icon="['fas', 'trash']" />
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </main>
</template>
  