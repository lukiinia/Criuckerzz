<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In & Sign Up</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #fff;
      overflow: hidden;
    }

    .container {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      width: 768px;
      max-width: 100%;
      min-height: 520px;
      overflow: hidden;
      display: flex;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 50px;
    }

    .sign-up-container {
      left: 0;
      opacity: 0;
      z-index: 1;
    }

    .sign-in-container {
      left: 0;
      z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }

    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
    }

    form {
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      width: 100%;
    }

    h1 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    input {
      border: 1px solid #ddd;
      padding: 12px;
      margin: 8px 0;
      width: 100%;
      border-radius: 5px;
      font-size: 16px;
    }

    .primary-btn {
      background-color: #1b5e1c;
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 25px;
      width: 100%;
      margin: 8px 0;
      transition: 0.3s;
    }

    .primary-btn:hover {
      background-color: #146318;
    }

    .google-btn {
      background-color: #fff;
      color: #757575;
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      margin: 8px 0;
    }

    .overlay-panel .ghost {
  background-color: transparent;
  color: #ffffff; /* Text color */
  border: 1px solid #ffffff; /* White border */
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 25px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s, transform 0.3s;
}

.overlay-panel .ghost:hover {
  background-color: rgba(255, 255, 255, 0.1); /* Subtle background on hover */
  transform: scale(1.05); /* Slight scale on hover for effect */
}



    .google-btn img {
      width: 20px;
      height: 20px;
    }

    .separator {
      margin: 8px 0;
      width: 100%;
      height: 1px;
      background-color: #ddd;
    }
    

    .checkbox-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      margin: 10px 0;
      font-size: 14px;
    }

    .checkbox-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin: 10px 0;
  font-size: 12px; /* Small font size */
}

.checkbox-container label {
  display: flex;
  align-items: center;
  gap: 5px; /* Space between checkbox and text */
  cursor: pointer; /* Cursor pointer for better usability */
}

.checkbox-container input[type="checkbox"] {
  margin: 0;
}


    .forgot-password {
      color: #167019;
      text-decoration: none;
      font-size: 14px;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container.right-panel-active .overlay-container {
      transform: translateX(-100%);
    }

    .overlay {
      background: linear-gradient(to right, #1b5e1c, #167019);
      color: #ffffff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
      padding: 0 40px;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .overlay button {
      background-color: #fff;
      color: #757575;
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin: 8px 0;
    }

    .overlay button:hover {
      background-color: #f0f0f0;
    }

    .overlay h1 {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .overlay p {
      margin: 20px 0;
      font-size: 14px;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }

    .input-error {
      border: 2px solid #ff4d4d; /* Red color for error */
      animation: shake 0.3s ease;
    }

    .password-container {
  position: relative;
  width: 100%;
}

.password-container input {
  width: 100%;
  padding-right: 40px; /* Make room for the icon */
}

.toggle-password {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #999;
}


  </style>
</head>
<body>
  <div class="container" id="container">
    <!-- Sign Up Form -->
    <div class="form-container sign-up-container">
    <form action="register.php" method="POST">
    <h1>Buat akun</h1>
    <input type="text" username="username" placeholder="username" required />
    <input type="email" name="email" placeholder="Email" required />
    <div class="password-container">
      <input type="password" id="passwordSignUp" name="password" placeholder="Enter your password" required />
      <span class="toggle-password" onclick="togglePasswordVisibility('passwordSignUp', 'toggleIconSignUp')">
        <i id="toggleIconSignUp" class="fas fa-eye-slash"></i>
      </span>
</div>
      <button class="primary-btn">Daftar</button>

      <div class="separator"></div>
      <button class="google-btn" onclick="window.location.href='google-login.php'">
  <img src="google.svg" alt="Google Logo">
  Masuk dengan google
</button>

        </form>
</div>


    
    <!-- Sign In Form -->
<div class="form-container sign-in-container">
    <form id="signInForm" action="process_login.php" method="POST">
    <h1>Masuk</h1>
    <input type="email" name="email" placeholder="Email" required />
    <div class="password-container">
      <input type="password" id="passwordSignIn" name="password" placeholder="Enter your password" required />
      <span class="toggle-password" onclick="togglePasswordVisibility('passwordSignIn', 'toggleIconSignIn')">
        <i id="toggleIconSignIn" class="fas fa-eye-slash"></i>
      </span>
</div>
      <div class="checkbox-container">
        <label>
          <input type="checkbox" /> Ingat
        </label>
        <a href="#" class="forgot-password">Lupa Sandi</a>
      </div>
      <button class="primary-btn">Masuk</button>

      <div class="separator"></div>
      <button class="google-btn" onclick="window.location.href='http://localhost/Criuckerz/google-login.php'">
  <img src="google.svg" alt="Google Logo">
  masuk dengan google
</button>

        </form>
</div>

    
    <!-- Overlay -->
    <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Selamat datang kembali</h1>
            <p>silakan masuk dengan informasi pribadi Anda</p>
            <button class="ghost" id="signIn">Masuk</button>
          </div>
          <div class="overlay-panel overlay-right">
          <h1>Hallo, Teman</h1>
          <p>Masukkan detail Anda dan mulai perjalanan Anda bersama kami</p>            <button class="ghost" id="signUp">Daftar</button>
          </div>
        </div>
      </div>
    </div>

    <script>

function togglePasswordVisibility(passwordId, iconId) {
  const passwordInput = document.getElementById(passwordId);
  const toggleIcon = document.getElementById(iconId);
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.remove('fa-eye-slash');
    toggleIcon.classList.add('fa-eye');
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.remove('fa-eye');
    toggleIcon.classList.add('fa-eye-slash');
  }
}


        const signInButton = document.getElementById('signIn');
        const signUpButton = document.getElementById('signUp');
        const container = document.getElementById('container');
    
        signInButton.addEventListener('click', () => {
          container.classList.remove('right-panel-active');
        });
    
        signUpButton.addEventListener('click', () => {
          container.classList.add('right-panel-active');
        });
      
    
        function validatePassword() {
          const passwordInput = document.getElementById('password');
          const passwordValue = passwordInput.value;
    
          // Simulating an incorrect password check
          if (passwordValue !== 'correctPassword') {  // Replace 'correctPassword' with actual validation
            passwordInput.classList.add('input-error');
            setTimeout(() => {
              passwordInput.classList.remove('input-error');
            }, 300); // Remove error class after animation
          } else {
            // Continue with the form submission or further validation
            alert('Signed in successfully!');
          }
        }
      </script>
</body>
</html>
