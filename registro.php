<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member's Club</title>
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/registro.css">
</head>
<body>
    <header>
        <!-- Top navigation bar -->
        <div class="top-nav">
            <div class="left">
                <img src="IMG/logo.jpg" alt="Logo" class="logo">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search for Products, brands and more...">
                <button><i class="fa fa-search"></i></button>
            </div>
            <div class="right">
                <span class="account"><i class="fa fa-user"></i> Account:</span>
                <button class="login-btn" onclick="window.location.href='Login.html'">Login</button>
            </div>
        </div>

        <!-- Bottom navigation bar -->
        <nav class="bottom-nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="Buy_Membership.html">Membership</a></li>
                <li><a href="paginaPersonal.html">My Account</a></li>
            </ul>
        </nav>
    </header>

    <section class="registration-section">
        <button class="back-button" onclick="window.location.href='Buy_Membership.html'">Back</button>
        <h2>Set up your New Membership</h2>
        <p>Please fill out the main member's information to start enjoying our exclusive club benefits.</p>
        <p>If you had a Membership before, you can <a href="#">renew your membership here</a></p>
    
        <form class="membership-form" id="combinedForm">
            <h3>Membership Information</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">* Name</label>
                    <input type="text" id="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">* Last Name</label>
                    <input type="text" id="lastName" required>
                </div>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                    <label for="country">* Country</label>
                    <input type="text" id="country" value="El Salvador" disabled>
                </div>
                <div class="form-group">
                    <label for="club">* Preferred Membership</label>
                    <select id="club">
                        <option value="Diamond">Diamond</option>
                        <option value="Platinum">Platinum</option>
                        <option value="Business">Business</option>
                        <option value="Business Platinum">Business Platinum</option>
                    </select>
                </div>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                    <label for="email">* Email</label>
                    <input type="email" id="email" required>
                </div>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                    <label for="password">* Create Password</label>
                    <input type="password" id="password" required>
                </div>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                    <label for="idNumber">* Government ID Number</label>
                    <input type="text" id="idNumber" required maxlength="9">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">* Phone Number</label>
                    <div class="phone-input">
                        <span class="flag-icon">🇸🇻</span>
                        <input type="text" id="phoneNumber" placeholder="Phone Number" required maxlength="8">
                    </div>
                </div>
            </div>

            <h3>Payment Method</h3>
            <button type="button" class="add-card-button">+ Add new card</button>

            <div class="form-group">
                <label for="cardNumber">Card number</label>
                <input type="text" id="cardNumber" placeholder="Card number" required>
            </div>

            <div class="form-group">
                <label for="cardName">Name on card</label>
                <input type="text" id="cardName" placeholder="Name on card" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="expirationDate">Expiration Date</label>
                    <input type="text" id="expirationDate" placeholder="MM / YY" required>
                </div>
                <div class="form-group">
                    <label for="securityCode">Security Code (CVV/CVC)</label>
                    <input type="text" id="securityCode" placeholder="CVV/CVC" required>
                </div>
            </div>

            <button type="submit" id="submitBtn">Submit</button>
        </form>
    </section>

    <script>

document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault(); 
        
        // Obtener todos los valores
        const userData = {
            nombre: document.getElementById('firstName').value,
            apellido: document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            telefono: document.getElementById('phoneNumber').value,
            id: document.getElementById('idNumber').value,
            membresia: document.getElementById('club').value // Añadimos la membresía
        };
        
        // Guardar todos los datos en localStorage
        localStorage.setItem('userData', JSON.stringify(userData));
        
        alert('Usuario creado exitosamente');
        window.location.href = 'paginaPersonal.html';

        });
        
document.getElementById("combinedForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Capturar datos de usuario
    const nombre = document.getElementById("firstName").value;
    const apellido = document.getElementById("lastName").value; // Si quieres usarlo
    const correo = document.getElementById("email").value;
    const contrasena = document.getElementById("password").value;
    const telefono = document.getElementById("phoneNumber").value;

    // Capturar datos de la tarjeta
    const numero_tarjeta = document.getElementById("cardNumber").value;
    const nombre_tarjeta = document.getElementById("cardName").value;
    const expiracion_tarjeta = document.getElementById("expirationDate").value;
    const codigo_seguridad = document.getElementById("securityCode").value;

    // Crear formulario invisible
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "./php/registro.php";

    // Añadir campos
    const fields = {
        nombre, correo, contrasena, telefono, 
        cardNumber: numero_tarjeta, 
        cardName: nombre_tarjeta, 
        expirationDate: expiracion_tarjeta, 
        securityCode: codigo_seguridad
    };
    
    for (const key in fields) {
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = fields[key];
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
});
</script>

</body>

<footer class="footer">
    <p>&copy; 2024 Members Club. Todos los derechos reservados.</p>
</footer>

</html>