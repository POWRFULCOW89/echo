<script setup>
import getTimeAgo from '../Utils/getTimeAgo';

defineProps({
    post: Object
});

</script>

<template>
    <a :href="`/posts/${post.id}`"
        class="flex border p-3 rounded m-3 place-items-center dark:bg-gray-700 hover:dark:bg-gray-600">
        <div class="flex-1 flex flex-col gap-5">
            <div class="flex gap-5 items-center">
                <img class="rounded-full" :src="post.user.profile_photo_url" />
                <div>
                    <p class="text-lg dark:text-white">{{ post.user.name }}</p>
                    <p class="text-sm text-gray-500">{{ getTimeAgo(post.created_at) }}</p>
                </div>
            </div>
            <div class="flex gap-5 items-center dark:text-gray-300">
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
        <p class="flex-[1.5] text-xl text-right dark:text-white">
            {{ post.title }}
        </p>
    </a>
</template>