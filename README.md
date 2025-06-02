# Git Issue App

This application list all git issues assigned to the provided user

### Prerequisites

- PHP version 8.2
- Composer version 2.8.3
- Laravel 12.0

### Installation

Duplicate the .env.example file and rename it .env

Generate a git personal token, see [documentation](https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/managing-your-personal-access-tokens#creating-a-fine-grained-personal-access-token)

Within the .env.local file, provide the generated git personal token within **GITHUB_PERSONAL_TOKEN** variable

Run the following command in the terminal to install necessary dependencies:

```
composer install
```

Generate APP KEY in env.local by running the following in the terminal:

```
php artisan key:generate
```

Create a file within the database folder called database.sqlite and run the following command to start the migration

```
php artisan migrate
```

Run the following in the terminal to refresh the cache configuration

```
php artisan config:clear
php artisan config:cache
```

Run the following in the terminal within the application folder

```
npm install && npm run build
composer run dev
```

Then proceed to http://localhost:8000
