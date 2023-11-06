<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<script>
export default {
  name: 'Dashboard'
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <v-card>
            <v-card-title>ola</v-card-title>
            <v-card-text>
                <div>putaria</div>
            </v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>
