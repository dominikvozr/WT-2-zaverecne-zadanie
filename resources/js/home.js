// Enable pusher logging - don't include this in production
/*Pusher.logToConsole = true;

var pusher = new Pusher('8b3c6edffd569df64802', {
    cluster: 'eu'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    app.messages.push(JSON.stringify(data));
});*/

// Vue application
import Vue from "vue";

Vue.config.devtools = true
const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    mounted(){
        Pusher.logToConsole = true;

        const pusher = new Pusher('8b3c6edffd569df64802', {
            cluster: 'eu',
            encrypted: true
        });

        const channel = pusher.subscribe(`exam.finished.${Object.keys(this.$refs)[0]}`);

        channel.bind('exam-finished', function(data) {
            console.log(data)
            if (data.message === 'koniec skusky') {
                channel.disconnect()
            }
        });
    }
});
