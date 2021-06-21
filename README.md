# Taller_PHP
- Primero lo clonas en una carpeta designada por ti
`git clone https://github.com/eugenio-perdomo/Taller_PHP.git`

- Muevete a ese directorio con el comando cd

- Luego te fijas si tienes una inicializacion de git
`git remote -v`

- Si no la tienes haz:
`1. git init`

`2. git remote add origin https://github.com/eugenio-perdomo/Taller_PHP`

- Para ver los cambios que hiciste:
`git status`

- Para añadir a un paquete esos cambios
`git add .`

- Para hacer COMMIT
`git commit -m "Breve mensaje diciendo que hiciste"`

- Para hacer PUSH
`git push origin main // Si main no es tu rama entonces cambialo a tu rama`

- Crear una nueva rama
`git branch eugenio`

- Ver lista de ramas
`git branch`

- Cambiar a una rama
`git checkout eugenio`

- Para Hacer PULL
`1. git fetch --all`

`2. git pull origin main`

- Si quieres empezar todo desde 0
`1. git fetch --all`

`2. git reset --hard origin/main`

-----------------------------------------------------------

php artisan make:model perro -m // modelo y migracion
php artisan migrate // crea la bd, mirar que .env este bien escrito
php artisan migrate:rollback
php artisan migrate:fresh --seed