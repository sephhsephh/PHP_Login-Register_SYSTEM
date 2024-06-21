<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <style>
        :root {
            --primary: ;
            --secondary: ;
            --light: ;
            --h2: #fff;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: url(./imgs/mainbg.png);
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 440px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .5);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0px 0px 30px rgba(0, 0, 0, .5);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: height .2s ease;
        }

        .wrapper.active {
            height: 520px;
        }

        .wrapper .form-box{
            width: 80%;
            padding: 40px;
        }


        .login {
            transition: transform .18s ease;
            transform: translateX(0);
        }

        .wrapper.active .login {
            transition: none;
            transform: translateX(-400px);
        }

        .register {
            position: absolute;
            transition: none;
            transform: translateX(400px);
            padding: 40px;
        }

        .wrapper.active .register {
            transition: transform .18s ease;
            transform: translateX(0);
        }

        .form-box h2 {
            font-size: 2em;
            color: var(--h2);
            text-align: center;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid var(--h2);
            margin: 30px 0;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1.1em;
            color: var(--h2);
            font-weight: 500;
            pointer-events: none;
            transition: all .5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: var(--h2);
            font-weight: 600;
            padding: 0 35px 0 5px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-background-clip: text;
            -webkit-text-fill-color: #ffffff;
            transition: background-color 5000s ease-in-out 0s;
            box-shadow: inset 0 0 0px 0px #23232329;
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            font-size: 1.2em;
            color: var(--h2);
            line-height: 57px;
        }

        .remember-forgot {
            font-size: .9em;
            color: var(--h2);
            font-weight: 500;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
        }

        .remember-forgot label input {
            accent-color: var(--h2);
            margin-right: 3px;
        }

        .remember-forgot a {
            color: var(--h2);
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: var(--h2);
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 800;
        }

        .login-register {
            font-size: .9em;
            color: var(--h2);
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px 0;
        }

        .login-register p a {
            color: var(--h2);
            font-weight: 600;
            text-decoration: none;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }

        /* .icon-close{
            position: absolute;
            top: 0;
            right: 0;
            width: 45px;
            height: 45px;
            background: var(--h2);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        .error {
            position: absolute;
            top: 0;
            color: red;
            font-size: 1.5em;
            width: 100%;
            text-align: center;
            background-color: rgba(255, 255, 255, .2);
            text-shadow: 1px 0px 5px #fff;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span> -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="includes/login.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn" id="login-btn">Sign in</button>
                <div class="login-register">
                    <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="includes/register.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn" id="register-btn">Sign Up</button>
                <div class="login-register">
                    <p>Already have an account?<a href="#" class="login-link">Sign In</a></p>
                </div>
            </form>
        </div>


    </div>

    <script>
        const wrapper = document.querySelector('.wrapper');
        const loginLink = document.querySelector('.login-link');
        const registerLink = document.querySelector('.register-link');

        registerLink.addEventListener('click', () => (
            wrapper.classList.add('active')
        ))
        loginLink.addEventListener('click', () => (
            wrapper.classList.remove('active')
        ))
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>