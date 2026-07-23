<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const { active } = defineProps({
    active: Boolean
})
</script>

<template>
    <Link
        class="text-purple-600 hover:underline"
        :class="{ 'font-bold underline': active }"
    >
        <slot />
    </Link>
</template>
