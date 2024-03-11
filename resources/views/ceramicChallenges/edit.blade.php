@extends('layout/template')
@section('title', 'Edit Ceramic Challenge | SocialClay')  


@section ('content') 

<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h2 class="text mb-4">Edit Ceramic Challenge</h2>
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-center">
                <form action="{{ url('ceramicChallenge/' . $ceramicChallenge->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="title" class="col-form-label"> Title:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="title" id="title" value="{{ $ceramicChallenge->title }}" required>
                    </div>
                </div>

                <div clas="mb-3 row">
                    <label for="description" class="col-sm-10 col-form-label">Description:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="description" id="description" value="{{ $ceramicChallenge->description }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="start_date" class="col-sm-10 col-form-label">Start Date:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $ceramicChallenge->start_date }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="end_date" class="col-sm-10 col-form-label">End Date:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $ceramicChallenge->end_date }}" required>
                    </div>
                </div>
        

                <div clas="mb-3 row">
            <button type="submit" class="btn btn-success rounded-pill" style="background-color: #C8AEFF;">Submit</button>
        </div>
            
    </form>
</div>

</div>
@endsection