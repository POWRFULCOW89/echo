<script setup>
import { Head, Link } from '@inertiajs/vue3';
import getTimeAgo from '../Utils/getTimeAgo';

defineProps({
    posts: Array,
    prompt: String
});
</script>

<template>
    <Head title="Feed" />
    <main class="flex">
        <aside class="flex-1 border ">
            &nbsp;
        </aside>
        <section class="flex flex-col flex-[4] place-items-center">
            <!-- <p class="border">{{ prompt }}</p> -->
            <div class="flex flex-col w-3/4 m-auto">
                <p
                    class="text-blue font-bold -rotate-3 rounded-lg m-auto border-blue border-2 w-max px-8 py-2 text-2xl translate-y-1/2 bg-white">
                    PROMPT OF THE DAY</p>
                <div class="border-blue border-2 rounded-lg px-12 pt-12 pb-8 text-xl text-center">
                    {{ prompt }}
                </div>
                <Link href="/editor" class="bg-blue px-8 py-2 font-bold text-center flex gap-3 w-max place-items-center rounded-lg self-end
                translate-x-1/2 -translate-y-1/2">
                <p class="text-white">Write</p>
                <font-awesome-icon class="text-white" :icon="['fas', 'arrow-right']" />
                </Link>
            </div>

            <div class="w-1/4 m-auto my-6 border-b-2 border-gray-500" />

            <ul class="w-3/4">
                <li v-for="post in posts" :key="post.id">
                    <a :href="`/posts/${post.id}`" class="flex border p-3 rounded m-3 place-items-center">
                        <div class="flex-1 flex flex-col">
                            <div class="flex gap-3">
                                <!-- <img :src="post.image" alt="post image" class="w-32 h-32 rounded-lg" /> -->
                                <img :src="post.user.profile_photo_url" />
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
                        <p class="flex-[1.5] text-right">
                            {{ post.title }}
                        </p>
                    </a>
                </li>
            </ul>
        </section>
        <aside class="flex-1 border">

        </aside>

    </main>
</template>