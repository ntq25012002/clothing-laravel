<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        html{
            font-family: 'Montserrat', sans-serif;
        }
        .container{
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .row {
            display: flex;
            justify-content:center;
            margin-right: -15px;
            margin-left: -15px;
        }
        .table{
            border: 1px solid #ddd;
            width: 560px;
        }
        .table thead{
            position: relative;
            display: block;
            padding: 15px 0;
            background-color: #ffa801;
            color: #fff;
            text-align: center;
        }
        .table thead tr{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            border:none;
            text-align: center;
        }
        .table tr {
            display: block;
            border-bottom: 1px solid #ddd ;
        }
        .table tr td {
            padding: 8px 6px;
        }
        .table tr td:first-child {
            width: 220px;
        }
        .center {
            text-align: center;
        }
        .bg-yellow {
            background-color: #ffa801;
        }
        .gradeX{

        }
    </style>
</head>
<body>
    <div class="container">
        {{-- <div class="row"> --}}
            <div>
                <h3>Thông tin khách hàng</h3>
                <div class="odd gradeX">
                    <h5 >Họ tên:</h5>
                    <span class="center">{{$emails['customer']['name']}}</span>
                </div>
                <div class="odd gradeX">
                    <h5 >Số điện thoại:</h5>
                    <span class="center">{{$emails['customer']['phone']}}</span>
                </div>
                <div class="odd gradeX">
                    <h5>Email:</h5>
                    <span class="center">{{$emails['customer']['email']}}</span>
                </div>
                <div class="odd gradeX">
                    <h5>Địa chỉ:</h5>
                    <span class="center">{{$emails['customer']['address']}}</span>
                </div>
            </div>
            <div class="table-scrollable">
                   
                <table class="table table-hover table-checkable order-column full-width" id="example4">
                    <thead> 
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Kích cỡ</th>
                        <th>Màu sắc</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                    </thead>
                    <tbody id="list">
                        @foreach ($emails['myCart'] as $item)
                            <tr class="odd ">
                                <td>{{$item['name']}}</td>
                                <td><img src="{{asset($item['image'])}}" alt=""></td>
                                <td>{{$item['size']}}</td>
                                <td>
                                    <div style="background-color:{{$item['color']}}"></div>
                                </td>
                                <td>{{number_format($item['price'],'0',',','.')}}</td>
                                <td>{{$item['quantity']}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th >Mã đơn hàng:</th>
                            <td colspan="5">{{$emails['dataOrders']['code']}}</td>
                        </tr>
                        <tr class="odd  bg-yellow">
                            <th >Tổng tiền:</th>
                            <td class="center" colspan="5">{{number_format($emails['total'],'0',',','.')}}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        {{-- </div> --}}
    </div>
</body>
</html>
