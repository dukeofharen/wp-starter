# WordPress theme starter

This repository contains everything you need to get started with developing a "classic" (so not a block based) theme. This is included:

- Development setup based on Docker (Compose).
- Script development using TypeScript.
- Styling using SCSS.

Special thanks to [Golosay](https://github.com/Golosay/webpack-seed) for the Webpack setup.

## Getting started

To get started, perform the following steps:

- In your terminal, in the root folder of the repository, run `docker compose up`. This will perform the following actions:
  - Download the necessary Docker images.
  - Install and configure WordPress using the WP CLI.

After you see something like this:
```
wp-starter-wordpress-cli-1  | Success: WordPress installed successfully.
wp-starter-wordpress-cli-1  | Success: Switched to 'WP Starter' theme.
wp-starter-wordpress-cli-1  | Success: Rewrite structure set.
wp-starter-wordpress-cli-1  | Success: Rewrite rules flushed.
```

...you know the installation is ready, and you can reach the WordPress site. You can now log in to WordPress with username `user` and password `pass`. Speaking of, using the following URLs you can reach the site and several tools:

- http://localhost:8000 (WordPress site)
- http://localhost:8000/phpmyadmin/ (phpMyAdmin for managing your database)
- http://localhost:8000/mail/ (MailPit which acts as a "fake" SMTP server to test mails)

MySQL is reachable on port 3306, so you can also use your favourite DB tooling to connect to the database.

### Start developing

All necessary files for developing your new theme are in the `src` folder. First, make sure you are running the site (see explanation above). In your terminal, go to the `src` folder and run `npm install` (if you haven't done so already) and run `npm start`. All resources (images, TypeScript files, SCSS etc.) are located in the `assets` folder. Webpack is used to compile TypeScript, SCSS etc., so when you execute this command, Webpack will react to changes made in the `assets` folder and compile them for you. Besides this, BrowserSync is also started. BrowserSync runs in proxy mode and watches for changes. Everytime a change is made to the SCSS or TypeScript files (not PHP) the page will be reloaded, which is nice for quick development.

## Building

To build the theme, execute `npm run build` in the `src` folder. The theme will be built as a .zip file and will be placed in the `src/dist` folder. This file can be uploaded to your live WordPress installation, from the admin backend.

## Restoring an existing site

If you want to load an existing website + SQL dump, you can do that as well. Place the complete WordPress directory in the folder `restore/site` and place the SQL dump in `restore/dump.sql`. When starting the container, the following steps are executed:

- The SQL file is written to the database.
- The contents of the `site` folder are written to the correct Docker volume.
- The `wp-config.php` file in the `site` folder is updated with the correct database credentials.
- A find / replace is executed on the database to replace the "old" URL with the local development URL.