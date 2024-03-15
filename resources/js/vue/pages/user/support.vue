<template>
    <page-title :title="'Support'"></page-title>

    <div class="support-head">
        <button @click="openCreateTicket()" class="new-btn">New Ticket</button>
    </div>
    <div class="support-main-container flex">
        <div class="tickets-group flex flex-col items-start justify-start">
            <button
                :class="show_tab === 1 ? 'active-btn' : ''"
                @click="show_tab = 1"
                class="ticket-group-btn"
            >
                Pending
            </button>
            <button
                :class="show_tab === 2 ? 'active-btn' : ''"
                @click="show_tab = 2"
                class="ticket-group-btn"
            >
                Answered
            </button>
            <button
                :class="show_tab === 3 ? 'active-btn' : ''"
                @click="show_tab = 3"
                class="ticket-group-btn"
            >
                Closed
            </button>
        </div>
        <Transition mode="out-in">
            <!-- pending -->
            <div
                v-if="show_tab === 1"
                class="tickets-list flex flex-col items-start justify-start"
            >
                <div
                    v-for="(item, index) in pending"
                    :key="index"
                    data-te-offcanvas-toggle
                    data-te-target="#offcanvasRight"
                    aria-controls="offcanvasRight"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    class="ticket-item flex justify-between items-center"
                    @click="showDetails(item)"
                >
                    <p>#{{ index + 1 }}</p>
                    <p>{{ item.subject }}</p>
                    <p class="one_line_text">{{ item.content }}</p>
                </div>
            </div>
            <!-- answered -->
            <div
                v-else-if="show_tab === 2"
                class="tickets-list flex flex-col items-start justify-start"
            >
                <div
                    v-for="(item, index) in answered"
                    :key="index"
                    data-te-offcanvas-toggle
                    data-te-target="#offcanvasRight"
                    aria-controls="offcanvasRight"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    class="ticket-item flex justify-between items-center"
                >
                    <p>#{{ index + 1 }}</p>
                    <p>{{ item.subject }}</p>
                    <p class="one_line_text">{{ item.content }}</p>
                </div>
            </div>
            <!-- closed -->
            <div
                v-else-if="show_tab === 3"
                class="tickets-list flex flex-col items-start justify-start"
            >
                <div
                    v-for="(item, index) in closed"
                    :key="index"
                    data-te-offcanvas-toggle
                    data-te-target="#offcanvasRight"
                    aria-controls="offcanvasRight"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    class="ticket-item flex justify-between items-center"
                >
                    <p>#{{ index + 1 }}</p>
                    <p>{{ item.subject }}</p>
                    <p class="one_line_text">{{ item.content }}</p>
                </div>
            </div>
        </Transition>
    </div>

    <!-- details modal  -->
    <!-- toggle class is translate-x-full -->

    <div
        :class="[
            show_details ? '' : 'translate-x-full',
            `ticket-detail invisible fixed bottom-0 right-0 top-0 z-[1045]
         flex w-96 max-w-full  flex-col border-none
          bg-white bg-clip-padding text-neutral-700 shadow-sm outline-none 
          transition duration-300 ease-in-out dark:bg-neutral-800 dark:text-neutral-200
           [&[data-te-offcanvas-show]]:transform-none`,
        ]"
        tabindex="-1"
        id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel"
        data-te-offcanvas-init
    >
        <!-- <OnClickOutside class="msg-container" @trigger="closeDetails"> -->
        <ticket-chats
            @close="closeDetails"
            @storeMsg="store_ticket"
            :tickets="ticket_details"
        ></ticket-chats>
        <!-- </OnClickOutside> -->
    </div>

    <!-- create ticket dialog -->
    <TransitionRoot as="template" :show="create_modal">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                        >
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="#eee"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="green"
                                            class="h-8 w-8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
                                            />
                                        </svg>
                                    </div>
                                    <div
                                        class="w-full mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left"
                                    >
                                        <DialogTitle
                                            v-if="!is_reply"
                                            as="h3"
                                            class="text-base font-semibold leading-6 text-gray-900"
                                            >Submit New Ticket
                                        </DialogTitle>
                                        <DialogTitle
                                            v-else
                                            as="h3"
                                            class="text-base font-semibold leading-6 text-gray-900"
                                            >Submit Your Reply
                                        </DialogTitle>

                                        <div class="mt-6 w-full">
                                            <div
                                                v-if="!is_reply"
                                                class="relative mb-3 w-full"
                                                data-te-input-wrapper-init
                                            >
                                                <input
                                                    v-model="newTicketSubject"
                                                    type="text"
                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                    id="exampleFormControlInputText"
                                                    placeholder="Example label"
                                                />
                                                <label
                                                    style="
                                                        z-index: 1;
                                                        background: #fff;
                                                    "
                                                    for="exampleFormControlInputText"
                                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                                    >Subject
                                                </label>
                                            </div>
                                            <!-- its a reply -->
                                            <div
                                                v-else
                                                class="relative mb-3 w-full"
                                                data-te-input-wrapper-init
                                            >
                                                <input
                                                    v-model="
                                                        current_open_ticket.subject
                                                    "
                                                    type="text"
                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                    id="exampleFormControlInputText"
                                                    placeholder="Example label"
                                                    disabled
                                                />
                                                <!-- <label
                                                    style="
                                                        z-index: 1;
                                                        background: #fff;
                                                    "
                                                    for="exampleFormControlInputText"
                                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                                    >Subject
                                                </label> -->
                                            </div>
                                            <div
                                                class="relative mb-3"
                                                data-te-input-wrapper-init
                                            >
                                                <textarea
                                                    v-model="newTicketDesc"
                                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                    id="exampleFormControlTextarea1"
                                                    rows="4"
                                                    placeholder="Your message"
                                                    required
                                                ></textarea>
                                                <label
                                                    style="
                                                        z-index: 1;
                                                        background: #fff;
                                                    "
                                                    for="exampleFormControlTextarea1"
                                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                                    >Description
                                                </label>
                                            </div>
                                            <div
                                                class="relative mb-3"
                                                data-te-input-wrapper-init
                                            >
                                                <div class="mb-3">
                                                    <label
                                                        for="formFile"
                                                        class="mb-2 inline-block text-neutral-500 dark:text-neutral-400"
                                                        >Upload File</label
                                                    >
                                                    <input
                                                        @change="
                                                            onFileChanged(
                                                                $event
                                                            )
                                                        "
                                                        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white file:dark:text-white"
                                                        type="file"
                                                        id="formFile"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                            >
                                <button
                                    @click="
                                        store_ticket(), (create_modal = false)
                                    "
                                    type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 sm:ml-3 sm:w-auto"
                                >
                                    Submit
                                </button>
                                <button
                                    type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                    @click="create_modal = false"
                                    ref="cancelButtonRef"
                                >
                                    Cancel
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {
    convertDBTimeToDate,
    convertDBTimeToTime,
} from "@/modules/utilities/convertor.js";
import { mapGetters, mapActions } from "vuex";
import { OnClickOutside } from "@vueuse/components";
import ticketChats from "../../components/user/ticket_chats.vue";

