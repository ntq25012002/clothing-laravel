@extends('client.layouts.main')

@section('content')
    @if (session('error'))
        <p class="text-danger text-center" style="font-size: 28px">
            {{session('error')}}
        </p>
    @endif
@endsection