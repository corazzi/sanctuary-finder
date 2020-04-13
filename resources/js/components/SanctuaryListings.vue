<template>
    <section class="container sanctuaries-listings">
        <h3 class="font-bold text-2xl ml-3 mb-5">
            {{ title }}
        </h3>

        <div class="filters container px-3 py-2">
            <div class="bg-gray-200 rounded-lg p-6">
                <div class="flex items-center">
                    <div class="w-full md:w-1/3">
                        <label
                            for="radius"
                            class="block font-bold mb-2"
                        >Distance from postcode</label>

                        <div class="flex items-baseline">
                            <select v-model="models.radius" class="w-2/3">
                                <option value="5">Within 5 kilometers</option>
                                <option value="10">Within 10 kilometers</option>
                                <option value="25">Within 25 kilometers</option>
                                <option value="50">Within 50 kilometers</option>
                                <option value="75">Within 75 kilometers</option>
                                <option value="100">Within 100 kilometers</option>
                                <option value="250">Within 250 kilometers</option>
                                <option value="500">Within 500 kilometers</option>
                            </select>

                            <span class="ml-2">of</span>

                            <input
                                type="text"
                                v-model="models.postcode"
                                class="rounded-lg py-1 px-2 w-1/3 ml-2"
                                placeholder="postcode"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <div class="w-full md:w-1/3">
                        <RadioToggle
                            name="vegan"
                            label="Vegan Sanctuaries"
                            @input="(value) => models.vegan = value"
                        />
                    </div>
                </div>

                <div class="flex items-center mt-8">
                    <button role="button" @click="fetch">Filter</button>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-start" v-if="!loading">
            <SanctuaryCard
                v-for="sanctuary in sanctuaries"
                :key="sanctuary.id"
                :data="sanctuary"
            />
        </div>

        <div class="flex flex-wrap justify-center text-2xl py-32" v-if="loading || sanctuaries.length === 0">
            <span v-if="loading">
                Loading...
            </span>

            <span v-if="sanctuaries.length === 0 && !loading">
                No results 😿
            </span>
        </div>
    </section>
</template>

<script>
    import axios from 'axios';
    import RadioToggle from './RadioToggle';
    import SanctuaryCard from './SanctuaryCard';

    export default {
        props: [
            'title',
            'initialSanctuaries'
        ],

        data() {
            return {
                page: 1,
                sanctuaries: [],
                loading: false,
                models: {
                    postcode: '',
                    radius: 50,
                    vegan: false,
                }
            }
        },

        mounted() {
            this.sanctuaries = this.initialSanctuaries;

            if (typeof this.initialSanctuaries.data !== 'undefined') {
                this.sanctuaries = this.initialSanctuaries.data;
            }
        },

        methods: {
            fetch() {
                this.loading = true;

                axios.get('/api/sanctuaries', {
                    params: {
                        page: this.page,
                        q: this.models.postcode,
                        radius: this.models.radius,
                        vegan: this.models.vegan,
                    }
                }).then(response => {
                    this.sanctuaries = response.data.data;

                    this.loading = false;
                });
            }
        },

        components: {
            RadioToggle,
            SanctuaryCard
        },

        watch: {
            'models': {
                handler: function () {
                    // this.fetch();
                },

                deep: true,
            }
        }
    }
</script>
