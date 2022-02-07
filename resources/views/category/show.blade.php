<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
  <main class="container p-3">
    <div class="px-4 pt-5 my-5 text-center">
      <h1 class="display-4 fw-bold">{{$category->name}}</h1>
      <div class="col-lg-6 mx-auto">
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->name}}</td>
                    <td>
                    
                        <a class="btn btn-success" href="{{route('article.show', $article->id)}}">SHOW</a>
                        <a class="btn btn-warning" href="{{route('article.edit', $article->id)}}">EDIT</a>
                        <a class="btn btn-danger" href="{{route('article.deleteConfirm', $article->id)}}">DELETE</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">

          <a class="btn btn-primary" href="{{route('category.list')}}">All categories</a>
        </div>
      </div>
    </div>

  </main>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>