<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import debounce from "lodash/debounce"
import { onMounted, ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { useCurrentUser } from '@/composables/useCurrentUser';
import Pagination from '@/shared/Pagination.vue';

const { users, filters } = defineProps({
    users: Object,
    filters: Object,
    can: Object,
});

const search = ref(filters.search);

const page = usePage();

watch(search, debounce((value) => {
    router.get(
        '/users',
        { search: value },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        },
    );
}), 500);

onMounted(() => {
    const { user } = useCurrentUser()

    console.log(user)
})
</script>

<template>
    <Head title="Users" />

    <div class="mb-6 flex justify-between">
        <div class="flex items-center">
            <h1 class="font-serif text-4xl font-bold">Users</h1>

            <Link
                v-if="can.createUser"
                href="/users/create"
                class="ml-3 text-purple-600 hover:underline"
                >New User</Link
            >
        </div>

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
                    @click="router.get(`/users/${user.id}`)"
                    :key="user.id"
                    class="hover:bg-gray-50 cursor-pointer"
                >
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ user.name }}
                    </td>
                    <td class="flex justify-end px-6 py-4">
                        <a
                            v-if="user.can.edit"
                            href="#"
                            class="font-medium text-purple-600 hover:underline"
                            >Edit</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Pagination :links="users.meta.links" class="mt-6" />
</template>
