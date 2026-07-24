<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    user: Object,
})
</script>

<template>
   <div class="border-b border-gray-100">
       <Link href="/users" class="text-purple-600 hover:underline">Back</Link>
   </div>

    <div class="mt-4">
        <h1 class="text-2xl font-bold">{{ user.data.name}}</h1>
        <div class="mt-2">{{ user.data.email }}</div>
        <div class="mt-2">Registered: {{ user.data.created_at }}</div>
    </div>
</template>
