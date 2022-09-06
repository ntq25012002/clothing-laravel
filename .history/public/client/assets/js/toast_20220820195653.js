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

function showSuccessToast() {
    toast({
            title: 'Thành công',
            message: 'Thêm sản phẩm vào giỏ hàng thành công !',
            type: 'success',
            duration: 2500,
        })
}
function showWarningToast() {
    toast({
            title: 'Warning',
            message: 'Vui lòng chọn đủ màu sắc và kích thước !',
            type: 'warning',
            duration: 2500,
        })
}

function showInfoToast() {
    toast({
            title: 'Info',
            message: 'Thêm sản phẩm !',
            type: 'info',
            duration: 4000,
        })
}
function showErrorToast() {
    toast({
            title: 'Lỗi',
            message: 'Lỗi thêm sản phẩm vào giỏ hàng!',
            type: 'error',
            duration: 2500,
        })
}


function showWarningToastColor() {
    toast({
            title: 'Warning',
            message: 'Bạn chưa chọn màu sắc !',
            type: 'warning',
            duration: 2500,
        })
}
function showWarningToastSize() {
    toast({
            title: 'Warning',
            message: 'Bạn chưa chọn kích thước !',
            type: 'warning',
            duration: 2500,
        })
}
function showWarningToastQuantity() {
    toast({
            title: 'Warning',
            message: 'Vui lòng chọn số lượng lơn hơn 0 !',
            type: 'warning',
            duration: 2500,
        })
}

function showWarningToastQuantityMax() {
    toast({
            title: 'Warning',
            message: 'Số lượng sản phẩm vượt quá số lượng trong kho !',
            type: 'warning',
            duration: 2500,
        })
}
function showWarningToastUnavailable() {
    toast({
            title: 'Warning',
            message: 'Sản phẩm đã hết hàng !',
            type: 'warning',
            duration: 2500,
        })
}