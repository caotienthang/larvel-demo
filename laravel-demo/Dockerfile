FROM php:8.2-fpm

# ===== System deps =====
RUN apt-get update && apt-get install -y --no-install-recommends \
    git curl zip unzip ca-certificates gnupg \
    default-mysql-client \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev \
    supervisor cron \
    libssl-dev \
 && rm -rf /var/lib/apt/lists/*

# ===== PHP Extensions =====
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j"$(nproc)" \
    gd mbstring xml zip opcache pdo pdo_mysql

# ===== PECL Extensions: mongodb + redis =====
RUN pecl install mongodb redis \
 && docker-php-ext-enable mongodb redis

# ===== Add Node.js (20.x) =====
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
 && apt-get update && apt-get install -y --no-install-recommends nodejs \
 && node -v && npm -v \
 && rm -rf /var/lib/apt/lists/*

# ===== PHP ini overrides =====
RUN { \
    echo "upload_max_filesize=100M"; \
    echo "post_max_size=100M"; \
    echo "max_input_vars=3000"; \
  } > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=256M" > /usr/local/etc/php/conf.d/memory-limit.ini \
 && { \
    echo "max_execution_time=300"; \
    echo "max_input_time=300"; \
    echo "request_terminate_timeout=300"; \
  } > /usr/local/etc/php/conf.d/timeout.ini

# ===== Composer =====
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ===== App code =====
WORKDIR /var/www
COPY . /var/www

# ===== Permissions (Laravel) =====
RUN chown -R www-data:www-data /var/www \
 && chmod -R 755 /var/www \
 && chmod -R 777 /var/www/storage /var/www/bootstrap/cache \
 && mkdir -p /var/www/storage/logs \
 && touch /var/www/storage/logs/laravel.log \
 && chmod -R 777 /var/www/storage/logs

# ===== Supervisor config (FULL, with RPC + include) =====
RUN mkdir -p /etc/supervisor/conf.d \
 && cat > /etc/supervisor/supervisord.conf <<'EOF'
[supervisord]
nodaemon=true
logfile=/var/log/supervisord.log
pidfile=/var/run/supervisord.pid
user=root

[unix_http_server]
file=/var/run/supervisor.sock
chmod=0700

[rpcinterface:supervisor]
supervisor.rpcinterface_factory = supervisor.rpcinterface:make_main_rpcinterface

[supervisorctl]
serverurl=unix:///var/run/supervisor.sock

[include]
files=/etc/supervisor/conf.d/*.conf
EOF

# ===== Supervisor programs: PHP-FPM + Queue Worker =====
RUN cat > /etc/supervisor/conf.d/php-fpm.conf <<'EOF'
[program:php-fpm]
command=/usr/local/sbin/php-fpm -F
autostart=true
autorestart=true
startsecs=2
startretries=10
priority=10
stopsignal=QUIT
stopwaitsecs=10
killasgroup=true
stopasgroup=true
redirect_stderr=true
stdout_logfile=/proc/1/fd/1
stdout_logfile_maxbytes=0
stderr_logfile=/proc/1/fd/2
stderr_logfile_maxbytes=0
EOF

RUN cat > /etc/supervisor/conf.d/laravel-worker.conf <<'EOF'
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/artisan queue:work --sleep=3 --tries=3 --timeout=120
autostart=true
autorestart=true
numprocs=1
priority=20
user=www-data
redirect_stderr=true
stdout_logfile=/proc/1/fd/1
stdout_logfile_maxbytes=0
stderr_logfile=/proc/1/fd/2
stderr_logfile_maxbytes=0
EOF

# ===== Cron (inline) =====
RUN echo "* * * * * www-data php /var/www/artisan schedule:run >> /dev/null 2>&1" > /etc/cron.d/laravel-cron \
 && chmod 0644 /etc/cron.d/laravel-cron \
 && crontab /etc/cron.d/laravel-cron

# ===== Start cron + supervisord =====
CMD ["/bin/sh", "-lc", "service cron start && exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf"]
