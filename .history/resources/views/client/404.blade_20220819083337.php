@extends('client.layouts.main')

@section('content')
    @if (session('err'))
        <p class="text-danger text-center" style="font-size: 28px">
            {{session('err')}}
        </p>
    @endif
@endsection