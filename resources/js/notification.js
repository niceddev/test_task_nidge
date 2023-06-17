import Toastify from 'toastify-js'

document.addEventListener('DOMContentLoaded', () => {

    Pusher.logToConsole = true

    let pusher = new Pusher('6c6563f7a59b75cc3a96', {
        cluster: 'ap1'
    })

    let channel = pusher.subscribe('notification-channel')
    channel.bind('sent', function(data) {
        Toastify({
            text: data,
            duration: 3000,
            newWindow: true,
            close: false,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(135deg, #73a5ff, #5477f5)",
            },
        }).showToast();
    })

    sendNotification()

})

function sendNotification() {

    let btn = document.getElementById('notification-btn')
    let message = document.getElementById('message')

    if (btn !== null) {

        btn.addEventListener('click', function() {
            axios.post('/notifications/send', {
                message: message.value
            })
                .then(res => {
                    console.log('success')
                })
                .catch(error => {
                    console.error(error);
                    throw error;
                });
        })
    }

}
