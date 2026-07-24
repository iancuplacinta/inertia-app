<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Highlight from '@/components/Highlight.vue';

const snippet = `
class Example
{
    public function __construct()
    {
        //
    }
}
`.trim()
</script>

<template>
    <Head title="Home" />
    <h1 class="font-serif text-3xl font-bold">Blog</h1>

    <Highlight :code="snippet" />

    <div id="example2">
        <pre>
            <code>
                class Example
                {
                    public function __construct()
                    {
                        //
                    }
                }
            </code>
        </pre>
    </div>
</template>
