<script setup>
import axios from 'axios'
import { useField } from 'vee-validate'
const props = defineProps({
    name: { type: String, required: true },
    radioValue: { type: [String, Number] },
    modelValue: { type: [String, Number] },

})

const { value } = useField(() => props.name, undefined, { type: 'radio', syncVModel: true })
</script>
<template>
    <input type="radio" :value="radioValue" v-model="value" />
</template>