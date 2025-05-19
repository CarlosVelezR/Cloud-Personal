#!/bin/sh

source .env
# Paths

# Ensure the log directory exists
mkdir -p "$LOG_DIR"

# Function to log information
log_info() {
    echo "$(date "+%Y-%m-%d %H:%M:%S") [INFO] $1" >> "$LOGFILE"
}

# Function to log errors
log_error() {
    echo "$(date "+%Y-%m-%d %H:%M:%S") [ERROR] $1" >> "$ERROR_LOGFILE"
}

# Log start of the backup process
log_info "Starting Immich backup process."

# Step 1: Backup Immich database
log_info "Starting database backup using pg_dump."

if docker exec -t immich_postgres pg_dumpall --clean --if-exists --username=postgres | /usr/bin/gzip --rsyncable > "$UPLOAD_LOCATION/database-backup/immich-database.sql.gz"; then
    log_info "Database backup completed successfully."
else
    log_error "Database backup failed."
    exit 1  # Exit the script if the database backup fails
fi

# Step 2: Append to local Borg repository
log_info "Starting Borg backup for Immich data."

if borg create "$BACKUP_PATH::{now}" "$UPLOAD_LOCATION" --exclude "$UPLOAD_LOCATION/thumbs/" --exclude "$UPLOAD_LOCATION/encoded-video/"; then
    log_info "Borg backup completed successfully."
else
    log_error "Borg backup failed."
    exit 1  # Exit the script if the Borg backup fails
fi

# Step 3: Prune older backups
log_info "Pruning old backups using Borg."

if borg prune --keep-weekly=4 --keep-monthly=3 "$BACKUP_PATH"; then
    log_info "Borg pruning completed successfully."
else
    log_error "Borg pruning failed."
    exit 1  # Exit the script if the pruning fails
fi

# Step 4: Compact Borg repository
log_info "Compactting Borg repository."

if borg compact "$BACKUP_PATH"; then
    log_info "Borg compaction completed successfully."
else
    log_error "Borg compaction failed."
    exit 1  # Exit the script if compaction fails
fi

# Log end of backup process
log_info "Immich backup process completed successfully."
