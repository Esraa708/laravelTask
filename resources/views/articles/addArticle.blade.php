<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <div class="container">
        <div class="row d-flex flex-column justify-content-center">
            <div class="offset-md-4 col-md-4">
                <form action=" {!! action('ArticleController@store') !!}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter article name" aria-describedby="helpId">
                        @error('name')
                        <small id="helpId" class="alert-danger form-control mt-1">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea name="content" id="content" cols="30" class="form-control" rows="10"></textarea>
                        @error('content')
                        <small id="helpId" class="alert-danger form-control mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category"></label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach ($categories as $category)
                            <option value={{$category->id }}>{{$category->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary form-control" onclick="clickAdd(e)">Add Article</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        //  function clickAdd(e){
        //      e.preventDefault();

        //     }
    </script>
</body>

</html>