<script>
    function check_pass() {
        if (document.getElementById('password').value == document.getElementById('passwordBest').value) {
            document.getElementById('registrieren').disabled = false;
        } else {
            document.getElementById('registrieren').disabled = true;
        }
    }
</script>
<link rel="stylesheet" href="res/assets/css/main.css" />
<div class="container">
    <div class="form_überschrift">
        <h2>Register</h2>
    </div>
    <!--Form to get the data of the User and validate it -->
    <div class="formular">
        <form name = "myForm" action="./utility/regValidate.php" method="post">
            <div class="Formularfenster" Id="eltern">
                <div class="form-group">
                    <label for="anrede">Salutation:</label>
                    <select name="anrede" class="custom-select mb-3">
                        <option value="Mr" selected>Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="vorname">First Name:</label>
                    <input type="text" name="vorname" class="form-control" placeholder="Max">
                </div>
                <div class="form-group">
                    <label for="nachname">Second Name:</label>
                    <input type="text" name="nachname" class="form-control" placeholder="Mustermann">
                </div>
                <div class="form-group">
                    <label for="adresse">Adress:</label>
                    <input type="text" name="adresse" class="form-control" placeholder="adress">
                </div>
                <div class="form-group">
                    <label for="plz">PLZ:</label>
                    <input type="number" name="plz" class="form-control" placeholder="1234" max="9999" minlength="4" required>
                </div>
                <div class="form-group">
                    <label for="ort">Place:</label>
                    <input type="text" name="ort" class="form-control" placeholder="place">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="passwordBest">Confirm Password:</label>
                    <input type="password" id="passwordBest" name="passwordBest" class="form-control" onchange="check_pass();" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <button type="submit" name="registrieren" id="registrieren" class="btn btn-color">Register</button>
        </form>
    </div>
    </div>
</div>
