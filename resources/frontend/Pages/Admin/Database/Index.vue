<script setup>
import ItemList from './ItemList.vue'
import { defineProps } from "vue"
defineProps(['tables', 'dataTypes'])
</script>

<template>
    <Head title="Dashboard" />

    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Collections
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Table list-->
                        <ItemList :items="tables">
                            <div class="flex justify-between mb-4">
                                <div>Tables</div>
                                <div>
                                    <Link :href="route('admin.database.create')"> Create new table </Link>
                                </div>
                            </div>
                        </ItemList>

                        <div class="w-full mt-10"></div>

                        <!-- DataType list-->
                        <ItemList :items="dataTypes">
                            <div class="flex justify-between mb-4">
                                <div>Data Types</div>
                            </div>
                        </ItemList>
                    </div>
                </div>
            </div>
        </div>
    </Authenticated>
</template>
