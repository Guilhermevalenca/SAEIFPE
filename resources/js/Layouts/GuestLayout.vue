<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <v-card variant="outlined" class="w-full sm:max-w-md mt-6 px-6 shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </v-card>
    </div>
</template>
