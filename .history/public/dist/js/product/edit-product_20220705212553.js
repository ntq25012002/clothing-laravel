function edit(e) {
    e.preventDefault();
    let urlRequest = $(this).data('url');
    let productName = $('input[name="name"]').val();
    let featureImage = $('input[name="feature_image"]');
    let imagedetail = $('input[name="images"]');
    console.log(productName, featureImage, imagedetail);
    console.log(urlRequest);
    Swal.fire({
        title: 'Bạn có muốn lưu các thay đổi không?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Lưu',
        denyButtonText: `Không lưu`,
        cancelButtonText: 'Hủy',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            // Call ajax
            $.ajax({
                type: 'POST',
                url: urlRequest,
                // cache: false,
                data: {

                },
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function (respone) {
                    if(respone.code === 200) {
                        Swal.fire('Đã lưu!', '', 'success')
                    }
                },
                error: function () {
                 
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Những thay đổi không được lưu', '', 'info')
        }
    })
}


$(function () {
    $(document).on('click', '.btn-edit', edit)
})
