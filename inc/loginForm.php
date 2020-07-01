<link rel="stylesheet" href="res/assets/css/main.css" />
<style>
    p {
        text-align: center;
    }

    h1 {
        text-align: center;
    }

    h2 {
        text-align: center;
    }

    form {
        text-align: center;
    }
</style>
<div class="container">
    <div class="form_überschrift">
        <h2>Login</h2>
    </div>

    <div class="formular container">
        <form name="myForm" action="./utility/login.php" method="post">
            <div class="Formularfenster" Id="eltern">
                <div class="form-group container">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control container" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control container" placeholder="Password" required>
                </div>
                <div class="custom-control custom-checkbox container">
                    <input type="checkbox" name="stayLoggedIn" value="yes" class="custom-control-input container" id="stayLoggedIn">
                    <label class="custom-control-label" for="stayLoggedIn">Stay Logged in</label>
                </div>
                <button type="submit" name="login" id="login" class="btn btn-color">Login</button>
        </form>
    </div>
</div>
</div>