<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h2>LOGIN LIBRARY MANAGEMENT SYSTEM </h2>
    <form method="POST" action="/login">
        @csrf
        <label for="name">username:</label>
        <input type="text" name="u" required><br>

        <label for="password">Password:</label>
        <input type="password" name="p"  required><br>
        
        <button type="submit">Login</button>
         <button><a href="/register">register</a></button>

    </form>
</body>
</html>