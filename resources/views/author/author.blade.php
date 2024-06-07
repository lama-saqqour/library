<!DOCTYPE html>
<html>
<head>
    <title>Список авторов</title>
</head>
<body>
    <h1>Список авторов</h1>
    <ul>
        @foreach ($authors as $author)
            <li>
                <h3>
                    <a href="{{ route('author.show', $author->id) }}" class="btn btn-primary btn-sm">
                        {{ $author->name }} 
                    </a>
                </h3>
                <h4>количество книг: {{ $author->books_count }}</h4>
            </li>
        @endforeach
    </ul>
    <br/>
    @if ( Gate::allows('create-book')) 
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('author.create') }}" class="btn btn-primary btn-sm">{{ __('Создать новый') }}</a>
                </div>
            </div>
            @endif
</body>
</html>