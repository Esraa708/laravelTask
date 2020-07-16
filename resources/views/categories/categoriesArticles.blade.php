@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Current articles at {{$category->name}} category</h1>
    <div class="row justify-content-center mb-4">
        @foreach($categoriesWithArticales as $article)
        <div class="col-md-3">
            <div class="card article-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h2>{{ $article->name}}</h2>
                        </div>
                        <div class="col-1">
                            <a href="{{url('/articles',$article->id)}}"> <span class="d-block mt-1"> <i class="fa fa-eye"></i> </span></a>
                        </div>
                        <div class="col-2">
                            <a href="{{url('/articles/'.$article->id.'/edit')}}"> <span class="d-block mt-1"> <i class="fa fa-edit"></i> </span></a>
                        </div>
                    </div>


                    <!-- <h3>
                        <a href="{{ url('/categories',$article->category->id) }}">{{$article->category->name}}</a>
                            </h3> -->

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
    {{ $categoriesWithArticales->links() }}
</div>
@endsection