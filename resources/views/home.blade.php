@extends('layout/template')

@section('title', 'SocialClay')

@section('content') 


<body  style="background-color: #2e4a19; color: #d0f779;">

<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="text-8xl" style="font-family: Clearface-Serial-Light-RegularItalic;">
      <h2 class="text-center mb-10 "> Welcome to our Clay community</h2>
        <h4 class="text-center mb-10">Find people like you</h4>
        <h6 class="text-center mb-10">Become a member of the biggest ceramic community. </h6>
        <div class="d-flex justify-content-center">
          <a href="{{ url('/users/create') }}" class="btn btn-success btn-lg rounded-pill" style="background-color: #C8AEFF; color: #2e4a19;">Join our community</a>
        </div>
    </div>
    <div class="w-50 ml-auto d-none d-md-block">
    <img src="{{ asset('images/home.png') }}" alt="home image" class="mx-auto max-w-full h-auto">
    </div>
</main>
</body>


@endsection
