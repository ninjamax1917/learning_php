FROM php:8.2-fpm

# Можно добавить расширения, если нужно
# RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

RUN mkdir -p /var/www/html/.vscode && \
    printf '%s\n' '{' \
    '  "emeraldwalk.runonsave": {' \
    '    "commands": [' \
    '      {' \
    '        "match": "\\.php$", ' \
    '        "cmd": "docker compose run --rm php ./vendor/bin/pint ${relativeFile}",' \
    '        "silent": true' \
    '      }' \
    '    ]' \
    '  },' \
    '  "[php]": {' \
    '    "editor.formatOnSave": false' \
    '  }' \
    '}' > /var/www/html/.vscode/settings.json