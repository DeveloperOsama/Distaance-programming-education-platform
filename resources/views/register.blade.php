<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>إنشاء حساب جديد</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">الاسم:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">تأكيد كلمة المرور:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">تسجيل</button>
    </form>
    <a href="{{ route('login') }}">لديك حساب بالفعل؟ تسجيل الدخول هنا</a>
@endsection
