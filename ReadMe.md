# DevGigs - Laravel Job Board

DevGigs is a Laravel-based web application designed to connect employers and developers. Employers can sign up, post available developer jobs, and potential employees can browse and apply for these jobs. The application utilizes a MySQL database, Eloquent ORM for database interactions, and Blade templates for the frontend.

## Features

-   **User Roles:**

    -   Employers: Can create accounts, post job listings, and manage their job postings.
    -   Developers: Can create accounts, browse available jobs, and apply for positions.

-   **Job Listings:**

    -   Employers can post detailed job listings with information such as job title, description, required skills, and application instructions.

-   **User Authentication:**

    -   Secure user authentication using Laravel's built-in authentication system.

-   **Database:**

    -   MySQL database is used to store user information, job listings, and application details.

-   **Eloquent ORM:**

    -   Laravel's Eloquent ORM is employed for smooth database interactions, making it easy to fetch, store, and manipulate data.

-   **Blade Templates:**
    -   Frontend views are crafted using Laravel's Blade templating engine, providing a clean and efficient way to structure frontend code.

## Installation

1.  **Clone the Repository:**

git clone https://github.com/joshosas/DevGigs.git 2. **Install Dependencies**

    cd DevGigs
    composer install

3. **Set Up Environment:**

-   Copy the .env.example file to .env and configure your database settings.

4. **Generate Application Key:**

    php artisan key:generate

5. **Run Migrations:**

    php artisan migrate

6. **Start Development Server:**

    php artisan serve

7. **Visit the Application:**

Open your browser and go to http://localhost:8000 to access DevGigs.

## Contributing

If you'd like to contribute to DevGigs, please follow our Contribution Guidelines.

## License

The Laravel framework is open-sourced software licensed under [the MIT license](https://opensource.org/licenses/MIT).

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
