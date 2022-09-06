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
            /* background-color: #ffa801; */
            color: #000;
            text-align: center;
        }
        .table thead{
            position: relative;
            display: block;
            padding: 15px 0;
            /* background-color: #ffa801; */
            color: #000;
            text-align: center;
        }
        .table thead tr th{
            border:1px solid #ddd;
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
            display: flex;
            color: #000
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- <div class="row"> --}}
            <h2 style="color:#000">Xác nhận đặt hàng</h2>
            <table class="table table-strip">
                <tbody>
                    <tr class="odd gradeX">
                        <th>Họ tên:</th>
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
                        <td coltd="5">{{$emails['dataOrders']['code']}}</td>
                    </tr>
                    <tr class="odd gradeX">
                        <th >Tổng tiền:</th>
                        <td>
                            {{number_format($emails['dataOrders']['total'],'0',',','.')}} đ
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <div class="table-scrollable">
                
                <table class="table table-hover table-checkable order-column full-width" id="example4">
                    <div class="odd gradeX">
                        <h3 >Sản phẩm:</h3>
                    </div>
                    <tbody id="list">
                        @foreach ($emails['myCart'] as $item)
                            <tr class="odd ">
                                <td>{{$item['name']}}</td>
                                {{-- <td><img src="{{asset($item['image'])}}"  alt=""></td> --}}
                                <td>{{$item['size']}}</td>
                                <td>
                                    <div style="background-color:{{$item['color']}}; width: 15px; height: 15px"></div>
                                </td>
                                <td>{{number_format($item['price'],'0',',','.')}} đ x {{$item['quantity']}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div>
                <h3>Ghi chú:</h3>
                <span>
                    {{$emails['dataOrders']['note']}}
                </span>
            </div>
        {{-- </div> --}}
    </div>
    {{-- <script>
        const img = document.getElementById('formFile');
        const file = img.files[0];
        const preview = document.getElementById('img-preview');
        console.log(preview);
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            console.log(reader.result);
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    </script> --}}
</body>
</html>
