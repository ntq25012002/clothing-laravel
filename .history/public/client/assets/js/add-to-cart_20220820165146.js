$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // let cart = $('#cart_item');
    let cart = document.querySelector('#cart_item');
    let totalPrd = document.querySelector('#total-item-prd');
    console.log(cart);
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
        let quantityMax = $("input[name=quantity]").attr('max');
        console.log(quantityMax);
        if(quantity <= 0) {
            showWarningToastQuantity();
        }else if(quantity > quantityMax) {
            showWarningToastQuantityMax();
        }else if(size==undefined || color==undefined){
            if(color==undefined) {
                showWarningToastColor();
            }else if(size==undefined) {
                showWarningToastSize();
            }
        }else{
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
                    showSuccessToast();
                    // console.log(response);
                    quantityMax = quantityMax - quantity;
                    cart.innerHTML = response.out;
                    totalPrd.innerHTML = response.totalItemPrd;
                    // $(window).trigger('load')
    
                },
                error: function(response) {
                    showErrorToast();
                }
            })
        }
    })
    
})
