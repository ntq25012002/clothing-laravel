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
        let prdId = $(this).data('prd_id');
        let quantity = $("input[name=quantity]").val();
        let prdName = $("input[name=prd-name]").val();
        let price = $("input[name=price]").val();
        let color = $("input[name=color]:checked").val();
        let size = $("input[name=size]:checked").val();
        let quantityMax = Number($("input[name=quantity]").attr('max'));

        const prdQuantity = $(`#prd_quantity${prdId}${color}${size}`).data(`prd_quantity${prdId}${color}${size}`);
        
        let totalQuantity = Number(prdQuantity) + Number(quantity);
        console.log(totalQuantity);
        if(quantity <= 0) {
            showWarningToastQuantity();
        }else if(quantity > quantityMax || totalQuantity> maxQuantity) {
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
                    cart.innerHTML = response.out;
                    totalPrd.innerHTML = response.totalItemPrd;
                    
                },
                error: function(response) {
                    showErrorToast();
                }
            })
        }
    })

    // Remove cart item
    $(document).on('click','.btn_remove', function(e) {
        const urlDelete = $(this).data('urlDelete');
        
        alert(urlDelete)
    }) 
    
})
