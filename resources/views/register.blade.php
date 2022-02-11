@extends('template.main')

@section('content-main')
<form method="POST" action="/auth/register" enctype="multipart/form-data">
    @csrf
    <div>
        First Name
        <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}">
        @error('firstname')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Middle Name
        <input class="form-control"  type="text" name="middlename" value="{{ old('middlename') }}">
      @error('middlename')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Last Name
        <input class="form-control"  type="text" name="lastname" value="{{ old('lastname') }}">
        @error('lastname')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Email
        <input class="form-control"  type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Gender
        <label><input name="gender" type="radio" value="male">male </label>
        <label><input name="gender" type="radio" value="female">female</label>
        @error('gender')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Role
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        @error('role')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Password
        <input class="form-control"  type="password" name="password">
        @error('password')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div>
        Display Picture
        <input class="form-control"  type="file" name="picture">
        @error('picture')
        <div class="text-danger">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </div>
    <div class="d-flex flex-row-reverse">
        <a href="/login">Already have an account?</a>       
    </div>
</form>
@endsection
