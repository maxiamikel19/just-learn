<script>
    export default {
        name: 'CategoriesIndex'
    }
</script>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import {Link } from '@inertiajs/vue3'
    import {Inertia} from '@inertiajs/inertia'

    defineProps({
        categories: {
            type: Object,
            required: true
        }
    })

    const deleteCategory = id =>{
        if(confirm('Are you sure to delete this category?')){
            Inertia.delete(route('categories.destroy', id))
        }
    }
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl leading-tight text-gray-800">Categories</h1>
        </template>

        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create categories')">
                        <Link :href="route('categories.create')" class="bg-indigo-600 p-3 rounded hover:bg-indigo-700 text-white uppercase text-sm">Create new Category</Link>
                    </div>
                
                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <div class="w-full flex">
                                <p class="text-indigo-800 uppercase mr-5 p-3 text-center text-sm">ID</p>
                                <p class="text-indigo-800 uppercase mr-5 p-3 text-center text-sm">Name</p>
                            </div>
                            <li class="flex justify-between gap-x-6 py-5" v-for="category in categories.data" :key="category.id">
                                <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex">
                                    <span class="mx-4">{{ category.id }}</span>
                                    <p class="text-lg font-semibold leading-6 text-gray-900">{{ category.name }}</p>
                                </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-md leading-6 text-gray-900" >
                                        <Link :href="route('categories.edit', category.id)"  class="text-sm mx-3 bg-indigo-500 p-2 rounded-lg hover:bg-indigo-800 text-white" v-if="$page.props.user.permissions.includes('update categories')"> Editar</Link> 
                                        <Link @click="deleteCategory(category.id)" class="text-sm mx-3 bg-red-500 p-2 rounded-lg hover:bg-indigo-800 text-white" v-if="$page.props.user.permissions.includes('delete categories')">Deletar</Link> 
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-4">
                        <Link v-if="categories.current_page > 1" :href="categories.prev_page_url" class="p-3 rounded hover:text-blue-500 text-gray-900 uppercase text-sm"> prev</Link>
                        <div v-else></div>
                        <Link v-if="categories.current_page < categories.last_page" :href="categories.next_page_url" class="p-3 rounded hover:text-blue-500 text-gray-900 uppercase text-sm">next</Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>