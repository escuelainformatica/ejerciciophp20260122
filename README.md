# Para crear la carpeta vendor (no incluida)
composer update
# el otro archivo no incluido es el archivo .env

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:r4iBw9yH4gN4NlMMAMioa5xTapRzDPC8uNIJs18uUnM=
APP_DEBUG=true
APP_URL=http://localhost:8000

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

# PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```
# la base de datos no esta incluida

php artisan migrate:fresh

# validación

## controlador

### En el metodo POST 
$request->validate  hace una validacion de cada uno de los campos indicados.

```php
        $request->validate([
            'nombre' => 'required|max:30',
            'poblacion' => 'required|integer|min:0|max:100000000',
        ]);
```

### En el metodo GET

```php
        $ciudad=new Ciudad($request->old()); // lee los datos antiguos (datos no ingresados)
```

## vista

### mostrar todos los mensajes

```php
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
```

### mostrar solo un mensaje de error

```php
    @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

```

# autenticación

## vista con su controlador
La vista deberia ser un formulario.

```php
class LoginController extends Controller
{
    public function login() {
        return view("login");
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/ciudad');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout() {
        Auth::logout();
        return redirect()->intended('/login');
    }
}
```

## mostrar usuario actual
Con la funcion @auth, se puede un mensaje si el usuario esta logeado.
Con la funcion Auth::user(), obtengo el usuario (nombre,email, etc.)

```php

@auth
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <p>Your email is: {{ auth()->user()->email }}</p>
@endauth
```

## enrutamiento y autenticación

En todas las paginas que requieren autenticación, hay que agregar el middleware ->middleware('auth');

Y una de las páginas deberia tener el nombre llamado login   ->name("login");