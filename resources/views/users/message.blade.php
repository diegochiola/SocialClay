@extends('layout/template')

@section('title', 'Confirmation Message')

@section('content')
<body style="background-color: #FCEC91; color: #C8AEFF;">


<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container py-4">
        <h2>Validation message</h2>
        <div class="text-center text-gray-500 mb-4">
            <p>{{ $msg }}</p>
        </div>
    </div>
</main>
@endsection