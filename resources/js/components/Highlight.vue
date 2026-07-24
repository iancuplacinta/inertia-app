<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useClipboard } from '@/composables/useClipboard';
import { highlightElement } from '@/services/SyntaxHighlighting';

const { code } = defineProps({
    code: String,
});

const block = ref(null);

onMounted(() => {
    highlightElement(block.value);
});

const { copy, copied, supported } = useClipboard()
</script>

<template>
    <div>
        <header v-if="supported"
            class="flex justify-end border-b border-gray-700 bg-gray-800 px-2 py-1 text-xs text-white"
        >
            <button
                class="cursor-pointer rounded px-2 hover:bg-gray-600"
                @click="copy(code)"
            >
                {{ copied ? 'Copied!' : 'Copy' }}
            </button>
        </header>

        <pre><code ref="block">{{ code }}</code></pre>
    </div>
</template>
