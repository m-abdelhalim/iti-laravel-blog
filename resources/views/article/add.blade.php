<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add article</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <main class="container p-3">

        <div class="d-flex w-50 justify-content-between">
            <span class="h3">Welcome
                <span class="h3 fw-bold">
                    {{auth()->user()->name}}

                </span>
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-secondary" type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>

            <a class="btn btn-primary" href="{{route('article.list')}}">All Articles</a>
        </div>

        <div class="px-4 pt-5 my-5 text-center">
            <div class="col-lg-6 mx-auto">
                <form method="post" action="{{route('article.save')}}">
                    @csrf

                    <div class="form-group d-flex p-3">
                        <label class="w-25" for="name">Article title:</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="awesome title" value="{{old('name')}}">


                    </div>
                    @error('name')
                    <p id="nameHelp" class="form-text text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <div class="form-group d-flex p-3">
                        <label class="w-25" for="name">Category:</label>

                        <select name="category" class="form-select">
                            <option>Please select category</option>
                            @foreach($categories as $category)
                            <option {{$category->id == old('category') ? 'selected=selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                    </div>
                    @error('category')
                    <p id="nameHelp" class="form-text text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <div class="form-group d-flex p-3">
                        <label class="w-25" for="name">Article content:</label>
                        <textarea name="description" id="description" cols="50" rows="10" placeholder="What's on your mind?">
                        {{old('description')}}
                        </textarea>

                    </div>
                    @error('description')
                    <p id="nameHelp" class="form-text text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <div class="form-group p-5">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </main>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>