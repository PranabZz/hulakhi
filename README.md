# Hulakhi Subscription

Hulakhi Subscription is a Laravel package designed to handle subscriptions and notifications. It allows you to easily manage subscribers, notify them of updates, and includes a built-in, customizable email template. This package ensures all operations are handled seamlessly without the need for writing raw SQL or managing background jobs manually.

---

## Features

- Manage a list of subscribers effortlessly.
- Store subscriber data in the `subscribers` table automatically.
- Send notifications to subscribers via email.
- Customizable starter email template using pure CSS.
- Scalable email sending for large subscriber counts.

---

## Installation

### Prerequisites
- PHP 8.0 or higher
- Laravel 8.0, 9.0, or 10.0
- MySQL database connection configured

### Install via Composer
Run the following command to install the package:
```bash
composer require pranabkc/hulakhi-subscription
```

### Configuration

## Service Provider

This package uses auto-discovery to register the service provider. If needed, you can manually register it in config/app.php:

```php
'providers' => [
    Hulakhi\Providers\HulakhiServiceProvider::class,
],
```

Facade (Optional)
The Hulakhi facade is registered automatically. You can also add it manually to the aliases in config/app.php:

```php
'aliases' => [
    'Hulakhi' => Hulakhi\Facades\Hulakhi::class,
],
``` 

### Publish Configurations
To publish the configuration file, run:

```bash
php artisan vendor:publish --provider="Hulakhi\Providers\HulakhiServiceProvider"
``` 

This will create a configuration file at config/hulakhi.php.

### Usage
1. Set Up a Subscription Form
Create a form in your application for collecting subscriber email addresses:

``` html
<form method="POST" action="/subscribe">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Subscribe</button>
</form>
```

2. Add Route and Controller Logic
Handle form submissions to store subscribers:

```php
use Hulakhi\Facades\Hulakhi;
use Illuminate\Http\Request;

Route::post('/subscribe', function (Request $request) {
    $email = $request->input('email');
    Hulakhi::subscribe($email);
    return redirect()->back()->with('success', 'Thank you for subscribing!');
});
```

3. Send Notifications
Use the notifyAll method in any controller to notify all subscribers:

```php

use Hulakhi\Facades\Hulakhi;

Hulakhi::notifyAll(
    'New Blog Post Published!',
    'Check out our latest blog post on Laravel development.',
    'https://example.com/path-to-image.jpg',
    'https://example.com/blog/new-post'
);
```

Email Template
The package includes a starter email template. You can publish and customize it:

```bash
php artisan vendor:publish --tag="hulakhi-views"
``` 

This will publish the email template to resources/views/vendor/hulakhi.

### Database Table
The package automatically creates a subscribers table during installation. If needed, you can publish and modify the migration:

```bash
php artisan vendor:publish --tag="hulakhi-migrations"
```
Then run:
``` bash

php artisan migrate
``` 

### Testing
To test the package, use:

```bash
php artisan tinker
``` 

Example:

```php

Hulakhi::subscribe('test@example.com');
Hulakhi::notifySubscribers('Test Subject', 'Test Description', '', 'https://example.com');
``` 

### Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes.

### License
This package is open-sourced software licensed under the MIT license.

### Author
Pranab KC
Email: pranabkca321@gmail.com





