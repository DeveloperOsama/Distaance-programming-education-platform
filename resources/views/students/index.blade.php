
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الطلاب</title>
</head>
<body>
    <h1>قائمة الطلاب</h1>
    <a href="{{ route('students.create') }}">إضافة طالب جديد</a>
    <table border="1">
        <thead>
            <tr>
                <th>اسم الطالب</th>
                <th>البريد الإلكتروني</th>
                <th>الصف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->classes->name }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">تعديل</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
