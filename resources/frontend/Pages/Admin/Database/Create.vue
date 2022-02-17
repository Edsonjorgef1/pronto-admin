<script setup>
import { defineProps, ref } from "vue"
defineProps(['db'])

import {FormKitSchema} from '@formkit/vue'
import { Inertia } from '@inertiajs/inertia'
const schema = [
    {
        $cmp: 'FormKit',
        props: {
            type: 'select',
            id: 'drink',
            label: 'Drink',
            placeholder: 'Pick your drink',
            options: {
                coffee: 'Drip coffee',
                espresso: 'Espresso shot',
                tea: 'Tea'
            },
            validation:'required'
        },
    },
    {
        attrs: {
            style: { color: 'red' },
            'data-foo': 'bar'
        },
        $cmp: 'FormKit',
        if: '$get(drink).value',
        props: {
            type: 'radio',
            label: '$: "Drink options (" + $get(drink).value + ")"',
            options: {
                if: '$get(drink).value === coffee',
                then: [
                    'Large',
                    'Medium',
                    'Small'
                ],
                else: {
                    if: '$get(drink).value === espresso',
                    then: [
                        'Single shot',
                        'Double shot',
                    ],
                    else: [
                        'Earl grey',
                        'Matcha',
                        'Green tea',
                        'Jasmine'
                    ]
                }
            }
        }
    }
]
const payload = {
    "name": "expenses",
    "oldName": "New Table",
    "columns": [
        {
            "name": "id",
            "type": {
                "name": "integer",
                "category": "Numbers",
                "default": {
                    "type": "number",
                    "step": "any"
                }
            },
            "default": null,
            "notnull": true,
            "length": null,
            "precision": 10,
            "scale": 0,
            "fixed": false,
            "unsigned": true,
            "autoincrement": true,
            "columnDefinition": null,
            "comment": null,
            "oldName": "id",
            "null": "NO",
            "extra": "auto_increment",
            "composite": false
        },
        {
            "name": "description",
            "oldName": "",
            "type": {
                "name": "text",
                "category": "Strings"
            },
            "length": null,
            "fixed": false,
            "unsigned": false,
            "autoincrement": false,
            "notnull": false,
            "default": null
        },
        {
            "name": "amount",
            "oldName": "",
            "type": {
                "name": "numeric",
                "category": "Numbers",
                "default": {
                    "type": "number",
                    "step": "any"
                }
            },
            "length": "",
            "fixed": false,
            "unsigned": false,
            "autoincrement": false,
            "notnull": false,
            "default": null
        }
    ],
    "indexes": [
        {
            "name": "primary",
            "oldName": "primary",
            "columns": [
                "id"
            ],
            "type": "PRIMARY",
            "isPrimary": true,
            "isUnique": true,
            "isComposite": false,
            "flags": [],
            "options": [],
            "table": "expenses"
        }
    ],
    "primaryKeyName": "primary",
    "foreignKeys": [],
    "options": {
        "create_options": []
    }
}
const createTableSchema = [
    {
        $cmp: 'FormKit',
        props: {
            type: 'text',
            id: 'table-name',
            label: 'Table name',
            value: 'xpto',
        },
        attrs: {
            style: { color: 'red' },
            'data-foo': 'bar'
        },
    },
]

const formData = reactive({
    tableName: '',
})

const submit = () => {
    Inertia.post(route('admin.databases.store'), { ...payload, name: formData.tableName })
}
</script>

<template>
    <Head title="Databases" />

    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a table
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2> Create a table </h2>
                        <FormKitSchema :schema="createTableSchema" :data="formData" />

                        <h2>Order a beverage</h2>
                        <FormKitSchema :schema="schema" :data="{}" />
                    </div>
                </div>

                <div class="mt-12"></div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <pre v-text="JSON.stringify(db, null, 2)"/>
                    </div>
                </div>
            </div>
        </div>
    </Authenticated>
</template>
