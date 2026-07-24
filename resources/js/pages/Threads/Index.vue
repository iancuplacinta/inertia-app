<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    threads: Array,
})
</script>

<template>
    <Head title="Threads" />
    <h1 class="font-serif text-3xl font-bold">Blog</h1>

    <div>
        <article v-for="thread in threads" :key="thread.id" class="mb-8">
            <header>
                <h1 class="font-bold text-lg">{{ thread.title }}</h1>
                <p class="text-xs">By {{ thread.author.name }}</p>
            </header>

            <div class="mt-3">{{ thread.body }}</div>
        </article>
    </div>
</template>
