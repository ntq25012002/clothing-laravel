function edit(e) {
    // e.preventDefault();
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
    //         console.log('submit');
    //         // form.submit()
    //     } else if (result.isDenied) {
    //         Swal.fire('Những thay đổi không được lưu', '', 'info')
    //     }
    // })
    var $this = $(this);
    if (!confirmed) {
        e.preventDefault();
        swal({
            title: $(this).data("swa-title"),
            text: $(this).data("swa-text"),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#cc3f44",
            confirmButtonText: $(this).data("swa-btn-txt"),
            closeOnConfirm: true,
            html: false
        }, function() {
            confirmed = true;
            $this.submit();
        });
    }
}


$(function () {
    $(document).on('click', '.btn-edit', edit)
})
