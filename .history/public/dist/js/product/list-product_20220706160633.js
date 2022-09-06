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
    let urlRequest = $(this).data('urlDelete');
    let btnDeleteSelect = $('.btn-delete-select');

    console.log(btnDeleteSelect.data('urlDelete'));
    // let _this = $(this);
    let ids = document.querySelectorAll('input[name="ids[]"]:checked');
    console.log(ids);
    // let formData = new FormData(myForm);
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
            // Call ajax
            $.ajax({
                url: urlRequest,
                method: 'GET',
                success: function (response) {
                    // console.log(response);
                    // if (response.code === 200) {
                        // for (let i = 0; i < ids.length; i++) {
                        //     const id = ids[i];
                        //     console.log(id.parent());
                            // id.parent().parent().remove();
                        // }
                    // }
                    Swal.fire(
                        'Xóa thành công!',
                        'Đã xóa sản phẩm!',
                        'success'
                    )
                },
                error: function (response) {
                    console.log('lỗi xóa ');
                }
            });

        }
    })
}

$(function () {
    $(document).on('click', '.action-delete', actionDelete)
})
$(function () {
    $(document).on('click', '.btn-delete-select', actionDeleteSelect)
})
