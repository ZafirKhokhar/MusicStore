# MusicStore

A server-rendered music store / streaming web application built with PHP, MySQL, HTML/CSS and JavaScript. The app supports playback, playlists, favorites, search, downloads and includes a basic admin interface.

## Table of contents
- [Features](#features)
- [Tech stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running locally](#running-locally)
- [Usage (quick)](#usage-quick)
- [Admin & maintenance](#admin--maintenance)
- [Troubleshooting](#troubleshooting)
- [Contributing & License](#contributing--license)

## Features
- User signup / login / logout
- Browse songs by artist and genre
- Live search and song listing APIs
- Play and download songs
- Add/remove favorites and manage playlists
- Admin request handling and simple admin UI

## Tech stack
- Backend: PHP (handlers and API endpoints in the `php/` folder)
- Database: MySQL (schema at [Database/music_store.sql](Database/music_store.sql))
- Frontend: server-rendered PHP pages, CSS (per-page styles), and JavaScript in `js/`
- Assets: audio in `Tracks/`, images in `image/` and `Aimage/`

## Prerequisites
- PHP 7.4+ or PHP 8.x with extensions: `mysqli` or `pdo_mysql`, `mbstring`, `fileinfo` (for uploads)
- MySQL or MariaDB
- A web server (Apache, Nginx) or the PHP built-in server for local testing

## Installation
1. Clone the repository to your web server document root or development folder.

   git clone <repo-url>

2. Create a MySQL database (example name: `music_store`) and import the schema:

```bash
mysql -u <user> -p music_store < Database/music_store.sql
```

3. Copy or edit configuration: open [php/config.php](php/config.php) and set your database credentials and any path settings.
4. Ensure the web server can read media files in `Tracks/` and write permissions where required (e.g., temporary upload folders).

## Configuration
- Primary config file: [php/config.php](php/config.php). Set the following at minimum:
  - Database host, name, user, and password
  - Base URL or path if the app is not served from the webroot
  - Any file upload directories

If you prefer environment variables, you can modify `config.php` to read from `$_ENV`.

## Running locally
Quick test using PHP built-in server (development only):

```bash
php -S localhost:8000
```

Open http://localhost:8000 in your browser. For production use, configure Apache or Nginx and point the document root to the project folder.

## Usage (quick)
- Main pages: [home.php](home.php), [genre.php](genre.php), [artists.php](artists.php), [playlist.php](playlist.php), [playsong.php](playsong.php), [favourite.php](favourite.php)
- Useful backend endpoints (in `php/`): `login.php`, `signup.php`, `logout.php`, `live_search.php`, `getsonglist.php`, `getplaylist.php`, `addFav.php`, `download.php`, `createPL.php`, `removePL.php`
- Client JS: `js/song-list.js`, `js/sscript.js` handle dynamic UI behaviors and AJAX calls.

## Admin & maintenance
- Admin UI: [MSadmin.php](MSadmin.php) and related handlers ([MSadminRequest.php](MSadminRequest.php), [showRequests.php](php/showRequests.php), [LoadReq.php](php/LoadReq.php)).
- Use admin pages to review requests and manage content.

## Troubleshooting
- Database connection errors: verify credentials in [php/config.php](php/config.php) and that MySQL is running.
- Missing media: confirm files are placed in `Tracks/` and that web server has read access.
- Permission issues: set correct owner/group for web server (e.g., `www-data`) and limit write permissions to required folders only.

## Tests & extras
- The `exrta/` folder contains small test scripts (`apitest.php`, `test2.php`, `test3.php`) for exercising APIs.

## Contributing & License
- No `LICENSE` included — add one if you plan to publish or open-source.
- To contribute: open an issue describing the change and submit a pull request with clear testing steps.

If you'd like, I can add a short `deploy` or `docker-compose` example, create a `LICENSE`, or expand the configuration section to use `.env` files.
