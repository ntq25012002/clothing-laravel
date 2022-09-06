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
$(".btn-edit").on("click", function (e) {

    var form = $('.form');
    Swal.fire({
        title: 'Bạn có muốn lưu các thay đổi không?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Lưu',
        denyButtonText: `Không lưu`,
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            // form.submit();
        } else if (result.isDenied) {
            e.preventDefault();
            Swal.fire('Những thay đổi không được lưu', '', 'info')
        }
    });
});
