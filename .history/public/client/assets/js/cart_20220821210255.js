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
            showWarningToast({
                title: 'Warning',
                message: 'Vui lòng chọn số lượng lơn hơn 0 !',
                type: 'warning',
                duration: 3000,
            });
        }else if(quantity > quantityMax || totalQuantity> maxQuantity) {
            showWarningToast({
                title: 'Warning',
                message: 'Số lượng sản phẩm vượt quá trong kho !',
                type: 'warning',
                duration: 3000,
            });
        }else if(size==undefined || color==undefined){
            if(color==undefined) {
                showWarningToast({
                    title: 'Warning',
                    message: 'Bạn chưa chọn màu sắc !',
                    type: 'warning',
                    duration: 3000,
                });
            }else if(size==undefined) {
                showWarningToast({
                    title: 'Warning',
                    message: 'Bạn chưa chọn kích cỡ !',
                    type: 'warning',
                    duration: 3000,
                });
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
                    showSuccessToast({
                        title: 'Thành công',
                        message: 'Thêm sản phẩm vào giỏ hàng thành công !',
                        type: 'success',
                        duration: 3000,
                    });
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
        let totalPrice = document.querySelector('#total-price');
        const urlDelete = $(this).data('url_delete');
        const _this = $(this);
        $.ajax({
            type: 'GET',
            url: urlDelete,
            success: function(response) {
                if(response.status === 200) {
                    _this.parent().parent().remove();
                    totalPrd.innerHTML = response.totalItemPrd;
                    totalPrice.innerHTML = response.total;
                    showSuccessToast({
                        title: 'Thành công',
                        message: 'Đã sản phẩm khỏi giỏ hàng !',
                        type: 'success',
                        duration: 3000,
                    });
                }else if(response.status === 500) {
                    showErrorToast({
                        title: 'Thất bại',
                        message: 'Xóa sản phẩm khỏi giỏ hàng thất bại!',
                        type: 'error',
                        duration: 3000,
                    });
                }
            }
        })
    }) 
    
    $(document).on('click','.remove_shopping_cart_item',function(e) {
        let totalPrice = document.querySelector('.total-prev');
        const urlDelete = $(this).data('url_delete');
        // const _this = $(this);
        $(this).parent().parent().parent().parent().remove();

        // $.ajax({
        //     type: 'GET',
        //     url: urlDelete,
        //     success: function(response) {
        //         if(response.status === 200) {
        //             _this.parent().parent().parent().parent().remove();
        //             totalPrd.innerHTML = response.totalItemPrd;
        //             totalPrice.innerHTML = response.total;
        //             showSuccessToast({
        //                 title: 'Thành công',
        //                 message: 'Đã sản phẩm khỏi giỏ hàng !',
        //                 type: 'success',
        //                 duration: 3000,
        //             });
        //         }else if(response.status === 500) {
        //             showErrorToast({
        //                 title: 'Thất bại',
        //                 message: 'Xóa sản phẩm khỏi giỏ hàng thất bại!',
        //                 type: 'error',
        //                 duration: 3000,
        //             });
        //         }
        //     }
        // })
    })

    // Update cart
})
