
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.add-to-cart',function(e) {
        e.preventDefault();
        const token = $('meta[name="_token"]').attr('content');
        const url = $(this).data('url');
        const prdId = $(this).data('prd_id');
        let quantity = $("input[name=quantity]").val();
        let prdName = $("input[name=prd-name]").val();
        let price = $("input[name=price]").val();
        let color = $("input[name=color]:checked").val();
        let size = $("input[name=size]:checked").val();
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                name: prdName,
                color: color,
                size: size,
                price: price,
                quantity: quantity,
                _token: token,
            },
            dataType: 'JSON',
            success: function(response) {
                console.log('xong');
                showSuccessToast();
            },
            error: function(response) {
                console.log('lỗi');
            }
        })
    })

    
    
})
