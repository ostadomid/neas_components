<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
import { useField } from "vee-validate";
const props = defineProps({
    name: { type: String, required: true },
    items: { type: Array, required: true },
    modelValue: { type: Object }
})
const { value } = useField(() => props.name, undefined, { syncVModel: true })
</script>

<template>
    <select v-model="value"
        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option v-for="item in items" :value="item['value']" :key="item['value']">{{ item['title'] }}</option>
    </select>
</template>