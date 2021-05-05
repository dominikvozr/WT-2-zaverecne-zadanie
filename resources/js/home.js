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
const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    mounted(){
        Pusher.logToConsole = true;

        var pusher = new Pusher('8b3c6edffd569df64802', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            app.messages.push(JSON.stringify(data));
        });
    }
});
