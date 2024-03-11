@extends('layout/template')

@section('title','Ceramic Challenges | SocialClay')

@section('content')


<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h1 class="mt-5 mb-4 text-center">Ceramic Challenges</h1>
        <div class="row">
            @foreach ($ceramicChallenges as $ceramicChallenge)
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #d0f779">
                    <div class="card-body">
                    <img src="{{ asset('images/challenge_figures.png') }}" alt="figures img" class="img-fluid" style= " margin-bottom: 10px;">
                        <h5 class="card-title">{{ $ceramicChallenge->title }}</h5>
                        <p class="card-text">Description: {{ $ceramicChallenge->description }}</p>
                        <p class="card-text">Start Date: {{ $ceramicChallenge->start_date }}</p>
                        <p class="card-text">End Date: {{ $ceramicChallenge->end_date }}</p>
                        <div class="btn-group" role="group" aria-label="Challenges Actions">
                            <!-- Boton de Participate -->
                             <a href="{{ route('ceramicChallenges.edit', $ceramicChallenge->id) }}" class="btn btn-primary rounded-pill"  style="background-color: #2e4a19; margin-right: 5px;">Participate</a>
                            <a href="{{ route('ceramicChallenges.edit', $ceramicChallenge->id) }}" class="btn btn-primary rounded-pill"  style="background-color: #C8AEFF; margin-right: 5px;">Edit</a>
                            <form action="{{ route('ceramicChallenges.destroy', $ceramicChallenge->id) }}" method="POST">
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
                    <a href="{{ route('ceramicChallenges.create') }}" class="btn btn-success " style="background-color: #C8AEFF;">
                        <h4> Add Challange </h4>
                    </a>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection