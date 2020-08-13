@extends('adminlte.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$question->title}}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{$question->content}}</h3>        
      </div>
      <div class="card-header">
        <h3 class="card-title">{{$question->tag}}</h3>        
      </div>
      
      <!-- /.card-body -->
    
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>

@endsection