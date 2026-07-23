<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
});

const submit = () => {
    form.post('/users');
};
</script>

<template>
    <Head title="Create User" />

    <h1 class="font-serif text-4xl font-bold">Create New User</h1>

    <form @submit.prevent="submit" class="mx-auto mt-8 max-w-md">
        <div class="mb-6">
            <label
                for="name"
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
            >
                Name
            </label>

            <input
                v-model="form.name"
                type="text"
                class="w-full border border-gray-400 p-2"
                id="name"
                name="name"
            />
            <div
                v-if="form.errors.name"
                v-text="form.errors.name"
                class="mt-1 text-sm text-red-500"
            />
        </div>

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
                class="w-full border border-gray-400 p-2"
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
                class="w-full border border-gray-400 p-2"
                id="password"
                name="password"
            />
            <div
                v-if="form.errors.password"
                v-text="form.errors.password"
                class="mt-1 text-sm text-red-500"
            />
        </div>

        <div class="mb-6">
            <button
                :disabled="form.processing"
                type="submit"
                class="cursor-pointer rounded bg-purple-500 px-4 py-2 text-white hover:bg-purple-600 disabled:bg-purple-200"
            >
                Submit
            </button>
        </div>
    </form>
</template>
