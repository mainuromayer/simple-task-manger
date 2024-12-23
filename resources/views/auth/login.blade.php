<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Task Manager</title>
    <link rel="stylesheet" href="{{ asset('./css/milligram.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
</head>

<body>

    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
        <h3 style="font-weight: 500;">Simple Task Management</h3>
        <h2>Login</h2>
        @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
        @endif
        <form action="{{ route('login') }}" method="post" style="width: 500px;">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}">
            @error('password')
                <p style="color: red">{{ $message }}</p>
            @enderror
            
            <button type="submit">Login</button>
            <p>You didn't signup yet? <a style="font-weight: 500" href="{{ route('signup') }}">Sign Up</a></p>
        </form>
    </div>
</body>

</html>
