<template>
    <div>
        <div class="flex">
            <div class="flex justify-center">
                <p>Message</p>
                <div class="container">
                    <!-- <h3 class=" text-center">Messaging</h3> -->
                    <div class="messaging">
                        <div class="mesgs">
                            <div class="msg_history">
                                <!-- @foreach ($thisEntMessages as $message)
                        @if ($message->sender != 1) -->
                                <div v-for="msg in msgList" :key="msg.id">
                                    <div
                                        v-if="msg.sender == 1"
                                        class="incoming_msg"
                                    >
                                        <div class="incoming_msg_img">
                                            <img
                                                src="https://ptetutorials.com/images/user-profile.png"
                                                alt="sunil"
                                            />
                                        </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>{{ msg.message }}</p>
                                                <span class="time_date">{{
                                                    msg.sentAt
                                                }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- @else -->
                                    <div v-else class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>{{ msg.message }}</p>
                                            <span class="time_date">{{
                                                msg.sentAt
                                            }}</span>
                                        </div>
                                    </div>

                                    <!-- @endif
                    @endforeach -->
                                </div>
                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                   <form  @submit.prevent="sendMessage">
                                    <input
                                        v-model="messageToAdmin.message"
                                        name="message"
                                        type="text"
                                        class="write_msg"
                                        placeholder="Type a message"
                                    />
                                    <button
                                        class="msg_send_btn"
                                        type="submit"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                            />
                                        </svg>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "message-component",
    props: {
        messagelist: Array,
        messageent: Object,
    },
    data() {
        return {
            messageToAdmin: {
                message: "",
            },
            msgList: this.messagelist,
        };
    },
    methods: {
        sendMessage() {
            axios
                .post(
                    `http://127.0.0.1:8000/admin/addMessage/${this.messageent.id}`,
                    this.messageToAdmin
                )
                .then((response) => {
                    console.log(response.data);
                    //   this.$toast.success(response.data.message);
                    this.getMessages();
                })
                .catch((error) => {
                    console.log(error.response);
                    //   this.$toast.error("Message non envoyé");
                });
                this.messageToAdmin.message = " ";

        },

        //Les messages que l'entreprise a envoyé à l'admin
        // getMessages() {
        //   axios
        //     .get(`/admin/messageList/1`,)
        //     .then((response) => {
        //     console.log(response.data.data)
        //     //   commit("updateMessages",response.data.data)
        //     });
        // },
    },

    mounted() {
        window.Echo.channel("MessageChannel").listen(
            "WebsocketMessagesEvent",
            (e) => {
                if (e.message.entreprise_id == this.messageent.id) {
                    console.log(e);
                    this.msgList.push(e.message);
                }
            }
        );
    },
};
</script>
<style scoped>
.container {
    max-width: 1170px;
    margin: auto;
}

img {
    max-width: 100%;
}

.inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%;
    border-right: 1px solid #c4c4c4;
}

.inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
}

.top_spac {
    margin: 20px 0 0;
}

.recent_heading {
    float: left;
    width: 40%;
}

.srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
}

.headind_srch {
    padding: 10px 29px 10px 20px;
    overflow: hidden;
    border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
}

.srch_bar input {
    border: 1px solid #cdcdcd;
    border-width: 0 0 1px 0;
    width: 80%;
    padding: 2px 0 4px 6px;
    background: none;
}

.srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
}

.srch_bar .input-group-addon {
    margin: 0 0 0 -27px;
}

.chat_ib h5 {
    font-size: 15px;
    color: #464646;
    margin: 0 0 8px 0;
}

.chat_ib h5 span {
    font-size: 13px;
    float: right;
}

.chat_ib p {
    font-size: 14px;
    color: #989898;
    margin: auto;
}

.chat_img {
    float: left;
    width: 11%;
}

.chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
}

.chat_people {
    overflow: hidden;
    clear: both;
}

.chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
}

.inbox_chat {
    height: 550px;
    overflow-y: scroll;
}

.active_chat {
    background: #ebebeb;
}

.incoming_msg_img {
    display: inline-block;
    width: 6%;
}

.received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
}

.received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
}

.received_withd_msg {
    width: 57%;
}

.mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
}

.sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0;
    color: #fff;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
}

.sent_msg {
    float: right;
    width: 46%;
}

.input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
}

.type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
}

.msg_send_btn {
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
}

.messaging {
    padding: 0 0 50px 0;
}

.msg_history {
    height: 516px;
    overflow-y: auto;
}
</style>
