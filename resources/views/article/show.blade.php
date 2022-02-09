<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Article List</title>
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

        </div>
    <div class="pt-5 pb-3 d-flex justify-content-center">
      <div class="card w-50" style="width: 18rem;">

        <div class="card-body">
          <h3 class="card-title">{{$article->name}}</h5>
            <p class="card-text">{{$article->description}}</p>
            <a href="{{route('category.show',$article->cat_id)}}" class="btn btn-primary">{{$category}}</a>
        </div>
      </div>
    </div>

    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">

      <a class="btn btn-primary" href="{{route('article.list')}}">All Articles</a>
    </div>


  </main>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>