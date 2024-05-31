<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    Nzme: {{ $page.props.auth.user.name }}
    <div>
        <button v-if="$page.props.user.permissions.includes('create roles')">Manage roles</button>
        <button v-if="$page.props.user.permissions.includes('create lessons')">Manage lessons</button>
    </div>
</template>

<style>
    button{
        background: #0099FF;
        padding: 10px;
        margin: 9px;
    }
</style>
