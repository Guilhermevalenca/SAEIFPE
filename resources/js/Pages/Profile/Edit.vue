<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <Default>
        <v-card>
            <v-card-title class="d-flex justify-center">
                <div>Profile</div>
            </v-card-title>
            <v-card-text>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                        <v-card variant="outlined">
                            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                                <UpdateProfileInformationForm
                                    :must-verify-email="mustVerifyEmail"
                                    :status="status"
                                    class="max-w-xl"
                                />
                            </div>
                        </v-card>

                        <v-card variant="outlined">
                            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                                <UpdatePasswordForm class="max-w-xl" />
                            </div>
                        </v-card>

                        <v-card variant="outlined">
                            <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                                <DeleteUserForm class="max-w-xl" />
                            </div>
                        </v-card>
                    </div>
                </div>

            </v-card-text>
        </v-card>
    </Default>
</template>
