<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import Pagination from '@/shared/Pagination.vue';

const { users, filters } = defineProps({
    users: Object,
    filters: Object,
});

const search = ref(filters.search);

watch(search, (value) => {
    router.get('/users', { search: value }, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    })
});
</script>

<template>
    <Head title="Users" />

    <div class="mb-6 flex justify-between">
        <h1 class="font-serif text-4xl font-bold">Users</h1>

        <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="rounded-lg border px-2"
        />
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
        <table
            class="w-full table-auto border-collapse bg-white text-left text-sm text-gray-500"
        >
            <tbody class="divide-y divide-gray-200 border-t border-gray-200">
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                    class="hover:bg-gray-50"
                >
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ user.name }}
                    </td>
                    <td class="flex justify-end px-6 py-4">
                        <a
                            href="#"
                            class="font-medium text-purple-600 hover:underline"
                            >Edit</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Pagination :links="users.links" class="mt-6" />
</template>
