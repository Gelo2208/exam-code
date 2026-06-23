<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shania Yan - Contact Us</title>

<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">

<style>
    .contact-wrapper {
        display: flex;
        gap: 40px;
        flex: 1;
        padding: 50px 80px;
        align-items: flex-start;
        justify-content: center;
        flex-wrap: wrap;
    }

    .contact-form-box {
        background: rgba(255, 255, 255, 0.75);
        border-radius: 14px;
        padding: 36px 40px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        width: 420px;
        max-width: 100%;
    }

    .contact-form-box h2 {
        font-size: 38px;
        margin-bottom: 6px;
    }

    .contact-form-box p.form-sub {
        font-size: 20px;
        color: #555;
        margin-bottom: 24px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 18px;
    }

    .form-group label {
        font-size: 22px;
        font-weight: 700;
    }

    .form-group input,
    .form-group textarea {
        font-family: 'Caveat', cursive;
        font-size: 20px;
        padding: 10px 14px;
        border: 2px solid #1a1a1a;
        border-radius: 8px;
        background: #fff;
        color: #1a1a1a;
        outline: none;
        transition: border-color .2s;
        resize: none;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #1d5fd6;
    }

    .form-group textarea {
        height: 120px;
    }

    .submit-btn {
        font-family: 'Caveat', cursive;
        font-size: 24px;
        font-weight: 700;
        background: #1d5fd6;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px 36px;
        cursor: pointer;
        transition: .3s;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        width: 100%;
    }

    .submit-btn:hover {
        background: #174bb0;
        transform: translateY(-2px);
    }

    .success-msg {
        display: none;
        background: #d4edda;
        color: #155724;
        border-radius: 8px;
        padding: 14px 18px;
        font-size: 22px;
        margin-top: 16px;
        text-align: center;
    }

    .map-box {
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 420px;
        max-width: 100%;
    }

    .map-box h2 {
        font-size: 38px;
    }

    .map-box p.map-sub {
        font-size: 20px;
        color: #555;
        margin-top: -6px;
    }

    .map-box iframe {
        border-radius: 14px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        border: none;
        width: 100%;
        height: 340px;
    }

    @media(max-width: 768px) {
        .contact-wrapper {
            padding: 30px 20px;
            flex-direction: column;
            align-items: center;
        }

        .contact-form-box,
        .map-box {
            width: 100%;
        }
    }
</style>

</head>
<body>

<nav>
    <a href="index.html">Home</a>
    <a href="covers.html">Covers</a>
    <a href="albums.html">Albums</a>
    <a href="tracklist.html">Tracklist</a>
    <a href="contact.php" class="active">Contact Us</a>
</nav>

<div class="contact-wrapper">

    <div class="contact-form-box">
        <h2>Get in Touch</h2>
        <p class="form-sub">Send a message to Shania Yan</p>

        <?php
        $success = false;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name    = trim($_POST['name'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if ($name === '') $errors[] = 'Name is required.';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
            if ($message === '') $errors[] = 'Message cannot be empty.';

            if (empty($errors)) {
                // Mail sending (configure your SMTP or use mail())
                // mail('your@email.com', 'Contact from ' . $name, $message, 'From: ' . $email);
                $success = true;
            }
        }
        ?>

        <?php if (!empty($errors)): ?>
            <div style="background:#f8d7da;color:#721c24;border-radius:8px;padding:12px 16px;font-size:20px;margin-bottom:16px;">
                <?php foreach ($errors as $e): ?>
                    <p><?= htmlspecialchars($e) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success-msg" style="display:block;">
                ✓ Your message was sent! Shania will get back to you soon.
            </div>
        <?php else: ?>
            <form method="POST" action="contact.php">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"
                           value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com"
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Write your message here..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="submit-btn">Send Message</button>

            </form>
        <?php endif; ?>
    </div>

    <div class="map-box">
        <h2>Our Location</h2>
        <p class="map-sub">University of Santo Tomas<br>1817 España Blvd, Sampaloc, Manila</p>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0!2d120.9895794!3d14.6098055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b8fe317ce261%3A0xff3cf4f238497bc9!2sUniversity%20of%20Santo%20Tomas%20(UST)!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="University of Santo Tomas on Google Maps">
        </iframe>
    </div>

</div>

<footer></footer>

</body>
</html>
