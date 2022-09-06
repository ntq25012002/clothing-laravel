function edit(e) {
    e.preventDefault();
    let urlEdit = $(this).data('url');
    console.log(urlEdit);
     
    Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        Swal.fire('Saved!', '', 'success')
        } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
        }
    })
    // Swal.fire({
    //     title: 'Bạn có muốn lưu các thay đổi không?',
    //     showDenyButton: true,
    //     showCancelButton: true,
    //     confirmButtonText: 'Lưu',
    //     denyButtonText: `Không lưu`,
    //     cancelButtonText: 'Hủy',
    // }).then((result) => {
    //     /* Read more about isConfirmed, isDenied below */
    //     if (result.isConfirmed) {
    //         // Call ajax
    //         $.ajax({
    //             type: 'Post',
    //             url: urlRequest,
    //             success: function (data) {
    //                 if(data.code === 200) {
    //                     Swal.fire('Đã lưu!', '', 'success')
    //                 }
    //             },
    //             error: function () {
                 
    //             }
    //         })
    //     } else if (result.isDenied) {
    //         Swal.fire('Changes are not saved', '', 'info')
    //     }
    // })
}


$(function () {
    $(document).on('click', '.btn-edit', edit)
})
