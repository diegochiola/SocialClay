@extends('layout/template')

@section('title','Ceramic Artworks | SocialClay')

@section('content')


<body style="background-color: #2e4a19; color: #d0f779;">
    <div class="container" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h1 class="mt-5 mb-4 text-center">Ceramic Artworks</h1>
        <div class="row">
            @foreach ($artworks as $user)
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #d0f779">
                <img class="card-img-top" style="object-fit: cover; height: 200px;" src="data:image/jpg;base64,{{ base64_encode($user->photo) }}" alt="Artwork Photo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->title }}</h5>
                        <p class="card-text">Description: {{ $user->description }}</p>
                        <p class="card-text">Ceramic Technique: {{ $user->ceramic_technique }}</p>
                        <p class="card-text">Created by: {{ $user->created_by }}</p>
                        <div class="btn-group" role="group" aria-label="Artwork Actions">
                            <a href="{{ route('ceramicArtworks.edit', $user->id) }}" class="btn btn-primary rounded-pill"  style="background-color: #C8AEFF; margin-right: 5px;">Edit</a>
                            <form action="{{ route('ceramicArtworks.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill" style="background-color: rgb(255, 117, 111);">Delete</button>
                            </form>
                        </div> 

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Boton de + -->
        <div class="row">
            <div class="col-md-4 mb-4"> 
                <div class="card" >
                    <a href="{{ route('ceramicArtworks.create') }}" class="btn btn-success " style="background-color: #C8AEFF;">
                        <h3> + </h3>
                    </a>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection