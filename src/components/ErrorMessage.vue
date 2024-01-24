<script setup>
import { useFieldError } from 'vee-validate'
const props = defineProps({
    name: {
        type: String,
        required: true,
    },
});
const errorMessage = useFieldError(() => props.name);

</script>

<template>
    <div>
        <p class="px-2 text-sm text-red-600 min-h-[1.5em] text-left">
            {{ errorMessage }}
        </p>
    </div>
</template>
