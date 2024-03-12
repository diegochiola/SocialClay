
@extends('layout/template')

@section('title', 'Participate in Ceramic Challenge')

@section('content')

<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h1 class="mt-5 mb-4 text-center">Participate in a Ceramic Challenge</h1>
        <div class="card" style="background-color: #d0f779">
            <div class="card-body">
            @if ($ceramicChallenge) <!-- En caso de que no hayan challanges cargados -->
                <h5 class="card-title">Ceramic Challenge: {{ $ceramicChallenge->title }}</h5>
                <p class="card-text">Description: {{ $ceramicChallenge->description }}</p>
                <p class="card-text">Start Date: {{ $ceramicChallenge->start_date }}</p>
                <p class="card-text">End Date: {{ $ceramicChallenge->end_date }}</p>
               
                <form action="{{ route('ceramicChallenge.participate', $ceramicChallenge->id) }}" method="POST">                    
                @csrf
                    <div class="form-group">
                        <label for="user_id">Select Your Name:</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Participate</button>
                </form>
               
            </div>
        </div>
    </div>

    @else
    <div class="container py-4 text-center" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h2>No challenges created yet.</h2>
    </div>
    @endif
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection