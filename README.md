# Improved NIN Slip Generator

This project is a PHP-based tool for generating Improved NIN Slips. It includes features such as QR code generation, image handling, and styling for a two-page NIN card.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Customization](#customization)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The Improved NIN Slip Generator is designed to create printable NIN slips with QR codes. This README provides an overview of the project, its features, and instructions on how to set it up.

## Features

- QR code generation using the Endroid QrCode library.
- Image handling for user passport and logos.
- Styling for a two-page NIN card with different layouts.

## Requirements

- PHP (version >= 7.0)
- Composer (for managing dependencies)
- Web server (e.g., Apache, Nginx)
- NIN data and image files

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/herbdukareem/NIN-Design.git
    ```

2. Install dependencies using Composer:

    ```bash
    composer install
    ```

3. Configure your web server to point to the project's public directory.

## Usage

1. Update the NIN data in the PHP file (`html.php`) with your actual cardholder information.

2. Run the PHP file to generate the NIN card PDF:

    localhost/nin-design/html.php
    

3. The generated PDF will be available in the browser or can be downloaded.

## Customization

- Adjust the styling, dimensions, or layouts in the `html.php` file.
- Customize the NIN data and image paths in the PHP file (`html.php`).

## Contributing

Feel free to contribute to this project. Please follow the [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE).
