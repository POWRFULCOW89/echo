<!-- 
<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template> -->

<template>
    <main class="relative h-full">
        <div class="absolute inset-0">
            <div class="bg-black opacity-70 absolute inset-0"></div>
            <div class="absolute inset-0 ">

                <div class="z-10 bg-white dark:bg-gray-800 left-0 w-1/3 h-full p-8 flex place-items-center flex-col gap-5">
                    <div class="flex flex-col justify-center items-center flex-1 gap-8">
                        <slot name="logo" />

                        <slot />
                    </div>
                </div>
            </div>
        </div>
        <img src="https://media.istockphoto.com/id/1146687079/photo/businesswoman-looking-at-laptop-while-sitting-in-office.jpg?s=612x612&w=0&k=20&c=StwZObQC8watX2X6uxBncYg1lzwG3JK8MafnoIRs_Cc="
            alt="Background Image" class="w-full object-cover h-screen">
    </main>
</template>