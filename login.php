<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matcha.cha</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 23rem;
        }

        .character {
            width: 150px;
            height: 100px;
            margin: 20px auto;
            position: relative;
        }

        input {
            width: 100%;
            padding: 5px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 24px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-custom {
            background-color: #7E8C69;
            border-color: #7E8C69;
            color: white;
        }

        .btn-custom:hover {
            background-color: #6d7b5a;
            border-color: #6d7b5a;
            color: white;
        }

        a {
            color: #7E8C69;
        }

        a:hover {
            color: #6d7b5a;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="character">
            <svg viewBox="0 0 200 100">
                <g class="eyes">
                    <circle cx="80" cy="50" r="15" fill="white" stroke="#333" stroke-width="3" />
                    <circle cx="120" cy="50" r="15" fill="white" stroke="#333" stroke-width="3" />

                    <circle class="pupil" cx="80" cy="50" r="7" fill="#333" />
                    <circle class="pupil" cx="120" cy="50" r="7" fill="#333" />
                </g>
            </svg>
        </div>

        <div class="login-form">
            <h3 class="text-center mb-4">Log In</h3>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') { ?>
                <div class="alert alert-danger d-flex align-items-center small" style="height:40px;" role="alert">
                    Invalid username or password
                </div>
            <?php } elseif (isset($_GET['success']) && $_GET['success'] == 'registered') { ?>
                <div class="alert alert-success d-flex align-items-center small" style="height:40px;" role="alert">
                    Account successfully created
                </div>
            <?php } elseif (isset($_GET['message']) && $_GET['message'] == 'loggedout') { ?>
                <div class="alert alert-warning d-flex align-items-center small" style="height:40px;" role="alert">
                    You have been logged out
                </div>
            <?php } ?>

            <form method="POST" action="controllers/auth.php?action=login">
                <input type="text" id="username" name="username" placeholder="Username" class="form-control rounded-5 mb-3" required>
                <input type="password" id="password" name="password" placeholder="Password" class="form-control rounded-5 mb-3" required>
                <button type="submit" class="btn btn-custom col-12 mb-3 rounded-5">Login</button>
            </form>
            <p class="small text-muted text-center mb-1">Don't have an account? <a href="signup.php">Register</a></p>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script>
        const hands = document.querySelectorAll('.hand');
        const pupils = document.querySelectorAll('.pupil');
        const passwordInput = document.getElementById('password');
        const container = document.querySelector('.container');

        document.addEventListener('mousemove', (e) => {
            if (!passwordInput.matches(':focus')) {
                const rect = container.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                pupils.forEach(pupil => {
                    const bounds = pupil.getBoundingClientRect();
                    const pupilX = bounds.left - rect.left + bounds.width / 2;
                    const pupilY = bounds.top - rect.top + bounds.height / 2;

                    const angle = Math.atan2(y - pupilY, x - pupilX);
                    const distance = 5;

                    const moveX = Math.cos(angle) * distance;
                    const moveY = Math.sin(angle) * distance;

                    pupil.style.transform = `translate(${moveX}px, ${moveY}px)`;
                });
            }
        });

        passwordInput.addEventListener('focus', () => {
            hands.forEach(hand => {
                hand.style.opacity = '1';
                hand.style.transition = 'opacity 0.3s';
            });
            pupils.forEach(pupil => {
                pupil.style.transform = 'translate(0, 0)';
            });
        });

        passwordInput.addEventListener('blur', () => {
            hands.forEach(hand => {
                hand.style.opacity = '0';
            });
        });
    </script>
</body>

</html>