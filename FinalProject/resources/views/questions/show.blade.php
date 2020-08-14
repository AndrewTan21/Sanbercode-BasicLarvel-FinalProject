@extends('adminlte.master')
@section('content')

<div class="mt-3 ml-3 mr-3">
  <div class="card card-primary">
      <div class="card-header">
      <h3 class="card-title">Show Page</h3>
      </div>
      
          <div class="card-body">
              <!-- title -->
              <div class="form-group">
              <label for="title">Title</label>
              <div class="card"> {{$question->title}}</div>
              </div>
              <!-- content -->
              <div class="form-group">
              <label for="content">Content</label>
              <div class="card"> {!!$question->content!!}</div> 
              </div>
              <!-- tag -->
              <div class="form-group">
              <label for="tag">Tag</label>
              <div class="card"> {{$question->tag}}</div>
              </div>
          </div>
      <!-- /.card-body -->
      </form>
  </div>
</div>
  </section>

@endsection