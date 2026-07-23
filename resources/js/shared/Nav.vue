<script setup lang="ts">
import NavLink from '@/shared/NavLink.vue';
</script>

<template>
    <nav>
        <ul class="flex space-x-4 pl-10">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink href="/user-settings" :active="$page.component === 'Settings'">
                    Settings
                </NavLink>
            </li>
            <li>
                <NavLink method="post" href="/logout" class="cursor-pointer">
                    Log Out
                </NavLink>
            </li>
        </ul>
    </nav>
</template>
