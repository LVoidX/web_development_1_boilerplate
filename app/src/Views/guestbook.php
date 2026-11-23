<!DOCTYPE html>
<html lang="en">
<head>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>

    <?php foreach ($posts as $post): ?>
        <div>
            <h3><?= htmlspecialchars($post['name']) ?></h3>
            <small><?= htmlspecialchars($post['posted_at']) ?></small>
            <p><?= nl2br(htmlspecialchars($post['message'])) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
    <form method="POST" action="/guestbook">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
