<template>
    <page-title :title="'Wins & Shipping'"></page-title>

    <div class="w_s-main-container">
        <div class="mb-3">
            <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
            <!--Pills navigation-->
            <ul
                style="border-bottom: 3px solid #666"
                class="mb-5 flex list-none flex-col flex-wrap pl-0 md:flex-row"
                role="tablist"
                data-te-nav-ref
            >
                <li role="presentation">
                    <button
                        type="button"
                        class="tab-btn my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-700 data-[te-nav-active]:!bg-neutral-800 data-[te-nav-active]:text-neutral-50 dark:bg-neutral-500 dark:text-neutral-700 dark:data-[te-nav-active]:!bg-neutral-900 dark:data-[te-nav-active]:text-neutral-50 md:mr-4"
                        id="pills-home-tab04"
                        data-te-toggle="pill"
                        data-te-target="#pills-home04"
                        data-te-nav-active
                        role="tab"
                        aria-controls="pills-home04"
                        aria-selected="true"
                    >
                        Wins
                    </button>
                </li>
                <li role="presentation">
                    <button
                        type="button"
                        class="tab-btn my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-700 data-[te-nav-active]:!bg-neutral-800 data-[te-nav-active]:text-neutral-50 dark:bg-neutral-500 dark:text-neutral-700 dark:data-[te-nav-active]:!bg-neutral-900 dark:data-[te-nav-active]:text-neutral-50 md:mr-4"
                        id="pills-profile-tab04"
                        data-te-toggle="pill"
                        data-te-target="#pills-profile04"
                        role="tab"
                        aria-controls="pills-profile04"
                        aria-selected="true"
                    >
                        Shipping
                    </button>
                </li>
            </ul>

            <!--Pills content-->
            <div class="mb-6">
                <div
                    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="pills-home04"
                    role="tabpanel"
                    aria-labelledby="pills-home-tab04"
                    data-te-tab-active
                >
                    <h2 class="tab-header">Won Products</h2>
                    <!-- wins table -->
                    <wins-table></wins-table>
                </div>
                <div
                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="pills-profile04"
                    role="tabpanel"
                    aria-labelledby="pills-profile-tab04"
                >
                    <h2 class="tab-header">Shiped Products</h2>
                    <!-- shipping table -->
                    <ships-table></ships-table>
                </div>
            </div>
        </div>
    </div>
    <loading :is_loading="is_loading"></loading>
</template>

<script>
import { Datatable } from "tw-elements";
import { Tab, initTE } from "tw-elements";
import { mapGetters, mapActions } from "vuex";
import {
    convertDBTimeToDate,
    merge,
    arrangeData,
} from "@/modules/utilities/convertor.js";
import winsTable from "../../components/user/wins&shipping/wins.vue";
import shipsTable from "../../components/user/wins&shipping/shipping.vue";
export default {
    data() {
        return {
            is_loading: false,
        };
    },
    mounted() {
        initTE({ Tab });

    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken"]),
    },
    methods: {
      
        convertDBTimeToDate,
        merge,
        arrangeData,
    },
    components: {
        winsTable,
        shipsTable,
    },
    created() {},
};
</script>

<style lang="scss" scoped>
.w_s-main-container {
    padding: 3rem 2rem;
}
.tab-btn {
    width: 14rem;
    height: 4rem;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    font-size: 1.3rem;
    letter-spacing: 1px;
    // color: #555;
    bottom: -0.5rem;
    position: relative;
}
#advanced-search-input {
    background-color: #fff;
    border-radius: 15px;
    overflow: clip;
    box-shadow: 0 3px 5px #999;
    width: 100%;
}

#advanced-search-button {
    position: absolute;
    right: 0px;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    height: 100%;
    z-index: 3;
}

#wins_table {
    div {
        border-radius: 15px;
    }
}
.tab-header {
    font-size: 1.5rem;
    font-weight: 500;
    margin: 3rem 0 2rem 0;
}
</style>

<style lang="scss">
.wins-btn {
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px #13a028;
    border: 1px solid #0b5716;

    ion-icon {
        border-radius: 50px;
        width: 2rem;
        height: 2rem;
        color: #13a028;
        padding: 0 0.3rem;
        transition: all 0.3s ease;
    }

    ion-icon:hover {
        background-color: #13a028;
        color: #fff !important;
    }
}

.wins-btn:hover {
    background-color: #13a028;
    color: #fff !important;
}
#shiped_table,
#wins_table {
    div:first-child {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
}
</style>
