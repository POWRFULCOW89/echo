<script setup>
import { defineProps } from 'vue';
import Editor from '@tinymce/tinymce-vue';
import { Head, useForm } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
    post: Object,
    user: Object
});


const form = useForm({
    title: props.post?.title ?? '',
    content: props.post?.content ?? '',
})

const submit = () => {

    if (props.post) {
        form.put(`/posts/${props.post.id}`)
    } else {
        form.post('/posts')
    }
}

</script>

<template>
    <Head title="Editor" />

    <MainLayout :user="user">
        <main class="font-poppins">
            <form @submit.prevent="submit">
                <main class="flex flex-col place-items-center p-8">
                    <label class="text-2xl font-bold my-4">Title</label>
                    <div class="flex justify-evenly w-full">
                        <div />
                        <input class="border border-gray-300 w-1/2  text-center rounded-lg dark:text-black"
                            v-model="form.title" />
                        <button type="submit" class="bg-blue text-white p-2 rounded-lg" :disabled="form.processing">
                            Publish
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4 items-center py-10 text-lg">
                        <div class="col-span-1 grid justify-items-end">
                            <p>Tags</p>
                        </div>
                        <div class="col-span-1">
                            <input type="text" class="border border-gray-300 rounded-lg dark:text-black"
                                placeholder="Input 1">
                        </div>
                        <div class="col-span-1 grid justify-items-end">
                            <p>Background Image</p>
                        </div>
                        <div class="col-span-1 text-xs">
                            <p class="border border-gray-300 rounded-lg p-2">
                                <input type="file" id="fileInput" style="display: none;">
                                <button type="button" class="bg-blue text-white px-3 py-1 rounded-lg"
                                    onclick="document.getElementById('fileInput').click()">Browse</button>
                            </p>
                        </div>
                    </div>

                    <div class="w-3/4 p-4">
                        <Editor v-model="form.content" api-key="no-api-key" :init="{
                            plugins: 'lists link image table code help wordcount'
                        }" />
                    </div>
                </main>
            </form>
        </main>

    </MainLayout>
</template>
