<!DOCTYPE html>
<head>
    <title>Добавить книгу</title>
</head>
<body>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Добавить книгу
                </h2>
                <br/>
                <form action="{{ route('book.store') }}" method="post">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Название книги')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="author_id" :value="__('Автор книги')" />
                        <select id="author_id" name="author_id" class="block mt-1 w-full">
                            <option value=""></option>
                            @foreach($authors as $author) 
                                <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Описание книги')" />
                        <textarea class="form-control" id="description" name="description" rows="10" required></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Создать книгу</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>