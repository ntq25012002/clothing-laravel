// function edit(e) {
//     e.preventDefault()
//     const form = $('.form')
//     Swal.fire({
//         title: 'Bạn có muốn lưu các thay đổi không?',
//         showDenyButton: true,
//         showCancelButton: true,
//         confirmButtonText: 'Lưu',
//         denyButtonText: `Không lưu`,
//         cancelButtonText: 'Hủy',
//     }).then((result) => {
//         /* Read more about isConfirmed, isDenied below */
//         if (result.isConfirmed) {
//             console.log('submit');
//             form.submit();
//         } else if (result.isDenied) {
//             Swal.fire('Những thay đổi không được lưu', '', 'info')
//         }
//     })
// }


// $(function () {
//     $(document).on('submit', '.form', edit)
// })
// var confirmed = false;
$(".form").on("submit", function (e) {
    var $this = $(this);
    if (!confirmed) {
        e.preventDefault();
        Swal.fire({
            title: 'Bạn có muốn lưu các thay đổi không?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Lưu',
            denyButtonText: `Không lưu`,
            cancelButtonText: 'Hủy',
            html: false
        }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // confirmed = true;
                        $this.submit();
                    } else if (result.isDenied) {
                        Swal.fire('Những thay đổi không được lưu', '', 'info')
                    }
                });
    }
});
