<template>
    <label :for="name" class="flex items-center cursor-pointer">
        <div class="relative">
            <input
                :id="name"
                type="checkbox"
                class="hidden"
                v-model="state"
                @change="$emit('input', state)"
            />

            <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
            <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
        </div>

        <div class="ml-3 text-gray-700 font-medium">
            {{ label }}
        </div>
    </label>
</template>

<script>
    export default {
        props: [
            'name',
            'label'
        ],

        data() {
            return {
                state: false,
            }
        }
    }
</script>
