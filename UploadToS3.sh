#!/bin/sh

# Definir los archivos de log
LOGFILE="/home/drsean/sh/logs/logSh.log"
ERRORLOG="/home/drsean/sh/logs/logSh_errors.log"

# Función para escribir en el log de información
log_info() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') [INFO] $1" >> $LOGFILE
}

# Función para escribir en el log de errores
log_error() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') [ERROR] $1" >> $ERRORLOG
}

# Registrar que el script ha comenzado
log_info "The script has started execution."

# Comando 1: Sincronizar backups a S3
log_info "Starting to sync backup data to S3."
aws s3 sync /home/drsean/immich/data/backups s3://cloudsv --storage-class DEEP_ARCHIVE >> $LOGFILE 2>> $ERRORLOG
if [ $? -eq 0 ]; then
    log_info "Backup synchronization completed successfully."
else
    log_error "There was an error during backup synchronization."
fi

# Comando 2: Sincronizar base de datos a S3
log_info "Starting database sync to S3."
aws s3 sync /home/drsean/immich/data/database-backup s3://cloudsv --storage-class DEEP_ARCHIVE >> $LOGFILE 2>> $ERRORLOG
if [ $? -eq 0 ]; then
    log_info "Database synchronization completed successfully."
else
    log_error "There was an error during database synchronization."
fi

# Registrar que el script ha terminado
log_info "The script has finished executing."
