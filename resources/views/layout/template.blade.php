<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
 
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #d0f779; color: #2e4a19;">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/home')}}">
        <img src="{{ asset('images/SocialClay_logo.png') }}" alt="Logo" width="auto" height="26" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- button join us -->
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/users/create')}}">Join us</a>
        </li>
        <!-- button join our community -->
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/users')}}">Our Community</a>
        </li>
        <!-- ceramicArtwork-->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/ceramicArtworks')}}">Ceramic Artworks</a>
        </li>
        <!-- Add ceramicArtwork-->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/ceramicArtworks/create')}}">Add Ceramic Artworks</a>
        </li>
        <!-- Be part of our challenges-->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/challenges')}}">Challenges</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <main style="display: flex; justify-content: center; align-items: center;">
        <div class="container py-4">
             <!-- @yield('') nos permite contenido dinamico  y lo colocamos dentro de una division para asegurarnos que respete el orden-->
            @yield('content')
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>