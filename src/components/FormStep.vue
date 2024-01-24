<script setup lang="ts">
import { inject, type Ref } from 'vue';
const myIndex = (inject('STEP_COUNTER') as Ref<number>).value++;
const currentStep = (inject('CURRENT_STEP') as Ref<number>);

</script>

<template>
    <Transition name="fade">
        <section class="step" v-if="myIndex === currentStep">
            <slot />
        </section>
    </Transition>
</template>

<style scoped>
.fade-enter-from {
    transform: translateX(50px);
    opacity: 0;
}

.fade-leave-to {
    transform: translateX(-50px);
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: all var(--multi-step-duration) var(--easing);
}

.fade-leave-active {
    top: 0;
    position: absolute;
}
</style>