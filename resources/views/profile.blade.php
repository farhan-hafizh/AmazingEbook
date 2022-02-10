@extends('template.main')

@section('content-main')
<div class="d-flex">
    <div class="w-25 mr-4">
        <img class="card-img" src="{{ asset('profile/img/'.$user->picture) }}" alt="">
    </div>
      <div class="align-self-stretch w-75">
          <form method="POST" action="/profile/edit" enctype="multipart/form-data">
              @csrf
              <div>
                  First Name
                  <input class="form-control" type="text" name="firstname" value="{{ $user->firstname }}">
                  @error('firstname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Middle Name
                  <input class="form-control"  type="text" name="middlename" value="{{ $user->middlename }}">
                  @error('middlename')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Last Name
                  <input class="form-control"  type="text" name="lastname" value="{{ $user->lastname }}">
                  @error('lastname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Email
                  <input class="form-control"  type="email" name="email" value="{{ $user->email }}">
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Gender
                  <label><input name="gender" type="radio" value="male" {{ ($user->gender=="male")? "checked" : "" }}> Male </label>
                  <label><input name="gender" type="radio" value="female" {{ ($user->gender=="female")? "checked" : "" }}> Female</label>
                  @error('gender')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Role
                  <select name="role" disabled>
                      <option value="admin" {{ ($user->role=="admin")? "selected" : "" }}>Admin</option>
                      <option value="user" {{ ($user->role=="user")? "selected" : "" }}>User</option>
                  </select>
                  @error('role')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Password
                  <input class="form-control"  type="password" name="password">
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div>
                  Display Picture
                  <input class="form-control"  type="file" name="picture">
                  @error('picture')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              </div>
              <div class="mt-4">
                  <button type="submit" class="btn btn-primary w-100">Save</button>
              </div>
          </form>
      </div>
</div>
@endsection
