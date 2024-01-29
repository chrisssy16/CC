<template>
    <div>
        <!-- Display chat messages here -->

        <form @submit.prevent="sendMessage">
            <textarea v-model="newMessage" placeholder="Type your message..."></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
            newMessage: '',
        };
    },
    mounted() {
        // Set up Laravel Echo to listen for messages
        Echo.private(`job.${this.jobId}`)
            .listen('MessageSent', (event) => {
                this.messages.push(event.message);
            });
    },
    methods: {
        sendMessage() {
            // Send the message to the server
            axios.post(`/send-message/${this.jobId}`, { message: this.newMessage });
            // Clear the input field
            this.newMessage = '';
        },
    },
    props: ['jobId'],
};
</script>