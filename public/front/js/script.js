function alert_reg(message) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}

function alert_phone(message) {
    Swal.fire({
        position: 'top',
        icon: 'warning',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
}

function alert_success(message) {
    Swal.fire({
        position: 'top',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 2000
    })
}

function alert_error(message) {
    Swal.fire({
        position: 'top',
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 2000
    })
}

function alert_save(message, icon) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: icon,
        title: message
    })
}

function alert_by_delay(title, message, delay, redirection) {
    let timerInterval
    Swal.fire({
        title: title,
        html: message,
        timer: delay,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            // console.log('I was closed by the timer')
            // alert_phone("OK");
            window.location.replace("http://mdlive.ir/" + redirection);
        }
    })
}

function redirection(page, attr, value) {
    if (attr == "" && value == "") {
        window.location.replace("http://mdlive.ir/" + page);
    } else {
        window.location.replace("http://mdlive.ir/" + page + "?" + attr + "=" + value);
    }

}
