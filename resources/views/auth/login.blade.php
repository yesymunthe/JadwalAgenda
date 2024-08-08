<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@700&display=swap">
    <style>
        body {
            background: #D9D9D9;
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: rgba(80, 48, 52, 0.8); 
            padding: 10px 20px; 
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .logo {
            height: 55px; 
        }
        .container {
            background: rgba(80, 48, 52, 0.3); 
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            padding: 20px;
            max-width: 650px; 
            margin: auto;
            margin-top: 70px; 
            position: relative;
        }
        h1 {
            color: rgba(80, 48, 52, 0.9); 
            margin-bottom: 30px;
            font-size: 2.5rem;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            font-family: 'Roboto', sans-serif; 
            font-weight: 700;
            text-align: center;
        }
        .form-group label {
            color: #000000; 
        }
        .form-control {
            background-color: rgba(248, 249, 250, 0.7); 
            border: 1px solid rgba(139, 69, 19, 0.8); 
        }
        .btn {
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 0; 
        }
        .btn-primary {
            background-color: rgba(80, 48, 52, 0.8); 
            border: none;
        }
        .btn-primary:hover {
            background-color: rgba(80, 48, 52, 0.8); 
        }
        .btn-secondary {
            background-color: rgba(80, 48, 52, 0.8);
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .button-group {
            display: flex;
            gap: 10px; 
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="/image/logo.png" alt="Logo Desa" class="logo">
    </div>
    <div class="container mt-5">
        <h1>Login Admin</h1>
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="button-group mt-3">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
