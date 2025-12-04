#!/bin/bash

# Скрипт для очистки старых бэкапов темы WordPress rshop
# Удаляет бэкапы старше 30 дней

echo "Начинаем очистку старых бэкапов..."

# Путь к директории с бэкапами
BACKUP_DIR="/var/www/rshop.ru/wp-content/themes"

# Количество дней, после которых бэкапы считаются устаревшими
DAYS_OLD=30

# Находим и удаляем старые бэкапы
find $BACKUP_DIR -name "rshop-backup-*" -type d -mtime +$DAYS_OLD -exec rm -rf {} \;

echo "Очистка завершена. Удалены бэкапы старше $DAYS_OLD дней." 