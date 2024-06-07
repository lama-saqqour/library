<!DOCTYPE html>
<html>
<head>
    <title>Библиотека</title>
</head>
<body>
    <div>
            <header>
                        @if (Route::has('login'))
                            <nav>
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                    >
                                        Log in
                                    </a>
                                    &nbsp;&nbsp;

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
                </div>
    <h1>Библиотека</h1>
    <ul>
        @foreach ($authors as $author)
            <li>
                <h3>
                <a href="{{ route('author.show', $author->id) }}">
                {{ $author->name }}
                </a>
            </h3>
                <ul>
                @foreach($author->books as $book) 
                    <li> <a href="{{ route('book.show', $book->id) }}">
                    {{ $book->title }}
                    </a> </li>
                @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>