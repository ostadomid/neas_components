<script setup>
import { useField } from 'vee-validate';
import { ref, onMounted } from 'vue';
const props = defineProps({
    name: { type: String, required: true },
    modelValue: { type: String, required: false },
});
const input = ref(null);
const { value, handleBlur } = useField(() => props.name, undefined, { syncVModel: true })
onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
<template>
    <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="value" @blur="handleBlur" ref="input" />
</template>
