<!DOCTYPE html>
<head>
<title>Редактировать книгу</title>
</head>
<body>
    <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Редактировать книгу
            </h2>
            <br/>
            <form action="{{ route('book.update', $book->id) }}" method="post">
            @csrf
            @method('PUT')
            <br>
            <div>
                <x-input-label for="title" :value="__('Название книги')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $book->title) }}" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="author_id" :value="__('Автор книги')" />
                <select id="author_id" name="author_id" class="block mt-1 w-full">
                    <option value="" >{{ old('author_id', $book->author->name) }}</option>
                    <option value=" "> </option>
                    @foreach($authors as $author) 
                        @if ($author->id !== $book->author_id)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <x-input-label for="description" :value="__('Описание книги')" />
                <textarea class="form-control" id="description" name="description" value="" rows="10" required>{{ old('description', $book->description) }}</textarea>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Обновить книгу</button>
        </form>
        
        </div>
    </div>
    </div>
</body>
</html>