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
            // Call ajax
            $.ajax({
                type: 'Post',
                url: urlRequest,
                success: function (data) {
                    if(data.code === 200) {
                        Swal.fire('Saved!', '', 'success')
                    }
                },
                error: function () {
                  if(data.code === 200) {
                    _this.parent().parent().remove();
                  }
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
