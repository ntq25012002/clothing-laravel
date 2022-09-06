function edit(e) {
    e.preventDefault();
    let urlRequest = $(this).data('url');
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
                success: function (data) {
                    if(data.code === 200) {
                        Swal.fire('Đã lưu!', '', 'success')
                    }
                },
                error: function () {
                 
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}


$(function () {
    $(document).on('click', '.btn-edit', edit)
})
