@extends('dashboard.layouts.master')
@section('title')
<title>Datatable - store</title>
@endsection

@section('custom-styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">DataTables</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                  <td>{{$article->name}}</td>
                  <td>{{$article->category->name}}</td>
                  <td>

                    <a class="btn btn-success" href="{{route('article.show', $article->id)}}">SHOW</a>
                    <a class="btn btn-warning" href="{{route('article.edit', $article->id)}}">EDIT</a>
                    <a class="btn btn-danger" href="{{route('article.deleteConfirm', $article->id)}}">DELETE</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Actions</th>
                </tr>
              </tfoot>
            </table>
            <div class="d-flex justify-content-center">

              {{$articles->links()}}

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                  <td>{{$article->name}}</td>
                  <td>{{$article->category->name}}</td>
                  <td>

                    <a class="btn btn-success" href="{{route('article.show', $article->id)}}">SHOW</a>
                    <a class="btn btn-warning" href="{{route('article.edit', $article->id)}}">EDIT</a>
                    <a class="btn btn-danger" href="{{route('article.deleteConfirm', $article->id)}}">DELETE</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Actions</th>
                </tr>
              </tfoot>
            </table>
            <div class="d-flex justify-content-center">

              {{$articles->links()}}

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('custom-scripts')
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}">

</script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}">

</script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}">

</script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection