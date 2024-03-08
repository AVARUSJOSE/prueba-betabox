## CMS for Construcciones Pichel

### Installation

```bash
    git clone https://github.com/ICKillerGH/construcciones-pichel-cms
    cd construcciones-pichel-cms
    git checkout develop
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan storage:link
```