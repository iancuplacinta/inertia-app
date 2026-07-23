<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post('/login');
};
</script>

<template>
    <Head title="Login" />

    <main class="grid place-items-center min-h-screen bg-gray-50">
        <section class="mx-auto mt-8 w-sm rounded-xl border bg-white p-8">
            <h1 class="font-serif text-3xl font-bold mb-6">Login</h1>

            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label
                        for="email"
                        class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                    >
                        Email
                    </label>

                    <input
                        v-model="form.email"
                        type="email"
                        class="w-full border rounded-lg p-2"
                        id="email"
                        name="email"
                    />
                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                        class="mt-1 text-sm text-red-500"
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                    >
                        Password
                    </label>

                    <input
                        v-model="form.password"
                        type="password"
                        class="w-full border rounded-lg p-2"
                        id="password"
                        name="password"
                    />
                    <div
                        v-if="form.errors.password"
                        v-text="form.errors.password"
                        class="mt-1 text-sm text-red-500"
                    />
                </div>

                <div>
                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="cursor-pointer rounded-full bg-purple-500 px-8 py-2 text-white hover:bg-purple-600 disabled:bg-purple-200"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>
