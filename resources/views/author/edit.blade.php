<!DOCTYPE html>
<head>
<title>Обновить автора</title>
</head>
<body>
    <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Обновить автора
            </h2>
            <br/>
        <form action="{{ route('author.update', $author->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="name" :value="__('Имя')" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $author->name) }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Обновить автора</button>
        </form>
        
        </div>
    </div>
    </div>
</body>
</html>