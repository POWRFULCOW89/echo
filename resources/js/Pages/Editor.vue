<script setup>
import { defineProps, ref } from 'vue';
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
    image_url: props.post?.image_url ?? null,
    tags: props.post?.tags.map(tag => tag.name).join(",") ?? null,
})

const imagePreview = ref(null);

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    // form.image_url = file;

    imagePreview.value = URL.createObjectURL(file);
}

const submit = () => {

    if (form.title.length < 3) {
        alert('Title must be at least 3 characters long')
        return
    }

    if (form.content.length < 3) {
        alert('Content must be at least 3 characters long')
        return
    }

    console.log(form)

    if (props.post) {

        // console.log(form.title, form.content)
        form.put(`/posts/${props.post.id}`, {
            // forceFormData: true,
            // data: {
            //     title: form.title,
            //     content: form.content,
            //     image_url: form.image_url
            // }
        })
    } else {
        form.post('/posts', {
            forceFormData: true,
            data: {
                title: form.title,
                content: form.content,
                image_url: form.image_url,
                tags: form.tags
            }
        })
    }
}

</script>

<template>
    <Head title="Editor" />

    <MainLayout :user="user">
        <main class="font-poppins">
            <!-- <pre>{{ post.tags }}</pre> -->
            <form @submit.prevent="submit">
                <main class="flex flex-col place-items-center p-8">
                    <label class="text-2xl font-bold my-4">Title</label>
                    <div class="flex justify-evenly w-full">
                        <div />
                        <input name="title" class="border border-gray-300 w-1/2  text-center rounded-lg dark:text-black"
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
                            <input type="text" v-model="form.tags" class="border border-gray-300 rounded-lg dark:text-black"
                                placeholder="Tags">
                        </div>
                        <div class="col-span-1 grid justify-items-end">
                            <p>Background Image</p>
                        </div>
                        <div class="col-span-1 text-xs">
                            <div class="border border-gray-300 rounded-lg p-2 flex gap-3 items-center">
                                <input type="file" id="fileInput" style="display: none;"
                                    @input="form.image_url = $event.target.files[0]" @change="handleImageUpload"
                                    accept="image/*">
                                <button type="button" class="bg-blue text-white px-3 py-1 rounded-lg"
                                    onclick="document.getElementById('fileInput').click()">Browse</button>
                                <p v-if="form?.image_url?.name">{{ form?.image_url?.name }}</p>
                                <p v-else-if="form?.image_url">{{ form?.image_url?.split("/").pop() }}</p>
                            </div>
                        </div>
                    </div>

                    <div v-if="post?.image_url || imagePreview" class="flex justify-center items-center h-48 my-8">
                        <div class="flex flex-1 justify-center items-center gap-5 " v-if="post?.image_url">
                            <p class="text-right">Uploaded image:</p>
                            <img class="flex-1 w-48" :src="post?.image_url" alt="image">
                        </div>
                        <div class="flex flex-1 justify-center items-center gap-5 " v-if="imagePreview">
                            <img class="flex-1 w-48" :src="imagePreview" alt="image">
                            <p>Image preview</p>
                        </div>
                    </div>


                    <div class="w-3/4 p-4">
                        <input type="hidden" name="content" v-model="form.content">
                        <Editor v-model="form.content" api-key="no-api-key" :init="{
                            plugins: 'lists link image table code help wordcount'
                        }" />
                    </div>
                </main>
            </form>
        </main>

    </MainLayout>
</template>
