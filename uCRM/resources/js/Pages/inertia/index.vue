<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    blogs: Array,
});
</script>

<template>
    <div v-if="$page.props.flash.message">
        {{ $page.props.flash.message }}
    </div>
    <ul>
        <li v-for="blog in blogs" :key="blog.id">
          件名：<Link :href="route('inertia.show', { id: blog.id })">{{ blog.title }}</Link>,<br />
          本文：{{ blog.content }}
        </li>
    </ul>
    テストです
</template>
