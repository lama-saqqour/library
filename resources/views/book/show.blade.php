<!DOCTYPE html>
<html lang="ru">
<head>
</head>
<body>
    <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Книга
            </h2>
            <br/>
            <h3>{{ $book->title }}</h3>
            <h4>{{ $book->author->name }}</h4>
            <div><p>{{ $book->description }}</p></div>
            <br/>
            @if ( Gate::allows('update-book')) 
            <div class="row">
                <div class="col-6" style="float:left;">
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary btn-sm">{{ __('Редоктировать') }}</a>
                </div>
                <div class="col-6" style="float:left; margin-left: 50px;">
                    <form action="{{ route('book.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Удалить')}}</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="float:left; margin-left: 150px;">
                    <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm">{{ __('Создать новый') }}</a>
                </div>
            </div>
            @endif
        
    </div>
    </div>
</div>
</body>
</html>