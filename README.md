# Estatik Bookings Plugin for WordPress

## Description
The Estatik Bookings plugin allows users to manage property bookings directly within WordPress. It adds a custom post type for bookings and provides metaboxes with custom fields for detailed booking management.

## Installation
Follow these steps to install the plugin:

1. Clone or download the plugin from the GitHub repository.
2. Run `composer install` within the plugin directory to install PHP dependencies.
3. Run `npm install` within the plugin directory to install any necessary Node.js packages.
4. Upload the `estatik-bookings` folder to your WordPress `/wp-content/plugins/` directory.
5. Activate the plugin through the 'Plugins' menu in WordPress.

## Features
- **Custom Post Type**: Adds a 'booking' post type to manage property bookings.
- **Metaboxes for Bookings**: Includes custom fields for start date, end date, and property address to facilitate detailed booking information.
- **Date Picker Integration**: Implements the default WordPress date picker for selecting start and end dates.
- **Metadata Storage**: Stores date fields as post metadata in timestamp format to ensure accuracy and consistency.
- **Front-end Display Enhancements**: Formats date fields as '25 Dec 2023 21:00' and integrates them into the booking post's content on single booking pages.
- **Google Maps Integration**: Adds a Google map to booking entries, displaying a marker based on the property's address.

## Usage
To create a booking, navigate to the 'Bookings' section in the WordPress admin area. Fill out the booking details using the provided metaboxes.

## License
This plugin is released under the MIT License.
