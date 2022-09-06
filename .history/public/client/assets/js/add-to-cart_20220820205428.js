$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const maxQuantity = $("input[name=quantity]").data('max_quantity');
    $("input[name=quantity]").attr('max',maxQuantity)
    let cart = document.querySelector('#cart_item');
    let totalPrd = document.querySelector('#total-item-prd');
    $(document).on('click','.add-to-cart',function(e) {
        e.preventDefault();
        const token = $('meta[name="_token"]').attr('content');
        const url = $(this).data('url');
        let quantity = $("input[name=quantity]").val();
        let prdName = $("input[name=prd-name]").val();
        let price = $("input[name=price]").val();
        let color = $("input[name=color]:checked").val();
        let size = $("input[name=size]:checked").val();
        let quantityMax = Number($("input[name=quantity]").attr('max'));
        let str = '#prd_quantity' + color + size;
        const prdQuantity = $(`#prd_quantity${color}${size}`);
        
        console.log(prdQuantity);
        // if(quantityMax == 0) {
        //     showWarningToastUnavailable();
        // }
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
                    quantityMax -= quantity;
                    $("input[name=quantity]").attr('max',quantityMax)
                    // console.log($("input[name=quantity]").attr('max'));
                    // $('#available-quantity').html(quantityMax - quantity)

                    cart.innerHTML = response.out;
                    totalPrd.innerHTML = response.totalItemPrd;
    
                },
                error: function(response) {
                    showErrorToast();
                }
            })
        }
    })
    
})
