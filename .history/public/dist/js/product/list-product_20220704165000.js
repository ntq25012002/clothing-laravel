function actionDelete(e) {
    e.preventDefault();
    let productName = $('.product-name').html();
    let Url = $(this).data('url');
    console.log(productName,Url);
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
                url: Url,
            })

            //   Swal.fire(
            //     'Xóa thành công!',
            //     'Sản phẩm' + productName + 'đã bị xóa',
            //     'success'
            //   )
        }
      })
}

$(function () {
    $(document).on('click','.action-delete',actionDelete)
})

