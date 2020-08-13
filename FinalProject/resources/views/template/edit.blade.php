@extends('adminlte.master')
@section('content')
<div class="ml-3 mt-3"> 
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Questions {{$question->id}}</h3>
              </div>
              <form role="form" action="/questions/{{$question->id}}" method="POST">
              @csrf
              @method ('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Judul Pertanyaan</label>
                     <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $question->title) }}" placeholder="Enter Judul" required>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    <!-- <input type="text" class="form-control" id="judulpertanyaan" name="judulpertanyaan" placeholder="Enter Judul"> -->
              <!-- form start -->
                </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{ old('content', $question->content) }}" placeholder="Enter Content" required>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <!--<input type="text" class="form-control" id="isipertanyaan" name="isipertanyaan"  placeholder="Enter Isi">-->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>
@endsection