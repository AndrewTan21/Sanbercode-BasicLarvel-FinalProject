@extends('adminlte.master')
@section('content')
<div class="mt-3 ml-3 mr-3">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Create New Question</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/question/" method="POST">
        @csrf
            <div class="card-body">
                <!-- title -->
                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', '') }}" id="title" placeholder="Enter Title" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <!-- content -->
                <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" value="{{ old('content', '') }}" id="content" placeholder="Content" required>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <!-- tag -->
                <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control" value="{{ old('tag', '') }}" id="tag" placeholder="tag" required>
                @error('tag')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection