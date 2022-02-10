@extends('template.main')

@section('content-main')
        @foreach ($books as $item)
            @if ($loop->first)
            <h2>Book List - Category: {{$item->category->category}} </h2>
            <table class="w-100">
                <tr class="table-title">
                    <td>Title</td>
                    <td>Author</td>
                </tr>
            @endif
            <tr>
                <td>    
                    <a href="/book/{{ $item->id }}">{{ $item->title }}</a>
                </td>
                <td>
                    {{ $item->detail->author }}
                </td>
            </tr>       
        @endforeach
    </table>
@endsection