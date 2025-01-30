# Cloud-Personal Docker Setup

This repository contains scripts and Docker configuration files to set up your own personal cloud storage solution using **Cloud-Personal**. The project includes Docker configuration, as well as Bash scripts to automate the deployment and management of the cloud service on your server.

---

## Table of Contents

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Setup Instructions](#setup-instructions)
  - [1. Clone the Repository](#1-clone-the-repository)
  - [2. Build the Docker Containers](#2-build-the-docker-containers)
  - [3. Configure the Database](#3-configure-the-database)
  - [4. Start Cloud-Personal](#4-start-Cloud-Personal)
  - [5. Access Cloud-Personal Web Interface](#5-access-Cloud-Personal-web-interface)
- [Usage](#usage)
- [Customization](#customization)
- [Troubleshooting](#troubleshooting)
- [License](#license)

---

## Introduction

This project is designed to make it easy for you to deploy **Cloud-Personal** in a containerized environment using Docker and Docker Compose. With this setup, you can create your own private cloud storage solution to store and manage your files securely.

The setup includes:

- **NextCloud**: The main cloud storage platform.
- **Immich**: A relational database to store Cloud-Personal data.
- **Docker**: Containerization to simplify deployment and scaling.
- **Bash scripts**: Automation scripts to easily set up, configure, and manage the environment.

---

## Prerequisites

Before getting started, make sure you have the following tools installed on your server or local machine:

- **Docker**: Follow [Docker installation guide](https://docs.docker.com/get-docker/) for your platform.
- **Docker Compose**: Follow [Docker Compose installation guide](https://docs.docker.com/compose/install/).
- **Bash**: The scripts are designed for Linux or macOS environments with Bash. For Windows, consider using Windows Subsystem for Linux (WSL).

---

## Setup Instructions

Follow these steps to get your Cloud-Personal up and running.

### 1. Clone the Repository

Start by cloning the repository to your local machine or server:

```bash
git clone https://github.com/CarlosVelezR/Cloud-Personal.git
cd Cloud-Personal-docker-setup
```
### 3. Create the folders - Replace path with yourUser.
```
mkdir /var/www/html
mkdir /home/yourUser/immich
cd /home/yourUser/immich
mkdir /home/yourUser/immich/data
mkdir /home/yourUser/sh
```

### 2. Build the Docker Containers

To build and set up the Docker containers, run the following command:

```bash
docker-compose build
```

This will pull the necessary images and build the Docker containers.


### 4. Start Cloud-Personal

Once the database is configured, you can start Cloud-Personal by running the following command:

```bash
docker-compose up -d
```

This will start the containers in the background, including the web server and the database.

### 5. Access Cloud-Personal Web Interface

Once the containers are up and running, you can access your Cloud-Personal instance through your web browser:

```
http://localhost:2283
```

The first time you access the web interface, you will be prompted to complete the installation process by entering the database details and admin credentials.

---

## Usage

Once Cloud-Personal is up and running, you can use the web interface to upload and manage your files. You can also access your files using the **Cloud-Personal Desktop** or **Mobile** apps, available on their respective stores.

You can use the following URLs for some common actions:

- **Web Interface**: `http://localhost:8080`
- **Login page**: `http://localhost:8080/login`

## BackUp

To backup your data install Borg in your Linux Server.

```
apt install borgbackup
```
Config your repository

```
UPLOAD_LOCATION="/home/drsean/immich/data"
BACKUP_PATH="/home/drsean/immich/data/backups"
mkdir "$BACKUP_PATH"
mkdir "$UPLOAD_LOCATION/database-backup"
borg init --encryption=none "$BACKUP_PATH"
```


Execute backupimmich.sh to generate a backup.

```
sh /home/drsean/immich/sh/backupimmich.sh &
```

## How to Restore a Backup?

Execute RestoreBackUp.sh

```
sh /home/drsean/immich/sh/RestoreBackUp.sh &

```
---

## Customization

You can customize the configuration by editing the `docker-compose.yml` and the `config/config.php` files. Some key options to consider:

- **Ports**: You can change the exposed ports in `docker-compose.yml`.
- **Database**: If you want to use an external database or change database settings, modify `docker-compose.yml` and the `setup_database.sh` script accordingly.
- **Cloud-Personal Settings**: For advanced Cloud-Personal configuration, refer to the [official Cloud-Personal documentation](https://doc.Cloud-Personal.com/).

---

## Troubleshooting

Here are some common issues and solutions:

1. **Container not starting**:  
   If containers fail to start, check the logs to debug the issue:
   ```bash
   docker-compose logs
   ```
   Look for any error messages related to database connectivity or missing environment variables.

2. **Database connection issues**:  
   If Cloud-Personal cannot connect to the MariaDB database, ensure that the database container is up and running. You can check the status with:
   ```bash
   docker-compose ps
   ```

3. **Permissions issues**:  
   Make sure that the directories used by Cloud-Personal have the correct permissions. You can adjust this using the following command:
   ```bash
   sudo chown -R www-data:www-data ./data ./config ./apps
   ```

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Acknowledgements

- **Cloud-Personal**: [https://Cloud-Personal.com/](https://Cloud-Personal.com/)
- **Docker**: [https://www.docker.com/](https://www.docker.com/)
- **MariaDB**: [https://mariadb.org/](https://mariadb.org/)

---

If you have any questions or issues, feel free to open an issue or submit a pull request!