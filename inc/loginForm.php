<div class="container">
    <div class="form_überschrift">
        <h2>Login</h2>
    </div>

    <div class="formular">
        <form name = "myForm" action="./utility/login.php" method="post">
            <div class="Formularfenster" Id="eltern">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="stayLoggedIn" value="yes" class="custom-control-input" id="stayLoggedIn">
                    <label class="custom-control-label" for="stayLoggedIn">Stay Logged in</label>
                </div>
            <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
        </form>
    </div>
    </div>
</div>