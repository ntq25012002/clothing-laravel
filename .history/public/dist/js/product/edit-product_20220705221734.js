function edit(e) {
    e.preventDefault()
    console.log(e.preventDefault );
    const form = $('.form')
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
            console.log('submit');
            submit(form);
        } else if (result.isDenied) {
            Swal.fire('Những thay đổi không được lưu', '', 'info')
        }
    })
}


$(function () {
    $(document).on('click', '.btn-edit', edit)
})
