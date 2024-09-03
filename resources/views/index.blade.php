<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        ul{
            list-style-type: none;
            padding: 0;
        }
        li{
            padding: 8px;
            border: 1px solid #ccc;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1> Tasks List </h1>

    <input type="text" id="taskInput" placeholder="Add new task.....">
    <button onclick="addTask()">Add</button>
    <ul id="taskList"></ul>

    <script>
        async function fetchTask(){
            const response = await fetch('/api/tasks');
            const tasks = await response.json();
            const taskList = document.getElementById('taskList');

            taskList.innerHTML = '';

            tasks.forEach(task => {
                const li = document.createElement('li');
                li.textContent = task.description;

                taskList.appendChild(li);
            });
        }

        async function addTask(){
            const taskInput = document.getElementById('taskInput');
            const taskText = taskInput.value;

            if(taskText){
                await fetch('/api/tasks', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({description: taskText})
                });
                taskInput.value = '';
                fetchTask();
            }
        }
        fetchTask();
    </script>
</body>
</html>
