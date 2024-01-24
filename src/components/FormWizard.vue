<!-- eslint-disable @typescript-eslint/no-unused-vars -->
<script setup>
import {computed} from 'vue'
import {useMultiStep} from '@/Composables/useMultiStep';
import {useForm} from 'vee-validate'

const props = defineProps({
    initialValues: {type: Object},
    validationSchema: {type: Array, required: true},
    backText: {type: String, default: 'قبلی'},
    nextText: {type: String, default: 'بعدی'},
    finalText: {type: String, default: 'ذخیره'},
});
const emit = defineEmits(['submit'])
const {goBackward, goForward, currentStep, hasPrev, isLastStep, stepsContainerStyles} = useMultiStep('section.step');
const currentSchema = computed(() => props.validationSchema[currentStep.value])
const {handleSubmit, values, errors, meta, isSubmitting} = useForm({
    initialValues: props.initialValues,
    validationSchema: currentSchema,
    keepValuesOnUnmount: true
})

const onSubmit = handleSubmit((values, ctx) => {
    console.log('FormWizard is submitting values + ctx to parent')
    if (isLastStep.value) {
        return new Promise(resolve => {
            emit('submit', {values, ctx, resolve})
        })
    }
    goForward();
}, (ctx) => {
    console.log('Validation Errors')
});
</script>

<template>
    <form @submit="onSubmit">
        <div class="multistep-container" :style="stepsContainerStyles">
            <slot/>
        </div>
        <div class="navigation flex justify-end gap-2">
            <button class="rounded-md shadow-sm px-4 py-1 bg-gray-200 hover:bg-gray-400 " @click="goBackward"
                    v-if="hasPrev"
                    type="button" v-text="backText"></button>
            <button
                :class="{ 'rounded-md shadow-sm px-4 py-1': true, 'bg-blue-200 hover:bg-blue-400': !isLastStep, 'bg-green-200 hover:bg-green-400': isLastStep }"
                v-text="meta.pending || isSubmitting ? 'صبر کنید' : isLastStep ? finalText : nextText"></button>
        </div>
    </form>
    <!-- <pre>
        {{ errors }}
    </pre> -->
    <!--    <pre>-->
    <!--        {{ values }}-->
    <!--    </pre>-->
</template>
<style>
:root {
    --multi-step-duration: 0.8s;
    --easing: ease-in-out;
}

.multistep-container {
    position: relative;
    overflow: hidden;
    transition: all var(--multi-step-duration) var(--easing);
}
</style>
