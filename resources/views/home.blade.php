@extends('layout/template')

@section('title', 'Social')

@section('content') 

<nav class="navbar navbar-expand-lg" style="background-color: #d0f779; color: #2e4a19;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SocialClay</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Join our community</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>
<body  style="background-color: #2e4a19; color: #d0f779;">
<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">

    <div class="text-8xl font-mono">
        <h2 class="text-center mb-10 font-bold">Welcome to our Clay community</h2>
        <h4 class="text-center mb-10 font-bold">Find people like you</h4>
        <h6 class="text-center mb-10 font-bold">Become a member of the biggest worldwide ceramic community. </h6>


    </div>
</main>
</body>


@endsection
