<script setup>
import { defineProps } from 'vue';
import Editor from '@tinymce/tinymce-vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    post: Object,
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
    <form @submit.prevent="submit">
        <main class="flex flex-col place-items-center p-8">
            <div class="flex justify-evenly w-full">
                <div />
                <input class="border border-gray-500 w-1/2  text-center rounded-lg" v-model="form.title" />
                <button type="submit" class="bg-blue text-white p-3 rounded" :disabled="form.processing">
                    Publish
                </button>
            </div>

            <div class="w-3/4 p-4">
                <Editor v-model="form.content" api-key="no-api-key" :init="{
                    plugins: 'lists link image table code help wordcount'
                }" />
            </div>
        </main>
    </form>
</template>