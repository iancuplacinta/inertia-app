<script setup>
import { Link } from '@inertiajs/vue3';


const { links } = defineProps({
    links: Array,
});
</script>

<template>
    <div>
        <Component
            v-for="link in links"
            :is="link.url ? Link : 'span'"
            :key="link.url"
            :href="link.url ?? '#'"
            v-html="link.label"
            class="px-1 text-black"
            :class="{ 'text-gray-400': !link.url, 'font-bold': link.active }"
        />
    </div>
</template>
