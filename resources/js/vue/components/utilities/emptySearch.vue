<template>

    <v-empty-state
        image="https://cdn.vuetifyjs.com/docs/images/components/v-empty-state/teamwork.png"
    >
        <template v-slot:title>
            <div class="text-subtitle-2 mt-8">
                No Auction Found
            </div>
        </template>

        <template v-slot:text>
            <div class="text-caption">
                There is no Auction available for your setup
            </div>
        </template>

        <template v-slot:actions>
            <v-btn
            prepend-icon="mdi-eraser"
                class="text-none"
                color="white"
                elevation="1"
                rounded="md"
                size="small"
                text="Clear Filters"
                @click="clear"
            ></v-btn>
        </template>
    </v-empty-state>
</template>

<script>
export default {
   
    data() {
        return {};
    },

    props: {},
    components: {},
    methods: {
        clear() {
            this.emitter.emit("clearFilters");
        },
    },
};
</script>

<style></style>
