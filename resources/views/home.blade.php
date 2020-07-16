@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Current articles</h1>
    <div class="row justify-content-center mb-4">

        @foreach($articles as $article)
        <div class="col-md-3">
            <div class="card article-card">
                <div class="card-header">
                    <h2>{{ $article->name}}</h2>
                    <h3>
                        <a href="{{ url('/categories',$article->category->id) }}">{{$article->category->name}}</a>
                    </h3>

                </div>

                <div class="card-body body">

                    <p>{{$article->content}}</p>


                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
<div class="d-flex flex-column align-items-center justifiy-content-center">
    {{ $articles->links() }}
</div>
@endsection