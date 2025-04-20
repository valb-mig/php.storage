
# Simple PHP Docker Server to Store Files

This project is a simple PHP server, running inside Docker, that allows you to store and manage files in a designated directory.

## How to Use

1. Clone the repository:
   ```bash
   git clone <repo-url>
   ```

2. Build and start the Docker containers:
   ```bash
   docker-compose up -d --build
   ```

3. Access the API by opening [http://localhost:9099/api](http://localhost:9099/api) in your browser.

## Requirements

- PHP 8.2 or higher
- Composer
- Docker

## API

### Done:
- **List files in directory**
  - **GET /api/list?dir={directory}**
  - List the files in the specified directory.

### Future:
- **Add a file to a directory**
  - **POST /api/add**
    - **path**: The path to the directory.
    - **params**: The file to be uploaded.

## Commands (inside Docker container)

- **List files in a directory:**
  ```bash
  bin/console list {directory}
  ```

## TODO

- Add functionality to upload files to the directory.
- Build a simple frontend for file uploads and file listing.
- Retrieve and download a single file from the directory.
- Implement file deletion from the directory.
- Enhance the file list view with additional information (e.g., size, date, etc.).