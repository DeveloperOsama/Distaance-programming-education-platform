<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- رابط إلى ملف CSS الخاص بك -->
</head>
<body>
    <div class="container">
        <header>
            <h1>منصة التعلم عن بُعد</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li><a href="{{ route('register') }}">تسجيل</a></li>
                </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} منصة التعلم عن بُعد. جميع الحقوق محفوظة.</p>
        </footer>
    </div>
</body>
</html>
