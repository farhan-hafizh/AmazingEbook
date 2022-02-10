@extends('template.main')

@section('content-main')
   <div class="d-flex justify-content-center mt-3">
        <div class="w-100">
            <table class="w-100 table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            @foreach ($rent as $item)
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <td>
                    [{{$item->book[0]->title}}]    
                </td>
                <td>
                    <form method="POST" action="{{ route('rent.delete', [$item->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ route('rent.submit')}}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
@endsection