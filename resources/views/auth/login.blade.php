<!DOCTYPE html>
<html>

<head>
    <title>Login & Registration Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/login.css','resources/css/app.css', 'resources/js/login.js'])
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cont">
        <div class="form sign-in">
            <h3>Sign In</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </label>
                <button class="submit" type="submit">Sign In</button>
            </form>
            <p class="forgot-pass">Forgot Password?</p>

            <div class="social-media">
                <ul>
                    <li>
                        <a href="{{ route('google.login') }}">
                            <img class="transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/Google.jpeg') }}" alt="Google">
                        </a>
                    </li>
                    <li><img class="transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/facebook.png') }}"></li>
                    <li><img class="transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/twitter.png') }}"></li>
                    <li><img class="transition-transform hover:scale-110" src="{{ asset('assets/frontend/images/instagram.png') }}"></li>
                </ul>
            </div>
        </div>

        <div class="sub-cont">
            <div class="img" style="background-image: url(assets/frontend/images/pexels-kindelmedia-7578984.jpg)" >
                <div class="img-text m-up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img-text m-in">
                    <h2>One of us?</h2>
                    <p>If you already have an account, just sign in.</p>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>
                    <span class="m-in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Sign Up</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <label>
                        <span>Name</span>
                        <input type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password">
                        @error('password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="password_confirmation">
                    </label>
                    <button type="submit" class="submit">Sign Up Now</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
