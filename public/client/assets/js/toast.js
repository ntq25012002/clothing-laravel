function toast({title = '', message = '', type = '', duration = 3000}) {
    const main = document.querySelector('#toast');
    // console.log(main);
    if(main) {
        const toast = document.createElement('div');
        // Auto remove toast
        const autoRemoveId = setTimeout(function() {
            main.removeChild(toast);
        },duration + 1000);
        // 
        toast.onclick = function(e) {
            console.log(e.target.closest('.toast__close1'));
            if(e.target.closest('.toast__close')) {     // closest tìm class toast__close (Nếu ko có thì sẽ tìm đến thẻ cha)
                main.removeChild(toast);
                clearTimeout(autoRemoveId)      // Bấm nút close thì sẽ clear auto remove
            }
        }
        const icons = {
            success: 'fa-solid fa-circle-check',
            info: 'fa-solid fa-circle-info',
            warning: 'fa-solid fa-circle-exclamation',
            error: 'fa-solid fa-circle-exclamation',
        }
        const icon = icons[type]
        const delay = (duration/1000).toFixed(2)
        toast.classList.add('toast', `toast--${type}`)
        toast.style.animation = `slideInLeft ease-in .3s, fadeOut linear 1s ${delay}s  forwards`
        toast.innerHTML = `<div class="toast__icon">
                                <i class="${icon}"></i>
                            </div>
                            <div class="toast__body">
                                <h3 class="toast__title">${title}</h3>
                                <p class="toast__msg" style="font-size: 16px;">${message}</p>
                            </div>
                            <div class="toast__close">
                                <i class="fa-solid fa-xmark"></i>   
                            </div>`;
        main.appendChild(toast);

        
    }
}

function showSuccessToast(objToast = {}) {
    toast(objToast)
}

function showWarningToast(objToast = {}) {
    toast(objToast)
}

function showInfoToast() {
    toast({
            title: 'Info',
            message: 'Thêm sản phẩm !',
            type: 'info',
            duration: 4000,
        })
}
function showErrorToast(objToast = {}) {
    toast(objToast)
}
