<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import getTimeAgo from '@/Utils/getTimeAgo';
import getTimeToRead from '@/Utils/getTimeToRead';
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    post: Object,
    user: Object,
    posts: Array,
    currentUser: Object,
    comments: Array,
});

const localPost = ref(props.post);

const localComments = ref(props.comments.sort((a, b) => {
    return new Date(b.created_at) - new Date(a.created_at);
}));

const comment = ref('');

const submitComment = () => {

    if (comment.value == '') {
        return;
    }

    router.post(route('store-comment', props.post.id), {
        user_id: props.currentUser.id,
        post_id: props.post.id,
        content: comment.value,
        post: props.post,
    }, {
        onSuccess: () => {
            router.visit(route('posts.show', props.post.id));
        }
    });
}

// TODO: Modelo de likes
// const likePost = async () => {
//     try {
//         if (!props.currentUser) return;
//         await axios.post(route("like-post", props.post.id)).then((response) => {
//             localPost.value.likes = localPost.value.likes + 1;
//         })
//     } catch (error) {
//         console.error('Failed to like post:', error);
//     }
// }

// const likeComment = async (commentId) => {
//     try {
//         if (!props.currentUser) return;
//         await axios.post(route("like-comment", [props.post.id, commentId])).then((response) => {
//             localComments.value = localComments.value.map((c) => {
//                 if (c.id === comment.id) {
//                     c.likes = c.likes + 1;
//                 }
//                 return c;
//             });
//         })
//     } catch (error) {
//         console.error('Failed to like comment:', error);
//     }
// }

</script>


<template>
    <Head title="Post" />

    <MainLayout :user="currentUser">
        <section class="relative">
            <div class="absolute inset-0">
                <div class="bg-black opacity-50 absolute inset-0"></div>
                <div class="absolute inset-0 flex justify-evenly items-center gap-8">
                    <section class="flex-1 z-10 p-16">
                        <h1 class="text-white text-5xl text-center">{{ post.title }}</h1>
                        <div class="flex flex-col justify-evenly p-4 text-2xl items-center">
                            <div class="flex items-center flex-wrap bg-left-top">
                                <div class="flex flex-1 justify-between items-center text-xl">
                                    <div class="flex gap-3 items-center">
                                        <img :src="user.profile_photo_url"
                                            class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                                        <div>
                                            <p class="text-white text-lg py-8">{{ user.name }}<br /> <a
                                                    class="text-white text-sm">{{ truncatedDate }}</a></p>

                                        </div>
                                        <a href=""
                                            class="btn bg-blue text-white px-3 py-1 rounded-full hover:bg-gray-400 text-sm mb-8">Follow</a>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between items-center text-xl">
                                    <div class="flex gap-5 items-center">
                                        <div @click="likePost"
                                            class="flex gap-3 items-center pl-8 text-white hover:text-blue hover:cursor-pointer">
                                            <font-awesome-icon :icon="['fas', 'heart']" class="" />
                                            <p class=" text-lg">{{ post.likes }}</p>
                                        </div>
                                        <div class="flex gap-3 items-center">
                                            <font-awesome-icon :icon="['fas', 'star']" class="text-white" />
                                            <p class="text-white text-lg">{{ post.views }}</p>
                                        </div>
                                        <div class="flex gap-3 items-center">
                                            <font-awesome-icon :icon="['fas', 'comment']" class="text-white" />
                                            <p class="text-white text-lg">{{ post.comments }}0</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm text-white mt-1">{{ getTimeToRead(post.content) }} minute read</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                </div>
            </div>
            <img src="/images/articlePost.png" alt="Membership Image" class="w-full h-full object-cover">
        </section>

        <div class="flex-1 p-16 mx-28">


            <div v-html="post.content" class="mx-auto prose dark:prose-headings:text-gray-100 dark:prose-p:text-gray-100">
            </div>


            <div class="flex gap-5 my-20">
                <div class="flex gap-3"><font-awesome-icon :icon="['fas', 'heart']" />
                    <p>{{ post.likes }}</p>
                </div>
                <div class="flex gap-3"><font-awesome-icon :icon="['fas', 'star']" />
                    <p>{{ post.views }}</p>
                </div>
                <div class="flex gap-3"><font-awesome-icon :icon="['fas', 'comment']" />
                    <p>{{ post.comments }}0</p>
                </div>
            </div>
            <div class="rounded-full shadow-2xl p-4">
                <div class="flex justify-between items-center mx-20 my-8">
                    <div class="flex gap-3 items-center">
                        <img :src="user.profile_photo_url"
                            class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                        <p class="text-2xl py-8">{{ user.name }}</p>
                    </div>
                    <div class="ml-auto">
                        <a href=""
                            class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 text-xl">Follow</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-10 mx-auto w-2/3">
            <h3 class="text-2xl">Comments</h3>

            <div v-if="!!user" class="flex flex-col w-1/2 mx-auto gap-5 my-8 justify-center items-center">
                <textarea v-model="comment" type="text" placeholder="Add a comment"
                    class="w-full border-2 border-gray-300 rounded-lg p-2 dark:text-black"></textarea>
                <button @click="submitComment"
                    class="self-end bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 text-xl">Post</button>
            </div>

            <p v-else>Please
                <Link href="/login">log in</Link> to leave a comment
            </p>

            <ul class="w-1/2 mx-auto">
                <li v-for="comment in localComments" :key="comment.id" class="mt-5">
                    <div class="flex gap-5 items-center">
                        <img :src="comment.user.profile_photo_url"
                            class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                        <p class="text-2xl py-8">{{ comment.user.name }}</p>
                    </div>
                    <p>{{ comment.content }}</p>
                    <div @click="likeComment(comment.id)"
                        class="flex justify-start items-center gap-5 mt-3 hover:text-blue hover:cursor-pointer">
                        <font-awesome-icon :icon="['fas', 'heart']" />
                        <p>{{ comment.likes }}</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-5 lg:px-10 lg:text-left">
            <p class="py-4 text-2xl sm:text-2xl font-poppins ">More by amazing people</p><br />

            <div class="grid justify-center space-y-4 ">

                <a :href="`/posts/${post.id}`" v-for="post in posts" :key="post.id">
                    <div class="flex flex-wrap bg-left-top">
                        <!-- <p>{{ post?.tags?.[0].name }}</p> -->
                        <div class="max-w-xs px-4 rounded-lg">

                            <img :src="post.image_url" class="shadow rounded max-w-full h-auto align-middle border-none" />
                        </div>

                        <div class="flex flex-col justify-evenly p-4 text-2xl  font-poppins">
                            <p class="mt-4">{{ post.title }}</p>
                            <div class="flex items-center flex-wrap bg-left-top">
                                <div class="flex flex-1 justify-between items-center text-xl">
                                    <div class="flex gap-3 items-center">
                                        <img :src="post.user.profile_photo_url"
                                            class=" shadow rounded-full max-w-full h-auto align-middle border-none" />
                                        <div>
                                            <p class="text-lg">{{ post.user.name }}</p>
                                            <p class="text-base text-gray-500">{{ getTimeAgo(post.created_at) }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm" v-if="post.tags && post.tags.length > 0">{{ post.tags[0].name }}</p>
                                    <p class="text-sm">{{ getTimeToRead(post.content) }} min</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </MainLayout>
</template>

<script>
export default {
    computed: {
        truncatedDate() {
            return this.post.created_at.slice(0, 10);
        }
    },
}
</script>
