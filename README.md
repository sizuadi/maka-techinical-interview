## Maka Technical Test

### Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd laravel-technical-test/technical-test
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database configuration**

    - Update `.env` file with your database credentials

    ```bash
    php artisan migrate
    ```

5. **Start the development server**
    ```bash
    php artisan serve
    ```

The application will be available at `http://localhost:8000`

## Access the test answer

1. http://localhost:8000/test1
2. http://localhost:8000/test2
3. You have to use postman and you import Backend Test.postman_collection at root directory

Thank you for reading this docs, have a nice day!
