function actionDelete(e) {
    e.preventDefault();
    let productName = $('.product-name').html();
    let urlRequest = $(this).data('url');
    let _this = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ xóa đi sản phẩm " + productName + "!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
      }).then((result) => {
        if (result.isConfirmed) {

            // Call ajax
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if(data.code === 200) {
                        _this.parent().parent().remove();
                    }
                    
                      Swal.fire(
                        'Xóa thành công!',
                        'Sản phẩm' + productName + 'đã bị xóa',
                        'success'
                      )
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            })

        }
      })
}

$(function () {
    $(document).on('click','.action-delete',actionDelete)
})

