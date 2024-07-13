## NevStagram
NevStagram es una aplicación web similar a Instagram que permite los usuarios registrarse, subir imágenes, seguir perfiles, ver publicaciones en su inicio, comentar y dar me gusta a las publicaciones. 
Construido con Laravel, Livewire y Tailwind CSS.

## Previews

- Iniciar sesión
<img src="https://github.com/user-attachments/assets/7340effb-f109-419d-a877-38d397779319">

- Registrarse
<img src="https://github.com/user-attachments/assets/fedcdd4e-6774-4314-8b6d-2646a4f74039">

- Inicio
<img src="https://user-images.githubusercontent.com/123043992/230751886-b149477c-b296-42fc-ab88-2553bf4fb399.png">

- Perfil
<img src="https://user-images.githubusercontent.com/123043992/230751401-7fdaf48d-f7e5-4ffa-a6cb-df556dafa6fb.png">

- Editar perfil
<img src="https://user-images.githubusercontent.com/123043992/230750562-80d41be4-adea-44a1-b0a5-21455a26bdc3.png">

- Crear publicación
<img src="https://user-images.githubusercontent.com/123043992/230750592-6d7854c1-e498-4de6-969e-24eeecfda4f4.png">

- Publicación
<img src="https://user-images.githubusercontent.com/123043992/230751355-96fb8d32-ea53-4c69-b077-85e06cf8b0a6.png">

## Instalación
1. Clona el repositorio con el siguiente comando: 
    ```
    git clone https://github.com/karemun/Nevstagram.git
    ```
2. Entra al directorio del proyecto: 
    ```
    cd nevstagram
    ```
3. Instala las dependencias de Composer: 
    ```
    composer install
    ```
4. Crea el archivo .env y configura las variables de entorno: 
    ```
    cp .example.env .env
    ```
5. Genera una llave de aplicación: 
    ```
    php artisan key:generate
    ```
6. Ejecuta las migraciones de la base de datos: 
    ```
    php artisan migrate
    ```
7. Ejecuta la aplicación con el siguiente comando: 
    ```
    php artisan serve
    ```
8. Accede a la aplicación ingresando a la ruta `http://localhost:8000`
