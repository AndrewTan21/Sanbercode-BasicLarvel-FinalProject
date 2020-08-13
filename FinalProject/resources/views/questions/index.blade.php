@extends('adminlte.master')
@section('content')
<div class="mt-3 ml-3 mr-3">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <a href="{{ route('question.create') }}" class="btn btn-primary mb-3" style="margin-bottom: 1.25rem;">Create New Question</a>
            <table id="example1" class="table table-bordered">
                <thead>                  
                <tr>
                    <th style="width: 30px">#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Tag</th>
                    <th style="width: 250px">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($questions as $key => $question)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $question->title }}</td>
                        <td>{!! $question->content !!}</td>
                        <td>{{ $question->tag }}</td>
                        <td style="display: flex; border: unset;">
                            <a href="{{ route('question.show', ['question' => $question->id ]) }}" class="btn btn-sm btn-info mr-1" style="width: 33.33%; margin-right: 10px">Show</a>
                            <a href="{{ route('question.edit', ['question' => $question->id ]) }}" class="btn btn-sm btn-info mr-1" style="width: 33.33%; margin-right: 10px">Edit</a>
                            <form action="{{ route('question.destroy', ['question' => $question->id ]) }}" method="POST" style="width: 33.33%;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" style="width: 100%; margin-right: 10px">
                            </form>
                        </td>
                    </tr>
                
                @empty
                <tr>
                    <td colspan="5" align="center">No Questions</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
//   $(function () {
//     $("#example1").DataTable();
//   });
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>
@endpush('script')
