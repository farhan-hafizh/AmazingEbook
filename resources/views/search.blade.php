@extends('template.main')

@section('content-main')
    <h2>Book List</h2>
    <table class="w-100">
        <tr class="table-title">
            <td>Title</td>
            <td>Author</td>
        </tr>
        @foreach ($books as $item)
        <tr>
            <td>
                <a href="/book/{{ $item->id }}">{{ $item->book->title }}</a>
            </td>
            <td>
                {{ $item->author }}
            </td>
        </tr>       
        @endforeach
    </table>
@endsection