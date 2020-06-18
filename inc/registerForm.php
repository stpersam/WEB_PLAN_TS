<div class="form_überschrift">
    <h2>Registrieren</h2>
</div>

<div class="formular">
    <form name = "myForm" action="./utility/regValidate.php" method="post">
        <div class="Formularfenster" Id="eltern">
            <div class="form-group">
                <label for="anrede">Anrede:</label>
                <select name="anrede" class="custom-select mb-3">
                    <option value="herr" selected>Herr</option>
                    <option value="frau">Frau</option>
                </select>
            </div>
            <div class="form-group">
                <label for="vorname">Vorname:</label>
                <input type="text" name="vorname" class="form-control" placeholder="Vorname">
            </div>
            <div class="form-group">
                <label for="nachname">Nachname:</label>
                <input type="text" name="nachname" class="form-control" placeholder="Nachname">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" class="form-control" placeholder="adresse">
            </div>
            <div class="form-group">
                <label for="plz">PLZ:</label>
                <input type="number" name="plz" class="form-control" placeholder="plz" max="9999" minlength="4">
            </div>
            <div class="form-group">
                <label for="ort">Ort:</label>
                <input type="text" name="ort" class="form-control" placeholder="ort">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="passwordBest">Password Bestätigen:</label>
                <input type="password" name="passwordBest" class="form-control" placeholder="passwordBest" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" name="email" class="form-control" placeholder="email">
            </div>
            <button type="submit" name="registrieren" id="registrieren" class="btn btn-outline-secondary btn-secondary">Registrieren</button>
    </form>
</div>
</div>
