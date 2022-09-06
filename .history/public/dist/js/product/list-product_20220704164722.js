function actionDelete(e) {
    e.preventDefault();
    let productName = $('.product-name');
    console.log(productName);
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

