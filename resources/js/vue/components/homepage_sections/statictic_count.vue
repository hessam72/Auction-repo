<template>
    <!-- start count stats -->

    <section
        id="counter-stats"
        class="wow fadeInRight"
        data-wow-duration="1.4s"
    >
        <div class="container">
            <div class="row flex gap-10">
                <div class="col-lg-3 stats">
                    <ion-icon class="fa" name="pulse"></ion-icon>
                    <div class="counting" :data-count="statistics.live_count">
                        0
                    </div>
                    <h5>Live Auctions</h5>
                </div>

                <div class="col-lg-3 stats">
                    <ion-icon class="fa" name="stopwatch"></ion-icon>
                    <div
                        class="counting"
                        :data-count="statistics.starting_soon_count"
                    >
                        0
                    </div>
                    <h5>Upcomming Auctions</h5>
                </div>

                <div class="col-lg-3 stats">
                    <ion-icon class="fa" name="trophy"></ion-icon>
                    <div class="counting" :data-count="statistics.win_count">
                        0
                    </div>
                    <h5>Total Wins</h5>
                </div>

                <div class="col-lg-3 stats">
                    <ion-icon class="fa" name="cart"></ion-icon>
                    <div
                        class="counting"
                        :data-count="statistics.product_count"
                    >
                        0
                    </div>
                    <h5>Products</h5>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <!-- end cont stats -->
</template>
<script>
export default {
    props: ["statistics"],
    methods: {
        runCounter() {
            $(".counting").each(function () {
                var $this = $(this),
                    countTo = $this.attr("data-count");

                $({ countNum: $this.text() }).animate(
                    {
                        countNum: countTo,
                    },

                    {
                        duration: 5000,
                        easing: "linear",
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                            //alert('finished');
                        },
                    }
                );
            });
        },
    },
    watch: {
        statistics(val) {
            setTimeout(() => {
                this.runCounter();
            }, 700);
        },
    },
    mounted() {},
};
</script>
<style lang="scss" scoped>
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css);

/*/ start count stats /*/

section#counter-stats {
    display: flex;
    justify-content: center;
    margin: 6rem;
}

.stats {
    text-align: center;
    font-size: 0.9rem;
    font-weight: 400;
}

.stats .fa {
    color: #48357b;
    font-size: 4rem;
}
.row {
    font-size: 1rem;
    justify-content: space-around;
    width: 65%;
    margin: auto;
}
.counting {
    font-size: 1.4rem;
    font-weight: 600;
    color: #392964;
}
/*/ end count stats /*/
</style>
