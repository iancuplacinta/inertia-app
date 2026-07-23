<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Nav from '@/shared/Nav.vue';

const page = usePage();

const username = computed(() => page.props.auth.username);
</script>

<template>
    <Head title="Inertia App" />
    <section class="bg-gray-200 p-6">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="text-2xl">My App</h1>

                <p class="ml-4 text-sm">Welcome back, {{ username }}!</p>
            </div>

            <Nav />
        </header>
    </section>

    <section class="p-6">
        <div class="m-auto max-w-3xl">
            <slot />
        </div>
    </section>
</template>
