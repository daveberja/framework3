<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <!-- Apply steins-bg class to enable the Steins;Gate picture background for the whole page -->
    <div class="steins-bg flex min-h-screen flex-col items-center pt-6 sm:justify-center sm:pt-0">
        <div>
            <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div class="mt-6 w-full overflow-hidden bg-black bg-opacity-70 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg steins-box">
            <slot />
        </div>
    </div>
</template>
