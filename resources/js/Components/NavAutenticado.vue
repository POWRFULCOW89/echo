<template>
    <nav class="bg-blue py-6 relative">
        <div class="container mx-auto flex">
            <div class="flex flex-grow font-kalam">
                <a href="/feed" class="text-white text-2xl">((( Echo )))</a>
            </div>
            <div class="flex items-center justify-end flex-grow font-poppins text-white">
                <div class="flex items-center justify-end flex-grow font-poppins text-white">
                    <div class="flex items-center rounded-full bg-sky-300 mr-10 w-60 h-8 px-3 font-poppins">
                        <font-awesome-icon :icon="['fas', 'magnifying-glass']" style="color: #ffffff;" />
                        <input type="text" class="flex-1 bg-transparent border-none focus:outline-none" placeholder="Search" />
                    </div>
                </div>
                <a href="" class="lg:mr-10">Create</a>
                <img src="/images/userMembership.jpg" alt="User Image" class="shadow rounded-full w-10 h-10 border-none" />
            </div>
        </div>
    </nav>
</template>

<script setup>
</script>

<style>
input::placeholder {
    color: white;
}
</style>