import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { Input, Offcanvas, Ripple, initTE } from "tw-elements";
export default {
    data() {
        return {
            is_loading: false,
            is_loading_more: false,
            create_modal: false,
            inputFile: null,
            newTicketSubject: null,
            newTicketDesc: null,
            inputFile: null,
            fetchrl: "tickets/user/all",
            storeUrl: "tickets/store",
            fetchInfoUrl: "tickets/info",
            tickets: [],
            pending: [],
            answered: [],
            closed: [],
            ticket_details: [],
            show_tab: 1,
            show_details: false,
            is_reply: false,
            current_open_ticket: null,
        };
    },
    methods: {
        convertDBTimeToDate,
        convertDBTimeToTime,
        openCreateTicket(is_reply) {
            console.log(this.current_open_ticket);
            if (is_reply) this.is_reply = true;
            this.create_modal = true;
        },
        toggleDetails() {
            // $('#offcanvasRight').toggleClass('translate-x-full');

            this.show_details = !this.show_details;
        },
        closeDetails() {
            this.newTicketSubject = null;
            this.newTicketDesc = null;
            this.inputFile = null;
            this.current_open_ticket = null;
            this.is_reply = false;
            this.create_modal = false;
            this.show_details = false;
        },
        fetchData() {
            let config = {
                Authorization: this.UserAuthToken,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.fetchrl,
                headers: config,
            })
                .then((response) => {
                    console.log(response.data.data);
                    this.tickets = response.data.data;
                    this.sortByStatus();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {});
        },
        sortByStatus() {
            var pending = [];
            var answered = [];
            var closed = [];
            this.tickets.forEach((item, index) => {
                if (item.status === 1) {
                    pending.push(item);
                } else if (item.status === 100) {
                    answered.push(item);
                } else if (item.status === 0) {
                    closed.push(item);
                }
            });
            this.pending = pending;
            this.answered = answered;
            this.closed = closed;
        },
        onFileChanged(event) {
            this.inputFile = event.target.files[0];
            console.log(this.inputFile);
        },
        // values in () is for sending reply from component
        store_ticket(
            content = this.newTicketDesc,
            myFile = this.inputFile,
            reply = this.is_reply
        ) {
            this.is_loading = true;
            // let myFile = this.inputFile;

            const formData = new FormData();
            if (myFile != null) {
                formData.append("attachment", myFile);
            }

            formData.append("content", content);

            if (reply) {
                // sending reply
                formData.append("subject", this.current_open_ticket.subject);
                formData.append("reply_to_id", this.current_open_ticket.id);
            } else {
                // new ticket
                formData.append("subject", this.newTicketSubject);
            }
            console.log(myFile);

            let config = {
                Authorization: this.UserAuthToken,
                "Content-Type": "multipart/form-data",
            };

            axios({
                method: "post",
                url: this.baseUrl + this.storeUrl,
                data: formData,
                headers: config,
            })
                // .get(this.baseUrl + this.userUrl, body , config)
                .then((response) => {
                    console.log(response);
                    this.newTicketSubject = null;
                    this.newTicketDesc = null;
                    this.inputFile = null;
                    // this.current_open_ticket = null;
                    // this.is_reply = false;
                    this.create_modal = false;
                    // this.show_details=false;
                    if (reply) {
                        // fetch reply tickets
                        this.showDetails(this.current_open_ticket);
                    }
                    this.fetchData();
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
        showDetails(ticket) {
            this.ticket_details = [];
            let config = {
                Authorization: this.UserAuthToken,
            };
            let body = {
                ticket_id: ticket.id,
            };

            axios({
                method: "post",
                url: this.baseUrl + this.fetchInfoUrl,
                data: body,
                headers: config,
            })
                .then((response) => {
                    console.log(response.data.data);
                    this.ticket_details = response.data.data;
                    if (this.ticket_details.length === 0) {
                        alert("no record found");
                        return;
                    }
                    this.current_open_ticket = ticket;
                    this.show_details = true;
                })
                .catch((error) => {
                    console.log("error");
                    console.log(error);
                })
                .finally(() => {
                    this.is_loading = false;
                });
        },
    },
    mounted() {
        initTE({ Offcanvas, Ripple, Input });
    },
    computed: {
        ...mapGetters(["baseUrl", "UserAuthToken", "user"]),
    },
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        OnClickOutside,
        ticketChats,
    },
    created() {
        this.fetchData();
    },
};
</script>

<style lang="scss" scoped>
.admin_msg {
    direction: rtl !important;
}
.support-head {
    padding: 2rem;
    border-bottom: 1px solid #666;
}
.msg-container {
    display: flex;
    align-items: flex-end;
    width: 50%;
    justify-content: flex-end;
}
.new-btn,
.ticket-group-btn {
    background-color: #fff;
    padding: 0.7rem 2rem;
    color: #351d62;
    font-weight: 500;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.active-btn {
    background-color: #351d62;
    color: #fff;
    transform: translate(10px, -10px);
    box-shadow: -10px 10px 10px 0px #606060 !important;
}

.new-btn:hover {
    border-color: #7384ff;
    transform: translate(10px, -10px);
    box-shadow: -10px 10px 10px 0px #606060;
}

.support-main-container {
    width: 100%;
    transition: all 0.3s ease;
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
    max-height: 40rem;
    overflow-y: scroll;
}

.ticket-item {
    position: relative;
    width: 90%;
    margin: 0 auto;
    justify-content: left;
    gap: 2rem;
    padding: 0.8rem 1.5rem;
    background-color: #fff;
    border: 1px solid;
    border-radius: 10px;
    cursor: pointer;
}

.ticket-detail {
    position: absolute;
    visibility: visible;
    border-radius: 10px;
    color: #333;
    width: 100%;
    height: 95%;
    overflow-y: scroll;
    transition: all 0.6s cubic-bezier(0.82, -0.41, 0, 1.43);
    background: none;
    backdrop-filter: blur(7px);
    display: flex;
    align-items: flex-end;
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

    div {
    }
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
        letter-spacing: 0.7px;
    }
}

.slide-up-enter-active,
.slide-up-leave-active {
    transition: all 0.25s ease-out;
}

.slide-up-enter-from {
    opacity: 0;
    transform: translateY(30px);
}

.slide-up-leave-to {
    opacity: 0;
    transform: translateY(-30px);
}

.ticket-item::before,
.ticket-item::after {
    content: "";
    height: 2rem;
    width: 2rem;
    position: absolute;
    transition: all 0.35s ease;
    opacity: 0;
}

.ticket-item::before {
    content: "";
    right: -0.5rem;
    top: -0.5rem;
    border-top: 3px solid #3f8914d0;
    border-right: 3px solid #2e640fc7;
    transform: translate(-100%, 50%);
    border-top-right-radius: 10px;
}

.ticket-item:after {
    content: "";
    left: -0.5rem;
    bottom: -0.5rem;
    border-bottom: 3px solid #2e640fb0;
    border-left: 3px solid #3f8914c0;
    transform: translate(100%, -50%);
    border-bottom-left-radius: 10px;
}

.ticket-item:hover:before,
.ticket-item:hover:after {
    transform: translate(0, 0);
    opacity: 1;
}

.ticket-item:hover {
    color: #3da35d;
}
.ticket-time {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.35rem;
    font-size: 1.1rem;
    ion-icon {
        font-size: 1.3rem;
    }
}
</style>
