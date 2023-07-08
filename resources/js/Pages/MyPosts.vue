<script setup>
import { Head, Link, router, } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';
import MainLayout from '@/Layouts/MainLayout.vue';
import Flash from '@/Components/Flash.vue';

const props = defineProps({
    posts: Object,
    user: Object,
    canCreatePosts: Boolean,
});

const deletePost = (id) => {
    if (confirm('Are you sure you want to delete this post?')) {
        router.delete(`/posts/${id}`)
    }
}

</script>


<template>

    <Head title="My posts" />

    <MainLayout :user="user">

        <div class="p-12 min-h-screen">

            <Flash v-if="canCreatePosts !== undefined && !canCreatePosts"
                :message="`You have exceed the limit of 3 posts per month. To keep creating, please subscribe to Echo+.`" />

            <div class="flex justify-between items-center">
                <p class="text-2xl">My posts</p>
                <Link class="bg-blue px-4 py-2 rounded text-white hover:bg-sky-600" href="/editor">
                Create new post
                </Link>
            </div>

            <div class="flex justify-center items-center">
                <p class="text-xl text-gray-500 py-4" v-if="posts.length == 0">No posts</p>
                <ul v-else class="w-full my-16">
                    <li v-for="post in posts" :key="post.id" class="w-3/4 m-auto py-3">
                        <div class="border-gray-200 border p-5 rounded-xl flex flex-col gap-3">
                            <div class="flex justify-between items-start gap-3">
                                <p class="text-lg w-3/4">{{ post.title }}</p>
                                <Link :href="`/posts/${post.id}`">
                                <font-awesome-icon class="text-2xl hover:text-sky-600" :icon="['fas', 'arrow-right']" />
                                </Link>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-base text-gray-500">Last updated {{ getTimeAgo(post.updated_at) }}</p>
                                <Link :href="`/editor/${post.id}`">
                                <font-awesome-icon class="text-2xl hover:text-gray-400" :icon="['fas', 'file-pen']" />
                                </Link>
                            </div>
                            <div class="flex justify-between items-center gap-y-5">
                                <div class="flex gap-5 items-center">
                                    <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'heart']" />
                                        <p>{{ post.likes }}</p>
                                    </div>
                                    <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'star']" />
                                        <p>{{ post.views }}</p>
                                    </div>
                                    <div class="flex gap-3 items-center"><font-awesome-icon :icon="['fas', 'comment']" />
                                        <p>{{ post.comments }}</p>
                                    </div>
                                </div>

                                <font-awesome-icon @click="deletePost(post.id)"
                                    class="dark:text-white text-2xl hover:text-red-500 hover:cursor-pointer"
                                    :icon="['fas', 'trash']" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </MainLayout>

</template>
