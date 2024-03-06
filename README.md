# Estatik Bookings
## Prerequisites
* Composer
* npm
## Installation
1. **Install Composer dependencies:**
   composer install
2. **Install npm packages:**
   npm i
3. **Add Google Maps API key to `wp-config.php`:**
```php
define('GOOGLE_MAPS_API', 'your_google_maps_api_key');
```
## Features
* **Custom Post Type** for bookings.
* **Metabox with Custom Fields** for start date, end date, and address.
* **Date Picker Support** for date fields.
* **Google Maps Integration** to display maps based on address.
