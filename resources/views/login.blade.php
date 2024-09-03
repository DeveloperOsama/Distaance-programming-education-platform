<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>تسجيل الدخول</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">تسجيل الدخول</button>
    </form>
    <a href="{{ route('register') }}">ليس لديك حساب؟ سجل هنا</a>
@endsection
