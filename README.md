# Install

1. Laksanakan arahan berikut pada folder projek.

```
composer install
```

2. Laksanakan arahan berikut pada folder projek.

```
cp .env.example .env
```

3. Laksanakan arahan berikut pada folder projek.

```
php artisan key:generate
```

4. Kemaskini fail .env dengan credentials database.
5. Laksanakan arahan berikut pada folder projek.

```
php artisan migrate:fresh --seed
```