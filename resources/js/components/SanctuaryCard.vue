<template>
    <div class="sanctuary-card">
        <header :style="`background-image: url(${image})`" />

        <article class="p-4 relative">
            <span v-if="this.data.vegan" class="vegan" title="Vegan" />

            <p class="font-bold">
                {{ this.data.name }}
            </p>
            <p class="mt-2 text-green-700 text-sm">
                {{ this.data.town }}
            </p>
            <p class="mt-2 leading-tight tracking-tight">
                {{ this.data.description }}
            </p>
        </article>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        computed: {
            image() {
                return 'https://placeimg.com/300/100/animals' + '?' + Math.random();
            }
        }
    }
</script>
