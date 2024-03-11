@extends('layout/template')

@section('title','Our Community| SocialClay')

@section('content')


<body style="background-color: rgb(200, 174, 255); color: #d0f779;">
    <div class="container" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h1 class="mt-5 mb-4 text-center">Our Community</h1>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #d0f779">
                <img class="card-img-top" style="object-fit: cover; height: 200px;" src="data:image/jpg;base64,{{ base64_encode($user->photo) }}" alt="User Photo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Role: {{ $user->role }}</p>
                        <p class="card-text">Location: {{ $user->location }}</p>
                        <div class="btn-group" role="group" aria-label="User Actions">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary rounded-pill"  style="background-color: #C8AEFF; margin-right: 5px;">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                    <a href="{{ route('users.create') }}" class="btn btn-success " style="background-color: #d0f779; color: rgb(200, 174, 255);">
                        <h3> + </h3>
                    </a>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection
