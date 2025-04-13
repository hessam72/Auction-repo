<template>

    <v-empty-state
        :image="img"
    >
        <template v-slot:title>
            <div class="text-subtitle-2 mt-8">
                {{header}}
            </div>
        </template>

        <template v-slot:text>
            <div class="text-caption">
                {{ text }}
            </div>
        </template>

       
    </v-empty-state>
</template>

<script>
export default {
   
    data() {
        return {};
    },

    props: {
        header:{

        },
        text:{

        },
        img:{
            default:"https://cdn.vuetifyjs.com/docs/images/components/v-empty-state/teamwork.png"
        }
    },
    components: {},
    methods: {
        
    },
};
</script>

<style></style>
