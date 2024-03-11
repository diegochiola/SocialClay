@extends('layout/template')

@section('title', 'Confirmation Message')

@section('content')
<body style="background-color: rgb(200, 174, 255); color: #d0f779;">

<div style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container py-4 text-center" style="font-family: Clearface-Serial-Light-RegularItalic;">
    <img src="{{ asset('images/Socialclay_imago.png') }}" alt="imago" class="mx-auto max-w-full h-auto">
        <h2>Validation message</h2>
        <div class="text-center text-gray-500 mb-4">
            <h5>{{ $msg }}</h5>
            
        </div>
    </div>
    <div class="w-50 ml-auto d-none d-md-block">
    <img src="{{ asset('images/user.png') }}" alt="user img" class="mx-auto max-w-full h-auto">
    </div>
   
</div>
@endsection