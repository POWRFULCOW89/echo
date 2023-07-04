<template>
    <Head title="Membership" />
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
                    <a href="" class="btn bg-gray-900 text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins">Get
                        started</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="relative">
        <div class="absolute inset-0">
            <div class="bg-black opacity-50 absolute inset-0"></div>
            <div class="absolute inset-0 flex justify-evenly items-center gap-8">
                <section class="flex-1 z-10 p-16">
                    <h1 class="text-white text-6xl">Amplify your <br />voice, <a class="font-bold">inspire the
                            <br />world!</a>
                    </h1>
                    <p class="text-white text-2xl py-8">Subscribe to Echo and unlock a world
                        of captivating <br />content that will broaden your horizons.
                    </p>
                    <a href=""
                        class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 font-poppins text-2xl">Join
                        Echo</a><br />
                </section>

            </div>
        </div>
        <img src="/images/membership.png" alt="Background Image" class="w-full h-full object-cover">
    </main>

    <div class="flex justify-center mt-20">
        <div class="w-1/2 mx-2 space-y-8">
            <h2 class="text-3xl text-center font-bold">B A S I C</h2>
            <p class="text-center text-xl font-semibold">Free</p>
            <p class="text-center text-xl">Browse with ad-supported navigation</p>
            <p class="text-center text-xl">Creation 2 articles per month</p>
            <p class="text-center text-xl">View unlimited articles</p>
        </div>
        <div class="w-px bg-gray-400"></div>
        <div class="w-1/2 mx-2 space-y-8">
            <h2 class="text-3xl text-center font-bold">E C H O +</h2>
            <p class="text-center text-xl font-semibold">$5/mo</p>
            <p class="text-center text-xl">Ad-free browsing</p>
            <p class="text-center text-xl">Unlimited article creation</p>
            <p class="text-center text-xl">Personalized newsletters</p>
        </div>
    </div>


    <div class="flex items-center">
        <p class="w-1/3">Why Echo?</p>
        <div class="w-1/3 flex justify-center">
            <img src="ruta-de-la-imagen" alt="Imagen" class="rounded-full w-24 h-24">
        </div>
        <div class="w-1/3">
            <p class="text-right">I love how Echo empowers me to explore new ideas and connect with a vibrant community of
                like-minded individuals.</p>
            <p class="text-right mt-2">- Albert Einstein</p>
        </div>
    </div>



    <div class="flex justify-center mt-20">
        <div class="w-1/2 mx-2">
            <p class="text-3xl text-center font-bold">Why Echo?<br /><br /></p>
        </div>
        <div class="w-1/2 mx-2">
            <div class="flex flex-wrap bg-left-top">
                <img src="/images/userMembership.jpg" class="shadow rounded-full w-20 h-20 align-middle border-none mt-7" />
                <div class="flex justify-end flex-grow ml-5 mt-7 text-xl">
                    <p class="lg:mr-10">“I love how Echo empowers me to explore new ideas and connect
                        with a vibrant community of like-minded individuals.”
                    <p class="font-bold">- Albert Einstein</p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center h-screen">
        <ul class="text-center space-y-8">
            <li class="text-3xl text-center font-bold ">In addition</li>
            <li class="text-xl">Private communities</li>
            <li class="text-xl">Access to premium expert content</li>
            <li class="text-xl">Blog post downloads</li>
        </ul>
    </div>


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
<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>
