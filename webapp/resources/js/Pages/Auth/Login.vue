<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="login-container steins-bg"> <!-- Steins;Gate background styling -->
        <div class="steins-box"> <!-- Styled box with glow effect -->
            <Head title="Log in" />

            <h2 class="text-steins-green text-center mb-6">Login</h2>

            <div v-if="status" class="mb-4 text-sm font-medium text-steins-green">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div class="form-group">
                    <InputLabel for="email" value="Email" class="text-steins-green" />

                    <TextInput
                        id="email"
                        type="email"
                        class="form-control bg-dark text-white mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2 text-steins-green" :message="form.errors.email" />
                </div>

                <div class="form-group mt-4">
                    <InputLabel for="password" value="Password" class="text-steins-green" />

                    <TextInput
                        id="password"
                        type="password"
                        class="form-control bg-dark text-white mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2 text-steins-green" :message="form.errors.password" />
                </div>

                <div class="mt-4 block">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-steins-green">Remember me</span>
                    </label>
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-steins-green rounded-md text-sm underline hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    >
                        Forgot your password?
                    </Link>

                    <button
                        type="submit"
                        class="steins-btn ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Scoped styles for additional tweaks if needed */
</style>
