@php
    $checkin = strtotime($emails['booking']->checkin);
    $checkout = strtotime($emails['booking']->checkout);
    $datediff = abs($checkin - $checkout);
    $nights = 1 + $datediff / (60*60*24);
@endphp
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
            padding: 16px 0;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="table-scrollable">
                <table class="table table-hover table-checkable order-column full-width">
                    <thead>
                        <th>
                            <h3>Thông tin khách hàng</h3>
                        </th>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <th >Họ tên:</th>
                            <td class="center">{{$emails['customer']['name']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <th >Số điện thoại:</th>
                            <td class="center">{{$emails['customer']['phone']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <th>Email:</th>
                            <td class="center">{{$emails['customer']['email']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <th>Địa chỉ:</th>
                            <td class="center">{{$emails['customer']['address']}}</td>
                        </tr>
                        <tr class="odd gradeX">
                            <th >Mã đơn hàng:</th>
                            <td class="center">{{$emails['dataOrders']['code']}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover table-checkable order-column full-width" id="example4">
                    <thead> 
                        <th>
                            <h3>Chi tiết đơn hàng</h3>
                        </th>
                    </thead>
                    <tbody id="list">
                        @foreach ($emails['myCart'] as $item)
                            <tr class="odd gradeX">
                                <td>{{$item['name']}}</td>
                                <td><img src="{{asset($item['name'])}}" alt=""></td>
                                <td>{{$item['size']}}</td>
                                <td>
                                    <div style="background-color:{{$item['color']}}"></div>
                                </td>
                                <td>{{$item['price']}}</td>
                                <td>{{$item['quantity']}}</td>
                            </tr>
                        @endforeach
                        <tr class="odd gradeX bg-yellow">
                            <th >Tổng tiền:</th>
                            <td class="center">{{number_format($emails['booking']['price'],'0',',','.')}}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>