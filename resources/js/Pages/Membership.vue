<template>

    <Head title="Membership" />
    <div>
        <Nav/>
    </div>

    <main class="font-poppins">
        <section class="relative">
            <div class="absolute inset-0">
                <div class="bg-black opacity-50 absolute inset-0"></div>
                <div class="absolute inset-0 flex justify-evenly items-center gap-8">
                    <section class="flex-1 z-10 p-16">
                        <h1 class="text-white text-6xl">Amplify your <br />voice, <a class="font-bold">inspire the <br />world!</a>
                        </h1>
                        <p class="text-white text-2xl py-8">Subscribe to Echo and unlock a world
                            of captivating <br />content that will broaden your horizons.
                        </p>
                        <a href="" class="btn bg-blue text-white px-4 py-2 rounded-full hover:bg-gray-400 text-xl">Join Echo</a><br/>
                    </section>

                </div>
            </div>
            <img src="/images/membership.png" alt="Membership Image" class="w-full h-full object-cover">
        </section>

        <div class="flex justify-center my-20">
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

        <section class="relative text-white">
            <div class="absolute inset-0">
                <section>
                    <div class="flex flex-row items-center mx-10 my-28">
                        <div class="basis-1/3">
                            <p class="text-5xl text-center">Why <a class="font-bold">Echo?</a></p>
                        </div>
                        <div class="basis-2/3">
                            <div class="flex-1 flex flex-col">
                                <div class="flex gap-3">
                                    <img src="/images/userMembership.jpg" alt="User Image" class="shadow rounded-full w-20 h-20 align-middle border-none mt-7" />
                                    <div class="ml-5 mt-7 text-xl">
                                        <p class="lg:mr-10">“I love how Echo empowers me to explore new ideas and connect
                                            with a vibrant community of like-minded individuals.”
                                        <a class="font-bold">- Albert Einstein</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <img src="/images/bannerSup.png" alt="Background Image" class="w-full h-full object-cover">
            <img src="/images/bannerInf.png" alt="Background Image" class="w-full h-full object-cover">
        </section>

        <div class="relative">
            <img src="/images/diamond.png" alt="Diamond Image" class="absolute -top-24 right-28 w-50 h-44">
            <div class="flex justify-center items-center my-28 relative">

                <ul class="text-center space-y-8">
                    <li class="text-3xl text-center font-bold">In addition</li>
                    <li class="text-xl"><span class="text-blue">&#x2714;</span> Private communities</li>
                    <li class="text-xl"><span class="text-blue">&#x2714;</span> Access to premium expert content</li>
                    <li class="text-xl"><span class="text-blue">&#x2714;</span> Blog post downloads</li>
                </ul>
            </div>
            <img src="/images/chainsblack.png" alt="Chains Image" class="absolute inset-y-48 left-28 w-40 h-40">
            <div class="flex flex-col items-center my-40">
                <p class="text-center text-6xl">Where words Echo,<br/><br/>minds<a class="font-kalam"> unite</a>!</p>
                <div class="ml-52 -mt-4">
                    <img src="/images/dash.png" alt="Dash Image" class="w-44 mb-20">
                </div>
                <a href="" class="btn bg-gray-900 text-white px-4 py-2 rounded-full font-poppins hover:bg-blue mx-auto">Get started</a>
            </div>
        </div>

    </main>

    <Footer/>

</template>
<script setup>
import {Head, Link} from "@inertiajs/vue3";
import Nav from "@/Components/Nav.vue";
import Footer from "@/Components/Footer.vue";

</script>
