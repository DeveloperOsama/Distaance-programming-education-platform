
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة طالب جديد</title>
</head>
<body>
    <h1>إضافة طالب جديد</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="name">اسم الطالب:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="class_id">الصف:</label>
        <select name="class_id" id="class_id" required>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">إضافة</button>
    </form>
    <a href="{{ route('students.index') }}">العودة إلى قائمة الطلاب</a>
</body>
</html>
