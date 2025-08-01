<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Night Vision Cinema | Login</title>
  <link rel="icon" href="/favicon.ico" />
  <meta name="description" content="Login or Register at Night Vision Cinema. Experience movies like never before.">
  <meta name="keywords" content="Cinema, Login, Register, Movie, Night Vision">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;600&display=swap');

    :root {
      --primary: #0f0e17;
      --secondary: #1e1e2c;
      --accent: #7f5af0;
      --text: #fffffe;
      --highlight: #2cb67d;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--primary);
      color: var(--text);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .cinema-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background: linear-gradient(rgba(15, 14, 23, 0.9), rgba(15, 14, 23, 0.95)),
        url('https://placehold.co/1920x1080?text=Night+Vision+Cinema') center/cover no-repeat;
    }

    .logo {
      font-family: 'Orbitron', sans-serif;
      text-transform: uppercase;
      letter-spacing: 0.2rem;
      text-shadow: 0 0 10px var(--accent), 0 0 20px rgba(127, 90, 240, 0.5);
    }

    .auth-card {
      background: var(--secondary);
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5),
        0 0 15px rgba(127, 90, 240, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .form-input {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: var(--text);
    }

    .form-input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(127, 90, 240, 0.3);
      background: rgba(255, 255, 255, 0.1);
    }

    .btn-primary {
      background: var(--accent);
      color: white;
    }

    .btn-primary:hover {
      background: #6f4ed8;
    }

    .nav-link.active {
      color: var(--highlight);
    }

    .error-message {
      color: #ff3860;
    }

    .floating-label {
      position: absolute;
      left: 1rem;
      top: 0.75rem;
      color: rgba(255, 255, 255, 0.6);
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .form-input:focus + .floating-label,
    .form-input:not(:placeholder-shown) + .floating-label {
      transform: translateY(-1.25rem) scale(0.85);
      color: var(--accent);
    }

    @keyframes flicker {
      0%, 19.999%, 22%, 62.999%, 64%, 64.999%, 70%, 100% {
        opacity: 1;
      }
      20%, 21.999%, 63%, 63.999%, 65%, 69.999% {
        opacity: 0.4;
      }
    }

    .flicker-effect {
      animation: flicker 3s infinite;
    }

    .toggle-password {
      position: absolute;
      right: 1rem;
      top: 1rem;
      cursor: pointer;
      color: rgba(255, 255, 255, 0.5);
    }

    .toggle-password:hover {
      color: var(--accent);
    }
  </style>
</head>
<body>
  <div class="cinema-bg"></div>
  <div class="container mx-auto px-4 py-12 min-h-screen flex flex-col justify-center">
    <div class="text-center mb-12">
      <h1 class="logo text-4xl md:text-5xl font-bold flicker-effect">Night Vision Cinema</h1>
      <p class="mt-4 text-gray-400">Experience movies like never before</p>
    </div>

    <div class="max-w-md mx-auto auth-card p-8">
      <div class="flex justify-center space-x-8 mb-8">
        <button id="loginTab" class="nav-link active text-lg font-medium">Login</button>
        <button id="registerTab" class="nav-link text-lg font-medium">Register</button>
      </div>

      <!-- Login Form -->
      <form id="loginForm" class="space-y-6"  novalidate>
        <div class="relative">
          <input type="email" id="loginEmail" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Login Email">
          <label for="loginEmail" class="floating-label">Email</label>
        </div>

        <div class="relative">
          <input type="password" id="loginPassword" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Login Password">
          <label for="loginPassword" class="floating-label">Password</label>
          <span class="toggle-password" onclick="togglePassword('loginPassword')">👁️</span>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center text-sm text-gray-400">
            <input type="checkbox" id="rememberMe" class="mr-2 rounded border-gray-300 text-accent focus:ring-accent">
            Remember me
          </label>
          <a href="#" class="text-sm text-accent hover:underline">Forgot password?</a>
        </div>

        <button type="submit" class="btn-primary w-full py-3 rounded-lg font-medium">Sign In</button>
      </form>

      <!-- Register Form -->
      <form id="registerForm" class="space-y-6 hidden" novalidate>
        <div class="relative">
          <input type="text" id="registerName" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Full Name">
          <label for="registerName" class="floating-label">Full Name</label>
        </div>

        <div class="relative">
          <input type="email" id="registerEmail" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Register Email">
          <label for="registerEmail" class="floating-label">Email</label>
        </div>

        <div class="relative">
          <input type="password" id="registerPassword" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Register Password">
          <label for="registerPassword" class="floating-label">Password</label>
          <span class="toggle-password" onclick="togglePassword('registerPassword')">👁️</span>
        </div>

        <div class="relative">
          <input type="password" id="confirmPassword" class="form-input w-full px-4 py-3 rounded-lg" placeholder=" " required aria-label="Confirm Password">
          <label for="confirmPassword" class="floating-label">Confirm Password</label>
          <span class="toggle-password" onclick="togglePassword('confirmPassword')">👁️</span>
        </div>

        <label class="flex items-center text-sm text-gray-400">
          <input type="checkbox" id="terms" class="mr-2 rounded border-gray-300 text-accent focus:ring-accent">
          I agree to the <a href="#" class="text-accent ml-1 hover:underline">Terms</a>
        </label>

        <button type="submit" class="btn-primary w-full py-3 rounded-lg font-medium">Create Account</button>
        <div id="registerError" class="error-message text-center text-sm"></div>
      </form>
    </div>

    <div class="text-center mt-8 text-gray-500 text-sm">
            <p>© 2023 Night Vision Cinema. All rights reserved.</p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const loginTab = document.getElementById('loginTab');
      const registerTab = document.getElementById('registerTab');
      const loginForm = document.getElementById('loginForm');
      const registerForm = document.getElementById('registerForm');
      const registerError = document.getElementById('registerError');

      function showLogin(){
        window.location.href="cinema.php"
      }

      function showRegister() {
        loginTab.classList.remove('active');
        registerTab.classList.add('active');
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        loginForm.reset();
      }

      loginTab.addEventListener('click', showLogin);
      registerTab.addEventListener('click', showRegister);

      loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value;

        if (!validateEmail(email)) {
          alert('Please enter a valid email address.');
          return;
        }

        if (!password) {
          alert('Please enter your password.');
          return;
        }

        fetch('login.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            email,
            password,
          }),
        })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              alert('Welcome back, ' + data.name + '!');
              window.location.href="cinema.php"
              // window.location.href = '/dashboard'; // or any protected route
            } else {
              alert(data.message);
            }
  });

        // window.location.href = '/dashboard';
      });

      registerForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.getElementById('registerName').value.trim();
        const email = document.getElementById('registerEmail').value.trim();
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const terms = document.getElementById('terms').checked;

        registerError.textContent = '';

        if (!name || !email || !password || !confirmPassword) {
          registerError.textContent = 'Please fill in all fields';
          return;
        }

        if (!validateEmail(email)) {
          registerError.textContent = 'Please enter a valid email';
          return;
        }

        if (password.length < 8) {
          registerError.textContent = 'Password must be at least 8 characters';
          return;
        }

        if (password !== confirmPassword) {
          registerError.textContent = 'Passwords do not match';
          return;
        }

        if (!terms) {
          registerError.textContent = 'You must accept the terms';
          return;
        }

        fetch('register.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
  },
  body: new URLSearchParams({
    name,
    email,
    password,
  }),
})
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      registerForm.innerHTML = `
        <div class="text-center py-8">
          <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <h3 class="mt-4 text-xl font-medium text-gray-300">Account Created!</h3>
          <p class="mt-2 text-gray-400">A verification email has been sent to ${email}.</p>
		  <form action="index.php" method="post">
          <input type="submit" onclick="window.location.href='cinema.php'" class="btn-primary mt-6 px-6 py-2 rounded-lg font-medium" value="Continue to Login" name="Continue to Login"> 
		  </form>
        </div>
      `;
    } else {
      registerError.textContent = data.message;
    }
  });

      });

      function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email.toLowerCase());
      }

      window.togglePassword = function (id) {
        const input = document.getElementById(id);
        if (input.type === 'password') {
          input.type = 'text';
        } else {
          input.type = 'password';
        }
      };
    });
  </script>
</body>
</html>
