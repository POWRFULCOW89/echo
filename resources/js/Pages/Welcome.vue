<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome"/>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    </head>



    <nav class="bg-blue py-6 relative">

        <div class="container mx-auto flex">
            <div class="flex flex-grow font-kalam">

                <a href="" class="text-white  text-2xl">((( Echo )))</a>
            </div>

            <div class="flex justify-end flex-grow">
                <div>
                    <a href="" class="text-white lg:mr-10 font-poppins">Our Mission</a>
                    <a href="" class="text-white lg:mr-10 font-poppins">Membership</a>
                    <a href="" class="text-white lg:mr-10 font-poppins">Create</a>
                    <a href="" class="btn bg-gray-900 text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins">Get started</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative">
        <img src="/images/home.png" alt="Background Image" class="w-full h-full object-cover">
        <div class="absolute inset-0">
            <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-20 lg:px-10 lg:text-left ">
                <h1 class="text-6xl sm:text-6xl font-poppins text-white">Let your voice<a class="font-bold"> be heard</a></h1><br/>
                <p class="py-4 text-4xl sm:text-4xl font-poppins text-white">Share your story with the <br/>world, anytime.</p><br/>
                <a href="" class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins text-2xl">Begin exploring</a><br/>
            </div>
        </div>


        <div class="mx-auto text-center lg:mx-0 lg:flex-auto lg:py-5 lg:px-10 lg:text-left">
            <p class="py-4 text-2xl sm:text-2xl font-poppins font-poppins">What people are saying</p><br/>

            <div class="flex flex-col space-y-4 grid grid-flow-row auto-rows-max">
                <div class="flex flex-wrap bg-left-top">
                    <div class="max-w-xs px-4 rounded-lg">
                        <img src="../images/article.png" class="shadow rounded max-w-full h-auto align-middle border-none" />
                    </div>
                    <div class="py-4 text-2xl sm:text-2xl font-poppins font-poppins">
                        <p class="mt-4">An amazing story, with a large title</p>
                        <div class="flex flex-wrap bg-left-top">
                            <img src="../images/aang.png" class="shadow rounded-full max-w-full h-auto align-middle border-none mt-7" />
                            <div class="flex justify-end flex-grow ml-5 mt-7 text-xl">
                                <p class="lg:mr-10">Aang</p>
                                <p class="lg:mr-10">Adventure</p>
                                <p class="lg:mr-10">1 min</p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="flex flex-wrap bg-left-top">
                    <div class="max-w-xs px-4 rounded-lg">
                        <img src="../images/article.png" class="shadow rounded max-w-full h-auto align-middle border-none" />
                    </div>
                    <div class="py-4 text-2xl sm:text-2xl font-poppins font-poppins">
                        <p>An amazing story, with a large title</p>
                        <img src="../images/aang.png" class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                    </div>
                </div>
                <div class="flex flex-wrap bg-left-top">
                    <div class="max-w-xs px-4 rounded-lg">
                        <img src="../images/article.png" class="shadow rounded max-w-full h-auto align-middle border-none" />
                    </div>
                    <div class="py-4 text-2xl sm:text-2xl font-poppins font-poppins">
                        <p>An amazing story, with a large title</p>
                        <img src="../images/aang.png" class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                    </div>
                </div>
            </div>

        </div>
    </main>


    <footer class="bg-grayf py-6 relative">
        <div class="container mx-auto flex">
            <div class="flex flex-grow">
                <a href="" class="text-white font-kalam text-2xl">((( Echo )))</a>
            </div>

            <div class="flex justify-between flex-grow">
                <div>
                    <a class="text-white lg:mr-10 font-kalam text-2xl">Let your voice be heard!</a>
                </div>

                <div>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Terms</a>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Privacy</a>
                    <a href="" class="text-white lg:mr-10 font-poppins underline">Help</a>
                </div>
            </div>
        </div>
    </footer>


</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
