@extends('template.main')

@section('content-main')
   <div class="d-flex justify-content-center mt-3">
        <div class="w-100">
                <div>
                    {{$user->firstname." ".(($user->middlename)?$user->middlename." ":"").$user->lastname}}    
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('account.update', [$user->id]) }}">
                        {{ csrf_field() }}
                        @method('patch')
                        <select name="role">
                            <option value="admin" {{ ($user->role=="admin")? "selected" : "" }}>Admin</option>
                            <option value="user" {{ ($user->role=="user")? "selected" : "" }}>User</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
        </div>
    </div>
@endsection