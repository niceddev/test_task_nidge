import Swal from 'sweetalert2'

document.addEventListener('DOMContentLoaded', () => {

    window.Toasts = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 2000,
        customClass: {
            popup: 'colored-toast'
        },
        padding: 10,
    })

    Pusher.logToConsole = true

    let pusher = new Pusher('6c6563f7a59b75cc3a96', {
        cluster: 'ap1'
    })

    let channel = pusher.subscribe('notification-channel')
    channel.bind('sent', function(data) {
        Toasts.fire({
            icon: 'success',
            title: data
        })
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
