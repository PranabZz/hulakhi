<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.5; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        h1 { color: #333; }
        img { max-width: 100%; height: auto; }
        .link { display: block; margin-top: 20px; text-decoration: none; color: #fff; background-color: #007bff; padding: 10px 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <img src="{{ $metaImage }}" alt="Meta Image">
        <p>{{ $description }}</p>
        <a href="{{ $link }}" class="link">Learn More</a>
    </div>
</body>
</html>
