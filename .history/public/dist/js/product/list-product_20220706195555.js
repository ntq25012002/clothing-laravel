function actionDelete(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let productName = $('.product-name-' + id).html();
    let urlRequest = $(this).data('url');
    let _this = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ xóa đi sản phẩm " + productName + "!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            // Call ajax
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code === 200) {
                        _this.parent().parent().remove();
                    }
                    Swal.fire(
                        'Xóa thành công!',
                        'Đã xóa sản phẩm ' + productName + ' !',
                        'success'
                    )
                },
                error: function () {

                }
            })
        }
    })
}


function actionDeleteSelect(e) {
    e.preventDefault();
    let btnDeleteSelect = $('.btn-delete-select');
    let url = btnDeleteSelect.data('urldeleteselect');
    // let ids = document.querySelectorAll('input[name="ids[]"]:checked');
    var form = $('#myForm');
    console.log(form);
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ xóa đi sản phẩm đã chọn!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            //     'Xóa thành công!',
            //     'Đã xóa sản phẩm!',
            //     'success'
            // )
            form.submit();
        }
    })
}

$(function () {
    $(document).on('click', '.action-delete', actionDelete)
})

$(".btn-delete-select").on("click", function (e) {
    var form = $('#myForm');
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ xóa đi sản phẩm đã chọn!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

const alert = $('alert');
console.log(alert);
if (alert) {
    let timerInterval
    Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
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
            console.log('I was closed by the timer')
        }
    })
}
