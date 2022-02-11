@extends('template.main')

@section('content-main')
   <div class="d-flex justify-content-center mt-3">
        <div class="w-100">
            <table class="w-100 table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Account</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
            @foreach ($users as $item)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>
                    {{$item->firstname." ".(($item->middlename)?$item->middlename." ":"").$item->lastname." - ".$item->role}}    
                </td>
                <td>
                    <a href="/update/role/{{$item->id}}" class="btn btn-primary">Update</a>
                    {{-- <form method="POST" action="{{ route('account.update', [$item->id]) }}">
                        {{ csrf_field() }}
                        @method('patch')
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form> --}}
                </td>
                <td>
                    <form method="POST" action="{{ route('account.delete', [$item->id]) }}">
                        {{ csrf_field() }}
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection