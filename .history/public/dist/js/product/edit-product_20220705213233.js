function edit(e) {
    e.preventDefault();
    let urlRequest = $(this).data('url');
    let productName = $('input[name="name"]').val();
    let price = $('input[name="price"]').val();
    let promotional_price = $('input[name="promotional_price"]').val();
    let quantity = $('input[name="quantity"]').val();
    let feature_image = $('input[name="feature_image"]').val();
    let description = $('input[name="description"]').val();
    let category_id = $('input[name="category_id"]').val();
    let slug = $('input[name="slug"]').val();
    
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
                    name: productName,
                    price: price,
                    promotional_price: promotional_price,
                    quantity: quantity,
                    feature_image: '',
                    description: description,
                    category_id: category_id,
                    slug: slug 
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
