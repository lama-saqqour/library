<!DOCTYPE html>
<html>
<head>
    <title>Список книг</title>
</head>
<body>
    <h1>Список книг</h1>
    <ul>
        @foreach ($books as $book)
            <li>
                <h3>
                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">
                    {{ $book->title }}
                    </a> 
                </h3>
                <h4>Автор: {{ $book->author->name }}</h4>
                
            </li>
        @endforeach
    </ul>
    <br/>
    @if ( Gate::allows('create-book')) 
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm">{{ __('Создать новый') }}</a>
                </div>
            </div>
            @endif
</body>
</html>