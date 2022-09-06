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
    // let _this = $(this);
    let ids = document.querySelectorAll('input[name="ids[]"]:checked');
    console.log(ids);
    let myForm = $('#myForm');
    let formData = new FormData(myForm);
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
            Swal.fire(
                'Xóa thành công!',
                'Đã xóa sản phẩm!',
                'success'
            )
            
        }
    })
}

$(function () {
    $(document).on('click', '.action-delete', actionDelete)
})
$(function () {
    $(document).on('click', '.btn-delete-select', actionDeleteSelect)
})
