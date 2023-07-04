<script>
    import {defineComponent} from "vue";
    import Nav from "@/Components/Nav.vue";
    import Footer from "@/Components/Footer.vue";

    export default defineComponent({
        components: {Footer, Nav}
    })

</script>

<template>
    <div>
        <Nav/>
    </div>

    <main class="relative">
        <div class="absolute inset-0">
            <div class="bg-black opacity-50 absolute inset-0"></div>
            <div class="absolute inset-0 flex justify-evenly items-center gap-8">
                <section class="flex-1 z-10 p-16">
                    <h1 class="text-white text-6xl">Bringing creators and readers <p class="font-bold">closer together</p>
                    </h1>
                    <p class="text-white text-2xl py-8">In a bustling interconnected world, a team of visionary individuals
                        recognized the
                        need to
                        connect writers
                        and readers on a deeper level.
                        <br /> <br />
                        With each line of code and every meticulously crafted feature, the
                        team
                        embraced the vibrant energy of youth, harmonizing the best of both worlds to bring writers and
                        readers
                        closer together on Echo.com.
                    </p>
                </section>
                <aside class="flex-1 z-10 p-16">
                    <h2 class="text-white text-3xl text-center mb-8">Our amazing team ✨</h2>
                    <div class="flex flex-col flex-1 gap-8">
                        <div class="flex flex-col justify-center items-center gap-4">
                            <h3 class="text-white text-xl">Jemima Alamilla</h3>
                            <img class="rounded-full w-1/3"
                                src="https://simulacionymedicina.es/wp-content/uploads/2015/11/default-avatar-300x300-1.jpg"
                                alt="Team member" />
                            <p class="text-white">Software developer</p>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-4">
                            <h3 class="text-white text-xl">Diego Melo</h3>
                            <img class="rounded-full w-1/3"
                                src="https://simulacionymedicina.es/wp-content/uploads/2015/11/default-avatar-300x300-1.jpg"
                                alt="Team member" />
                            <p class="text-white">Software developer</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <img src="/images/coworking.jpg" alt="Background Image" class="w-full h-full object-cover">
    </main>

    <div>
        <Footer/>
    </div>
</template>
