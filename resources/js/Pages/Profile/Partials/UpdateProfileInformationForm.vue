<template>
    <section>
        <header>
            <h2 class="text-lg font-medium">Profile Information</h2>

            <p class="mt-1 text-sm">
                Update your account's profile information and email address.
            </p>
        </header>

        <v-form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <v-text-field id="name" for="name" label="Nome" type="text" class="mt-1 block w-full" v-model="form.name" required
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <v-text-field id="email" for="email" label="Email" type="email" class="mt-1 block w-full" v-model="form.email" required
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <v-btn type="submit" color="secondary" :disabled="form.processing">Save</v-btn>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm ">Saved.</p>
                </Transition>
            </div>
        </v-form>
    </section>
</template>
<script>
import InputError from '@/Components/InputError.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

export default {
    name: "UpdateProfileInformationForm",
    components: {Link, InputError},
    props: {
        mustVerifyEmail: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },
    data() {
        const user = usePage().props.auth.user;
        return {
            form: useForm({
                name: user.name,
                email: user.email,
            })
        }
    }
}
</script>
