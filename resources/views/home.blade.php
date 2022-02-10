@extends('template.main')

@section('content-main')
    @if (Auth::check())
    <div>
        <h2>Book List
            @if (request()->get('search'))
                {{" - '".request()->get('search')."'"}}
            @endif
        </h2>
        <table class="w-100">
            <tr class="table-title">
                <td>Title</td>
                <td>Author</td>
            </tr>
            @foreach ($books as $item)
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
        {{-- pagination --}}
        <div class="justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </div>
    @else
        <h1>Find And Rent Your E-book Here!</h1>
    @endif
@endsection