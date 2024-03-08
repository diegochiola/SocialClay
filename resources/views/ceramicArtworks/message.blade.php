@extends('layout/template')

@section('title', 'Confirmation Message')

@section('content')
<body style="background-color: #2e4a19; color: #d0f779;">

<div style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container py-4 text-center" >
        <h2>Validation message</h2>
        <div class="text-center text-gray-500 mb-4">
            <p>{{ $msg }}</p>
            
        </div>
    </div>
    <div class="w-50 ml-auto d-none d-md-block">
    <img src="{{ asset('images/message.png') }}" alt="message img" class="mx-auto max-w-full h-auto">
    </div>
   
</div>
@endsection