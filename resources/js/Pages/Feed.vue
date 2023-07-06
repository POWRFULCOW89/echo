<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Post from "../Components/Post.vue"
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    posts: Array,
    prompt: String
});



</script>

<template>
    <Head title="Feed" />

    <MainLayout>
        <main class="flex">
            <aside class="flex-1 border ">
                &nbsp;
            </aside>
            <section class="flex flex-col flex-[4] place-items-center">
                <!-- <p class="border">{{ prompt }}</p> -->
                <div class="flex flex-col w-3/4 m-auto">
                    <p
                        class="text-blue font-bold -rotate-3 rounded-lg m-auto border-blue border-2 w-max px-8 py-2 text-2xl translate-y-1/2 bg-white dark:bg-gray-800">
                        PROMPT OF THE DAY</p>
                    <div class="border-blue border-2 rounded-lg px-12 pt-12 pb-8 text-xl text-center">
                        {{ prompt }}
                    </div>
                    <Link href="/editor" class="bg-blue px-8 py-2 font-bold text-center flex gap-3 w-max place-items-center rounded-lg self-end
                translate-x-1/2 -translate-y-1/2 hover:scale-110 text-white">
                    <p class=" ">Write</p>
                    <font-awesome-icon class="" :icon="['fas', 'arrow-right']" />
                    </Link>
                </div>

                <div class="w-1/4 m-auto my-6 border-b-2 border-gray-500" />

                <ul class="w-3/4">
                    <li v-for="post in posts" :key="post.id" class="my-8">
                        <Post :post="post" />
                    </li>
                </ul>
            </section>
            <aside class="flex-1 border">

            </aside>

        </main>
    </MainLayout>
</template>