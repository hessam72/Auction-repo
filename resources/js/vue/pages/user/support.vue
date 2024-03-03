<template>
    <div class="support-head">
        <button class="new-btn">New Ticket</button>
    </div>
    <div class="support-main-container flex">
        <div class="tickets-group flex flex-col items-center justify-start">
            <button class="ticket-group-btn">Pending</button>
            <button class="ticket-group-btn">Answered</button>
            <button class="ticket-group-btn">Closed</button>
        </div>
        <div class="tickets-list flex flex-col items-center justify-start">
            <div data-te-offcanvas-toggle data-te-target="#offcanvasRight" aria-controls="offcanvasRight"
                data-te-ripple-init data-te-ripple-color="light" class="ticket-item flex justify-between items-center">
                <p>#1</p>
                <p>How to win?</p>
                <p>i want to do somthing great here and need....</p>
            </div>
            <div data-te-offcanvas-toggle data-te-target="#offcanvasRight" aria-controls="offcanvasRight"
                data-te-ripple-init data-te-ripple-color="light" class="ticket-item flex justify-between items-center">
                <p>#2</p>
                <p>How to win?</p>
                <p>i want to do somthing great here and need....</p>

            </div>
            <div data-te-offcanvas-toggle data-te-target="#offcanvasRight" aria-controls="offcanvasRight"
                data-te-ripple-init data-te-ripple-color="light" class="ticket-item flex justify-between items-center">
                <p>#3</p>
                <p>How to win?</p>
                <p>i want to do somthing great here and need....</p>

            </div>
            <div data-te-offcanvas-toggle data-te-target="#offcanvasRight" aria-controls="offcanvasRight"
                data-te-ripple-init data-te-ripple-color="light" class="ticket-item flex justify-between items-center">
                <p>#4</p>
                <p>How to win?</p>
                <p>i want to do somthing great here and need....</p>

            </div>
        </div>
    </div>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->


    <div class="ticket-detail invisible fixed bottom-0 right-0 top-0 z-[1045] flex w-96 max-w-full translate-x-full flex-col border-none bg-white bg-clip-padding text-neutral-700 shadow-sm outline-none transition duration-300 ease-in-out dark:bg-neutral-800 dark:text-neutral-200 [&[data-te-offcanvas-show]]:transform-none"
        tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-te-offcanvas-init>
        <div class="ticket-header flex items-center justify-between p-4">

            <button class="ticket-group-btn reply">Reply</button>
            <div class="flex items-center justify-between gap-10">
                <h3>Status: pending</h3>
                <!-- close btn -->
                <button type="button"
                    class="box-content rounded-none border-none opacity-50 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-offcanvas-dismiss>
                    <span
                        class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div class="ticket-body offcanvas-body flex flex-col gap-10 overflow-y-auto p-4">
            <div class="ticket-message ">
                <div class="m-header flex items-center gap-4">
                    <img class="rounded-lg-3" :src="'/storage/images/user_profiles/150-25.jpg'" />
                    <div class="m-info flex flex-col gap-4">
                        <h2>Sara</h2>
                        <p>23 / 04 / 30 | 19:03</p>
                    </div>
                </div>
                <div class="m-content flex flex-col gap-5">
                    <h2>How To Win</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur aperiam quasi similique ipsum
                        fuga quos quae officia dolorem! Animi voluptatem fugiat hic quod soluta deserunt id quos atque
                        ex numquam.</p>
                </div>
            </div>

            <div class="ticket-message ">
                <div style="direction: rtl;" class="m-header flex items-center gap-4">
                    <img class="rounded-lg-3" :src="'/storage/images/user_profiles/150-9.jpg'" />
                    <div class="m-info flex flex-col gap-4">
                        <h2>Admin</h2>
                        <p>23 / 04 / 30 | 19:03</p>
                    </div>
                </div>
                <div class="m-content flex flex-col gap-5">
                    <h2>It's Easy</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur aperiam quasi similique ipsum
                        fuga quos quae officia dolorem! Animi voluptatemo fficia dolorem! Animi voluptatem fugiat hic
                        quod soluta deserunt id quos atque
                        ex numquam.</p>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
import {
    Offcanvas,
    Ripple,
    initTE,
} from "tw-elements";
export default {
    mounted() {
        initTE({ Offcanvas, Ripple });

    },
}
</script>

<style lang="scss" scoped>
.support-head {
    padding: 2rem;
    border-bottom: 1px solid #666;
}

.new-btn,
.ticket-group-btn {
    background-color: #351d62;
    padding: 0.7rem 2rem;
    color: #fff;
    font-weight: 500;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.new-btn:hover {
    border-color: #7384ff;
    transform: translate(10px, -10px);
    box-shadow: -10px 10px 10px 0px #606060;

}

.support-main-container {
    width: 100%;
}

.tickets-group {
    width: 25%;
    gap: 2rem;
    padding: 2rem;
    border-right: 1.5px solid #888;
}

.ticket-group-btn {
    width: 90%;
    box-shadow: 0 2px 11px #666;
}

.tickets-list {
    width: 75%;
    padding: 2rem;
    gap: 2rem;
}

.ticket-item {
    width: 90%;
    margin: auto;
    justify-content: left;
    gap: 2rem;
    padding: 0.8rem 1.5rem;
    background-color: #fff;
    border: 1px solid;
    border-radius: 10px;
    cursor:pointer;
}

.ticket-detail {
    position: absolute;
    visibility: visible;
    background-color: #fff;
    border-radius: 10px;
    color: #333;
    width: 60%;
    height: 95%;
    overflow-y: scroll;
    padding: 2rem;
}

.ticket-header {
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    border-bottom: 1.5px solid;
    padding-bottom: 1.5rem;

    .reply {
        width: 10rem;
    }

    div {}
}

.ticket-message {
    padding: 1.5rem;
    border-radius: 10px;
    background-color: #351d623d;

}

.m-header {
    padding-bottom: 1.5rem;
    border-bottom: 1px solid;

    img {
        width: 7rem;
        height: 7rem;
        border-radius: 90px;
    }

    .m-info {
        h2 {
            font-size: 1.4rem;
            font-weight: 500;
        }

        p {
            font-size: 1rem;
        }
    }
}

.m-content {
    padding: 2rem;

    h2 {
        font-size: 1.3rem;
        font-weight: 500;
    }

    p {
        font-size: 1rem;
        letter-spacing: .7px;
    }
}
</style>
