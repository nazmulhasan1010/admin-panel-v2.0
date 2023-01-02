// --------------------------------------------------------------------
const toastMessage = document.querySelector('.alertToaster'),
    alertIcon = document.querySelector('.messageIcon');
let toastPlacement;

function toastDispose(toast) {
    if (toast && toast._element !== null) {
        if (toastMessage) {
            toastMessage.classList.remove(selectedType);
            DOMTokenList.prototype.remove.apply(toastMessage.classList, selectedPlacement);
        }
        toast.dispose();
    }
}

function toasterShow(status, message) {
    if (toastPlacement) {
        toastDispose(toastPlacement);
    }
    let msgType = status.replace('success', 'bg-success').replace('notify', 'bg-primary').replace('error', 'bg-danger').replace('warning', 'bg-warning').replace('info', 'bg-info');
    let iconType = status.replace('success', 'bx-check').replace('notify', 'bx-bell').replace('error', 'bx-error').replace('warning', 'bx-error-circle').replace('info', 'bx-info-circle');
    toastMessage.classList.add(msgType);
    alertIcon.classList.add(iconType);
    toastPlacement = new bootstrap.Toast(toastMessage);
    toastPlacement.show();
    document.querySelector('.toast-title').innerHTML = status;
    document.querySelector('.toast-message').innerHTML = message;
}

// tooltip
$('.tooltip-message').css({
    'left': '-'+($('.tooltip-message').width()-$('.tooltip-button').width())/2-5+'px',
})


