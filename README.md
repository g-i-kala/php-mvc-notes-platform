
# Notes Platform

Welcome to the Notes Platform! This project is a simple notes application built using PHP and the MVC architecture. It showcases my understanding of how frameworks like Laravel work by implementing similar concepts from scratch.

## Features

- **CRUD Operations**: Create, read, update, and delete notes.
- **Routing**: Custom routing class to handle HTTP requests.
- **Authentication**: (Planned) Implement proper user authentication.
- **Styling**: Tailwind CSS for modern and responsive design.

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/g-i-kala/notes-platform.git
   cd notes-platform
   ```

2. **Install Dependencies**:
   Ensure you have [Composer](https://getcomposer.org/) installed, then run:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   Copy the `.env.example` file to `.env` and configure your environment settings, such as database connection details.

4. **Database Migration**:
   Run the database migrations to set up the necessary tables:
   ```bash
   php artisan migrate
   ```

5. **Serve the Application**:
   Use the built-in PHP server to run the application:
   ```bash
   php -S localhost:8000 -t public
   ```

## Usage

After setting up, you can access the application by navigating to `http://localhost:8000` in your web browser. From there, you can create, view, edit, and delete notes.

## Project Structure


# Notes Platform

Welcome to the Notes Platform! This project is a simple notes application built using PHP and the MVC architecture. It showcases my understanding of how frameworks like Laravel work by implementing similar concepts from scratch.

## Features

- **CRUD Operations**: Create, read, update, and delete notes.
- **Routing**: Custom routing class to handle HTTP requests.
- **Authentication**: (Planned) Implement proper user authentication.
- **Styling**: Tailwind CSS for modern and responsive design.
- **Testing**: Pest Framework.
- **Utilites**: php-cs-fixer, PHPSTAN & Rector.

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/notes-platform.git
   cd notes-platform
   ```

2. **Install Dependencies**:
   Ensure you have [Composer](https://getcomposer.org/) installed, then run:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   Copy the `.env.example` file to `.env` and configure your environment settings, such as database connection details.

4. **Database Migration**:
   Run the database migrations to set up the necessary tables:
   ```bash
   php artisan migrate
   ```

5. **Serve the Application**:
   Use the built-in PHP server to run the application:
   ```bash
   php -S localhost:8000 -t public
   ```

## Usage

After setting up, you can access the application by navigating to `http://localhost:8000` in your web browser. From there, you can create, view, edit, and delete notes.

## Project Structure

- **app/**: Contains the controllers, models, and views.
- **core/**: Contains the core application files, including Database, Router, Response, Response and helper functions.php.
- **public/**: The entry point for the application; contains the `index.php` file.
- **routes/web.php**: Defines the application routes.
- **src/**: Contains view templates styled with Tailwind CSS.
- **config/**: Configuration files for the application.

## Contributing

Contributions are welcome! If you have suggestions or improvements, feel free to create an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contact

For any inquiries, please reach out via [your email] or open an issue on GitHub.

- **public/**: The entry point for the application; contains the `index.php` file.
- **routes/**: Defines the application routes.
- **resources/**: Contains view templates styled with Tailwind CSS.
- **config/**: Configuration files for the application.

## Contributing

Contributions are welcome! If you have suggestions or improvements, feel free to create an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contact

For any inquiries, please reach out via karocreativedesigns@gmail.com or open an issue on GitHub.
