<script setup lang="ts">
import { useField } from 'vee-validate'
import DatePicker from 'vue3-persian-datetime-picker';

const props = withDefaults(defineProps<{
    name: string,
    modelValue?: string,
    id: string,
    value?: string,
    type?: string
}>(), { type: 'date' });


const { value, handleBlur, handleChange } = useField(() => props.name, undefined, { syncVModel: true })

</script>
<template>
    <div class="flex items-center">
        <label :for="id"
            class="bg-[#4ed05d] h-[42px] w-14 mt-1 cursor-pointer rounded-s-md flex justify-center items-center">
            <svg v-if="type == 'time'" width="32" height="32" fill="white" viewBox="0 0 256 256">
                <path
                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z">
                </path>
            </svg>
            <svg v-if="type == 'date'" width="32" height="32" fill="white" viewBox="0 0 256 256">
                <path
                    d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-96-88v64a8,8,0,0,1-16,0V132.94l-4.42,2.22a8,8,0,0,1-7.16-14.32l16-8A8,8,0,0,1,112,120Zm59.16,30.45L152,176h16a8,8,0,0,1,0,16H136a8,8,0,0,1-6.4-12.8l28.78-38.37A8,8,0,1,0,145.07,132a8,8,0,1,1-13.85-8A24,24,0,0,1,176,136,23.76,23.76,0,0,1,171.16,150.45Z">
                </path>
            </svg>
        </label>

        <input :id="id" :value="value" readonly
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md rounded-r-none border-r-0 shadow-sm mt-1 block w-full"
            @blur="handleBlur" :style="{ cursor: 'pointer' }" />
    </div>
    <DatePicker :custom-input="`#${id}`" color="#4ed05d" :type="type" ref="dp" :model-value="value"
        @update:model-value="handleChange" />
</template>

<style>
/* These styles are used to align center the arrow buttons in Time & Date  */
.vpd-up-arrow-btn svg,
.vpd-down-arrow-btn svg {
    margin: 0 auto;
}

.vpd-dir-rtl .vpd-next svg,
.vpd-dir-rtl .vpd-prev svg {
    margin: 0 auto;
}

/* End */
</style>