## My  Listings

Show real estate properties list using Laravel and MySQL. Used built in authentication in Laravel for user registration and sign in.

### Setup
- `git clone git@github.com:chamithlkml/my-listings.git`
- `cd my-listgings`
- `cp .env.example .env`
- `php artisan key:generate`
- `docker compose up -d`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve`
- Open a new terminal window and run `npm run dev`
- Open a new terminal window and run `php artisan db:seed`
- Access `http://localhost:8000` on web your browser
