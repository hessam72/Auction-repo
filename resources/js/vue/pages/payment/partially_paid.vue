<template></template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {};
    },
    methods: {},
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken", "user"]),
    },
};
</script>
<style lang="scss" scoped></style>
