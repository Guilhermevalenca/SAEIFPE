<template>
    <Head title="Profile" />

    <Default>
        <v-card variant="text">
            <v-card-title class="d-flex justify-center">
                <div>Perfil</div>
            </v-card-title>
            <v-card-text>

                <div class="py-5">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                        <v-container class="d-flex justify-center">
                            <v-card variant="flat" class="w-50">

                              <div class="p-4 sm:p-8 shadow sm:rounded-lg default-card-border">

                                <AddProfile />

                              </div>

                            </v-card>
                        </v-container>

                        <v-container class="d-flex justify-center">

                            <v-card variant="flat" class="w-50">
                                <div class="p-4 sm:p-8 shadow sm:rounded-lg default-card-border">
                                    <UpdateProfileInformationForm
                                        :must-verify-email="mustVerifyEmail"
                                        :status="status"
                                        class="max-w-xl"
                                    />
                                </div>
                            </v-card>

                        </v-container>

                        <v-container class="d-flex justify-center">

                            <v-card variant="flat" class="w-50">
                                <div class="p-4 sm:p-8 shadow sm:rounded-lg default-card-border">
                                    <UpdatePasswordForm class="max-w-xl" />
                                </div>
                            </v-card>

                        </v-container>

                        <v-container class="d-flex justify-center">

                            <v-card variant="flat" class="w-50">
                                <div class="p-4 sm:p-8 shadow sm:rounded-lg default-card-border">
                                    <DeleteUserForm class="max-w-xl" />
                                </div>
                            </v-card>

                        </v-container>
                    </div>
                </div>

            </v-card-text>
        </v-card>
    </Default>
</template>

<script>
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";
import AddProfile from "@/Pages/Profile/Partials/AddProfile.vue";

export default {
    name: 'Edit',
    components: {AddProfile, Default, DeleteUserForm, UpdatePasswordForm, UpdateProfileInformationForm, Head},
    props: {
        mustVerifyEmail: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    }
}
</script>
