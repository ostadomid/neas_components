<script setup lang="ts">
import { useField } from 'vee-validate'
const props = defineProps(
    {
        name: { type: String, required: true },
        checkedValue: { type: [String, Number, Boolean], required: true },
        modelValue: { type: Object }
    }
);
const { checked, handleChange } = useField(() => props.name, undefined, { type: 'checkbox', checkedValue: props.checkedValue, syncVModel: true })

</script>

<template>
    <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" type="checkbox"
        :checked="checked" @change="handleChange">
</template>