# Laravel Mastery - CodeExperts

https://codeexperts.com.br/curso/laravel-mastery

## <a name="indice">Índice</a>

1. [Boas Vindas](#parte1)
2. [Ambiente](#parte2)
3. [Primeiros Passos Visão Geral](#parte3)
4. [Migrations, Seeders e Factories](#parte4)
5. [Eloquent](#parte5)
6. [Factories com Relacionamentos](#parte6)
7. [View: Laravel Blade](#parte7)
8. [View: Manipulação de Formulários](#parte8)
9. [Laravel Router](#parte9)
10. [Manipulando Validações](#parte10)
11. [Controllers como Recurso](#parte11)
12. [Primeiro Starter Point: Laravel UI](#parte12)
13. [Melhorias Projeto Eventos](#parte13)
14. [Upload de Arquivos](#parte14)
15. [Melhorias & Encerramento Bloco 1](#parte15)
16. [ACL & Autorização](#parte16)
17. [Bloco 2 - Iniciando](#parte17)
18. [Primeiros Passos com Livewire](#parte18)
19. [Conhecendo o Tailwind](#parte19)
20. [Iniciando Projeto de Fato](#parte20)
21. [Upload e Processamento de Video](#parte21)
22. [Trabalhando com Filas](#parte22)
23. [Notificações & Player](#parte23)
24. [Relações Polimórficas & Incrementos Projeto](#parte24)
---


## <a name="parte1">1 - Boas Vindas</a>

01 - Seja Bem-Vindo

02 - Quem Sou Eu

03 - Ferramentas

- PHP Storm Para estudantes, solicite em https://www.jetbrains.com/student/

- Para open source, caso você contribua, solicite em https://www.jetbrains.com/community/opensource/

- Visual Studio Code: https://code.visualstudio.com/

[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Ambiente</a>

**04 - Formas de Iniciar Projeto**

- php 7.3+

```
$ php -m
[PHP Modules]
bcmath
ctype
fileinfo
json
mbstring
openssl
PDO
tokenizer
xml

```

05 - Laravel Installer OS X

06 - Laravel Installer Linux

**07 - Laravel Installer Windows**

```
$ composer global require laravel/installer

add PATH Composer e /laravel/bin/

laravel new projeto01

php artisan serve
```

[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - Primeiros Passos Visão Geral</a>
 
- 08 - Iniciando Projeto

  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01)
  - [03-PrimeirosPassosVisaoGeral/projMeusEventos](03-PrimeirosPassosVisaoGeral/projMeusEventos)

- 09 - Diretórios Projeto
- 10 - Panorama Inicial do Laravel

[03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/routes/web.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/routes/web.php)

```php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola-mundo', function () {
    return view('ola-mundo');
});
// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options
```

[03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/resources/views/ola-mundo.blade.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/resources/views/ola-mundo.blade.php)

- 11 - Parâmetros Dinâmicos Rota

```php
Route::get('/ola/{name?}', function ($name = 'Fulano...') {
    return 'Olá, ' . $name;
});
```

- 12 - Rotas & Controllers

```
$ php artisan make:controller HelloWorldController
Controller created successfully.

```
  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/app/Http/Controllers/HelloWorldController.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/app/Http/Controllers/HelloWorldController.php)

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloWorld()
    {
        return view('ola-mundo');
    }

    public function hello($name = 'Fulano')
    {
        return 'Olá, ' . $name;
    }
}

```

```php
Route::get('/ola-mundo', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);
// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options

Route::get('/ola/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);
```

- 13 - O Artisan

```
$ php artisan list
Laravel Framework 8.74.0

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled       Remove the compiled class file
  completion           Dump the shell completion script
  db                   Start a new database CLI session
  down                 Put the application into maintenance / demo mode
  env                  Display the current framework environment
  help                 Display help for a command
  inspire              Display an inspiring quote
  list                 List commands
  migrate              Run the database migrations
  optimize             Cache the framework bootstrap files
  serve                Serve the application on the PHP development server
  test                 Run the application tests
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
 auth
  auth:clear-resets    Flush expired password reset tokens
 cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
 config
  config:cache         Create a cache file for faster configuration loading
  config:clear         Remove the configuration cache file
 db
  db:seed              Seed the database with records
  db:wipe              Drop all tables, views, and types
 event
  event:cache          Discover and cache the application's events and listeners
  event:clear          Clear all cached events and listeners
  event:generate       Generate the missing events and listeners based on registration
  event:list           List the application's events and listeners
 key
  key:generate         Set the application key
 make
  make:cast            Create a new custom Eloquent cast class
  make:channel         Create a new channel class
  make:command         Create a new Artisan command
  make:component       Create a new view component class
  make:controller      Create a new controller class
  make:event           Create a new event class
  make:exception       Create a new custom exception class
  make:factory         Create a new model factory
  make:job             Create a new job class
  make:listener        Create a new event listener class
  make:mail            Create a new email class
  make:middleware      Create a new middleware class
  make:migration       Create a new migration file
  make:model           Create a new Eloquent model class
  make:notification    Create a new notification class
  make:observer        Create a new observer class
  make:policy          Create a new policy class
  make:provider        Create a new service provider class
  make:request         Create a new form request class
  make:resource        Create a new resource
  make:rule            Create a new validation rule
  make:seeder          Create a new seeder class
  make:test            Create a new test class
 migrate
  migrate:fresh        Drop all tables and re-run all migrations
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
 model
  model:prune          Prune models that are no longer needed
 notifications
  notifications:table  Create a migration for the notifications table
 optimize
  optimize:clear       Remove the cached bootstrap files
 package
  package:discover     Rebuild the cached package manifest
 queue
  queue:batches-table  Create a migration for the batches database table
  queue:clear          Delete all of the jobs from the specified queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:monitor        Monitor the size of the specified queues
  queue:prune-batches  Prune stale entries from the batches database
  queue:prune-failed   Prune stale entries from the failed jobs table
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:retry-batch    Retry the failed jobs for a batch
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
 route
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
 sail
  sail:install         Install Laravel Sail's default Docker Compose file
  sail:publish         Publish the Laravel Sail Docker files
 schedule
  schedule:list        List the scheduled commands
  schedule:run         Run the scheduled commands
  schedule:test        Run a scheduled command
  schedule:work        Start the schedule worker
 schema
  schema:dump          Dump the given database schema
 session
  session:table        Create a migration for the session database table
 storage
  storage:link         Create the symbolic links configured for the application
 stub
  stub:publish         Publish all stubs that are available for customization
 vendor
  vendor:publish       Publish any publishable assets from vendor packages
 view
  view:cache           Compile all of the application's Blade templates
  view:clear           Clear all compiled view files

```

```
$ php artisan make:controller --help
Description:
  -p, --parent[=PARENT]  Generate a nested resource controller class.
  -r, --resource         Generate a resource controller class.
  -R, --requests         Generate FormRequest classes for store and update.
      --test             Generate an accompanying PHPUnit test for the Controller
      --pest             Generate an accompanying Pest test for the Controller
  -h, --help             Display help for the given command. When no command is given display help for the list command
  -q, --quiet            Do not output any message
  -V, --version          Display this application version
      --ansi|--no-ansi   Force (or disable --no-ansi) ANSI output
  -n, --no-interaction   Do not ask any interactive question
      --env[=ENV]        The environment the command should run under
  -v|vv|vvv, --verbose   Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

```

- 14 - Entendendo as Configurações

  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/.env](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/.env)
  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/config/database.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/config/database.php)

- 15 - Migrations

  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/database/migrations](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/database/migrations)

- 16 - Executando Migrations

```
$ php artisan migrate:install
Migration table created successfully.

$ php artisan migrate:install
Migration table created successfully.
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (55.39ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (410.00ms)

```

- 17 - Criando Primeira Migração

```
$ php artisan make:migration create_events_table
Created Migration: 2021_12_08_235820_create_events_table

```

[03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/database/migrations/2021_12_08_235820_create_events_table.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/database/migrations/2021_12_08_235820_create_events_table.php)

```php
public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }
```

```
$ php artisan migrate
Migrating: 2021_12_08_235820_create_events_table
Migrated:  2021_12_08_235820_create_events_table (26.07ms)

```


- 18 - Os Models

- 03-PrimeirosPassosVisaoGeral/projMeusEventos/app/Models/User.php

```php
class User extends Authenticatable
{
    // protected $table = 'usuarios'; // Caso use outro nome na tabela
```


```
$ php artisan make:model Event
Model created successfully.

```

  -[03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/app/Models/Event.php](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/app/Models/Event.php)


- 19 - O Eloquent e Queries


```php
Route::get('/queries/{id}', function ($id) {
    // $events = \App\Models\Event::all(); // select * from events
    // $events = \App\Models\Event::all(['title', 'description']); // select title, description from events

    // $events = \App\Models\Event::where('id', 1)->get(); // select * from events WHERE id = 1
    // $events = \App\Models\Event::where('id', 1)->first(); // select * from events WHERE id = 1
    $events = \App\Models\Event::find($id); // select * from events WHERE id = 1

    return $events;
});

```

- 20 - O Tinker


```
$ php artisan tinker
Psy Shell v0.10.12 (PHP 7.4.19 — cli) by Justin Hileman
>>>   
```

```
$ php artisan tinker
Psy Shell v0.10.12 (PHP 7.4.19 — cli) by Justin Hileman
>>> \App\Models\Event::all();                                                                                                                                                                              
=> Illuminate\Database\Eloquent\Collection {#4263
     all: [
       App\Models\Event {#4265
         id: 1,
         title: "Evento Teste",
         description: "Descrição de Teste do evento",
         created_at: "2021-12-08 21:29:23",
         updated_at: "2021-12-08 21:29:25",
       },
       App\Models\Event {#4264
         id: 2,
         title: "Evento Teste 2",
         description: "Descrição 2 de Teste do evento",
         created_at: "2021-12-07 21:29:23",
         updated_at: "2021-12-08 21:29:25",
       },
     ],
   }
>>> \App\Models\Event::where('id', 1)->first();                                                                                                                                                            
=> App\Models\Event {#3533
     id: 1,
     title: "Evento Teste",
     description: "Descrição de Teste do evento",
     created_at: "2021-12-08 21:29:23",
     updated_at: "2021-12-08 21:29:25",
   }
>>>                                                                   
```

- 21 - Assets Frontend

  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/resources](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/resources)

```
$ npm i

$ npm run dev

```
  
  - [03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/public](03-PrimeirosPassosVisaoGeral/proj-meuseventos-03-01/public)


- 22 - Conclusões

[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Migrations, Seeders e Factories</a>

- 23 Introdução

- 24 Seeders e Factories

- 25 Executando Seeds e Factories

https://github.com/fzaninotto/Faker


- [03-PrimeirosPassosVisaoGeral/projMeusEventos/database/factories/UserFactory.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/database/factories/UserFactory.php)
```php
public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
```

-[03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/DatabaseSeeder.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/DatabaseSeeder.php)

```php
    public function run()
    {
        \App\Models\User::factory(10)->create();
    }
```

```bash
$ php artisan db:seed
Database seeding completed successfully.

```

- 26 Primeira Factory e Seeds

```bash
$ php artisan make:factory EventFactory
Factory created successfully.

```

- [03-PrimeirosPassosVisaoGeral/projMeusEventos/database/factories/EventFactory.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/database/factories/EventFactory.php)

```php
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
    }
```

```php
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Event::factory(30)->create();
    }
}
```

```bash
$ php artisan db:seed
Database seeding completed successfully.

```

```bash
$ php artisan make:seeder UsersTableSeeder
Seeder created successfully.

$ php artisan make:seeder EventsTableSeeder
Seeder created successfully.

```
- [03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/EventsTableSeeder.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/EventsTableSeeder.php)
- [03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/UsersTableSeeder.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/database/seeders/UsersTableSeeder.php)

```bash
$ php artisan db:seed
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (110.22ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (19.99ms)
Database seeding completed successfully.

```

- 27 Comandos Fresh e Refresh

```
$ php artisan migrate:status
+------+-------------------------------------------------------+-------+
| Ran? | Migration                                             | Batch |
+------+-------------------------------------------------------+-------+
| Yes  | 2014_10_12_000000_create_users_table                  | 1     |
| Yes  | 2014_10_12_100000_create_password_resets_table        | 1     |
| Yes  | 2019_08_19_000000_create_failed_jobs_table            | 1     |
| Yes  | 2019_12_14_000001_create_personal_access_tokens_table | 1     |
| Yes  | 2021_12_08_235820_create_events_table                 | 1     |
+------+-------------------------------------------------------+-------+

```

```
$ php artisan migrate:refresh
Rolling back: 2021_12_08_235820_create_events_table
Rolled back:  2021_12_08_235820_create_events_table (9.16ms)
Rolling back: 2019_12_14_000001_create_personal_access_tokens_table
Rolled back:  2019_12_14_000001_create_personal_access_tokens_table (6.07ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (7.42ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (5.46ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (5.38ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (24.02ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (23.45ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (23.16ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (44.39ms)
Migrating: 2021_12_08_235820_create_events_table
Migrated:  2021_12_08_235820_create_events_table (14.45ms)

```

```
$ php artisan migrate:refresh --seed
Rolling back: 2021_12_08_235820_create_events_table
Rolled back:  2021_12_08_235820_create_events_table (11.78ms)
Rolling back: 2019_12_14_000001_create_personal_access_tokens_table
Rolled back:  2019_12_14_000001_create_personal_access_tokens_table (6.56ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (7.85ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (7.31ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (6.81ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (31.31ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (27.99ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (29.84ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (45.24ms)
Migrating: 2021_12_08_235820_create_events_table
Migrated:  2021_12_08_235820_create_events_table (16.64ms)
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (675.62ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (81.61ms)
Database seeding completed successfully.

```

- Apaga todo o banco e refaz. Apaga outras tabelas que não estão na migrations.

```
$ php artisan migrate:fresh --seed
Dropped all tables successfully.
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (45.61ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (33.54ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (36.86ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (47.11ms)
Migrating: 2021_12_08_235820_create_events_table
Migrated:  2021_12_08_235820_create_events_table (18.63ms)
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (99.36ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (21.74ms)
Database seeding completed successfully.


```

- 28 Comando Rollback e Reset

```
$ php artisan migrate:rollback
Rolling back: 2021_12_08_235820_create_events_table
Rolled back:  2021_12_08_235820_create_events_table (12.19ms)
Rolling back: 2019_12_14_000001_create_personal_access_tokens_table
Rolled back:  2019_12_14_000001_create_personal_access_tokens_table (5.59ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (6.01ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (5.30ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (5.28ms)

```

```
$ php artisan migrate
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (25.64ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (23.68ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (22.53ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (38.29ms)
Migrating: 2021_12_08_235820_create_events_table
Migrated:  2021_12_08_235820_create_events_table (13.67ms)

```

```
$ php artisan migrate:rollback --step=2

```

```
$ php artisan migrate:reset

```


- 29 Falando Sobre Migrações

- 30 Uma Migração de Edição

```
$ php artisan make:migration alter_events_table_add_columnslug --table=events
Created Migration: 2022_07_01_015511_alter_events_table_add_columnslug

```

```php
 public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
```

```
$ php artisan migrate
Migrating: 2022_07_01_015511_alter_events_table_add_columnslug
Migrated:  2022_07_01_015511_alter_events_table_add_columnslug (77.40ms)


$ php artisan migrate:status
+------+-------------------------------------------------------+-------+
| Ran? | Migration                                             | Batch |
+------+-------------------------------------------------------+-------+
| Yes  | 2014_10_12_000000_create_users_table                  | 1     |
| Yes  | 2014_10_12_100000_create_password_resets_table        | 1     |
| Yes  | 2019_08_19_000000_create_failed_jobs_table            | 1     |
| Yes  | 2019_12_14_000001_create_personal_access_tokens_table | 1     |
| Yes  | 2021_12_08_235820_create_events_table                 | 1     |
| Yes  | 2022_07_01_015511_alter_events_table_add_columnslug   | 2     |
+------+-------------------------------------------------------+-------+

```

- 31 Schema Dump

```
$ php artisan schema:dump
mysqldump: [Warning] Using a password on the command line interface can be insecure.
mysqldump: [ERROR] unknown variable 'column-statistics=0'
mysqldump: [Warning] Using a password on the command line interface can be insecure.
Database schema dumped successfully.

```

```
$ php artisan migrate:refresh --seed
Rolling back: 2022_07_01_015511_alter_events_table_add_columnslug
Rolled back:  2022_07_01_015511_alter_events_table_add_columnslug (73.39ms)
Rolling back: 2021_12_08_235820_create_events_table
Rolled back:  2021_12_08_235820_create_events_table (5.18ms)
Rolling back: 2019_12_14_000001_create_personal_access_tokens_table
Rolled back:  2019_12_14_000001_create_personal_access_tokens_table (5.11ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (6.05ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (6.25ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (6.23ms)
Loading stored database schema: C:\Users\josem\Documents\workspaces\Laravel-Mastery-CodeExperts\03-PrimeirosPassosVisaoGeral\projMeusEventos\database\schema/mysql-schema.dump
Loaded stored database schema. (464.68ms)
Nothing to migrate.
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (60.86ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (16.62ms)
Database seeding completed successfully.

```


- 32 Conclusões


[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Eloquent</a>

- 33 Introdução
- 34 Relembrando Models
- 35 Active Record Inserção

```php
Route::get('/queries/{event?}', function ($event = null){
  
    $event = new \App\Models\Event();
    $event->title = 'Evento TESTE via Eloquent e AR';
    $event->description = 'Evento teste';
    $event->body = 'corpo do evento';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();

});
```

- 36 Active Record Atualização

```php

Route::get('/queries/{event?}', function ($event = null){

    $event = \App\Models\Event::find(8);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();

});
```

- 37 Mass Assignment Criação

```php
Route::get('/queries/{event?}', function ($event = null){

    // Atribuição Massa ou Mass Assingnment
    $event = [
        'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição',
        'body' => 'Conteudo do Evento',
        'slug' => 'evento-atribuicao-em-massa',
        'start_event' => date('Y-m-d H:i:s')
    ];

    return \App\Models\Event::create($event);
    return $event;

});
```

```php
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'start_event'
    ];
}
```

- 38 Update em Massa

```php
Route::get('/queries/{event?}', function ($event = null){

    $eventDATA = [
       // 'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição ATUALIZADA',
       // 'body' => 'Conteudo do Evento',
       // 'slug' => 'evento-atribuicao-em-massa',
       // 'start_event' => date('Y-m-d H:i:s')
    ];

    $event = \App\Models\Event::find(9);
    $event->update($eventDATA);

    return $event;

});
```

- 39 Removendo Dados

```php
    $event = \App\Models\Event::findOrFail(9);

    return $event->delete(); // 1
```

```php
return \App\Models\Event::destroy([8,7,6]); // 3
```

- 40 Organizando CRUD

visão geral!

```
$ php artisan make:controller EventController
Controller created successfully.

```

- 41 Prelúdio Relacionamentos
- 42 Migração Tabela Perfil

```
$ php artisan make:model Profile -m
Model created successfully.
Created Migration: 2022_07_01_181916_create_profiles_table

```

```php
public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // user_id (conter a chave estrangeira) && a chave estrangeira ela tem um padrão:
            // profiles_user_id_foreign
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->text('about')->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('social_networks')->nullable();

            $table->timestamps();

            // Definindo chave estrangeira anterior ao laravel 7
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }
```

```
$ php artisan migrate
Migrating: 2022_07_01_181916_create_profiles_table
Migrated:  2022_07_01_181916_create_profiles_table (143.46ms)
```

- 43 Mapeando 1:1 Models

```php
lass User extends Authenticatable
{
    // (...)

    // Representa a ligação entre o Model User E Model Profile
    // e indica que USER tem um Profile
    public function profile()
    {
        // automaticamente procura por esta coluna: user_id em profiles
        return $this->hasOne(Profile::class);
        // return $this->hasOne(Profile::class, 'usuario_id'); // outro parametro
    }
```

```php
class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        // por conta do nome do método que a coluna é user_id
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'usuario_id', 'codigo');
    }
}
```

- 44 Salvando 1:1

```
>>> $profile2 = new \App\Models\Profile();                                                                                                                                                                              
=> App\Models\Profile {#4458}
>>> $profile2->about = 'Sobre Mim'                                                                                                                                                                                      
=> "Sobre Mim"
>>> $profile2->social_networks = 'faceboo';                                                                                                                                                                             
=> "faceboo"
>>> $profile2->phone = '9999999';                                                                                                                                                                                       
=> "9999999"

>>> $user = \App\Models\User::find(2);                                                                                                                                                                                  
=> App\Models\User {#3535
     id: 2,
     name: "Lizeth Rodriguez",
     email: "carol.roob@example.net",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "2Pr0peZR1v",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }
>>> $user->profile()->save($profile2)                                                                                                                                                                                   
=> App\Models\Profile {#4458
     about: "Sobre Mim",
     social_networks: "faceboo",
     phone: "9999999",
     user_id: 2,
     updated_at: "2022-07-02 01:47:02",
     created_at: "2022-07-02 01:47:02",
     id: 2,
   }

```

```
>>> $user = \App\Models\User::find(3)                                                                                                                                                                                   
=> App\Models\User {#3847
     id: 3,
     name: "Miss Dessie Green DVM",
     email: "ntromp@example.com",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "5RHM4dp9Q8",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }
>>> $p = [ 'about'=>'sobre mim', 'phone'=>'8888', 'social_networks'=>'twitter' ];                                                                                                                                       
=> [
     "about" => "sobre mim",
     "phone" => "8888",
     "social_networks" => "twitter",
   ]
(cont...)
```

```php
protected $fillable = ['about', 'phone' , 'social_networks'];
```

```
>>> $user->profile()->create($p);                                                                                                                                                                                       
=> App\Models\Profile {#4458
     about: "sobre mim",
     phone: "8888",
     social_networks: "twitter",
     user_id: 3,
     updated_at: "2022-07-02 01:54:24",
     created_at: "2022-07-02 01:54:24",
     id: 3,
   }

```


- 45 Recuperando 1:1

```
>>> $u = \App\Models\User::find(1);                                                                                                                                                                                     
=> App\Models\User {#3849
     id: 1,
     name: "Sibyl Runolfsson",
     email: "tmohr@example.net",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "0YP0lcIM4e",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }
>>> $u->profile();                                                                                                                                                                                                      
=> Illuminate\Database\Eloquent\Relations\HasOne {#3525}

>>> $u->profile;                                                                                                                                                                                                        
=> App\Models\Profile {#4209
     id: 1,
     user_id: 1,
     about: "Sobre Mim",
     phone: "9999999",
     social_networks: "facebook, google, twitter",
     created_at: "2022-07-02 01:43:02",
     updated_at: "2022-07-02 01:43:02",
   }

>>> $u->profile()->get();                                                                                                                                                                                               
=> Illuminate\Database\Eloquent\Collection {#4457
     all: [
       App\Models\Profile {#4458
         id: 1,
         user_id: 1,
         about: "Sobre Mim",
         phone: "9999999",
         social_networks: "facebook, google, twitter",
         created_at: "2022-07-02 01:43:02",
         updated_at: "2022-07-02 01:43:02",
       },
     ],
   }

```

```
>>> $unot = \App\Models\User::find(4);                                                                                                                                                                                  
=> App\Models\User {#4461
     id: 4,
     name: "Dr. Brisa Pacocha",
     email: "znienow@example.org",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "nhEcg5geys",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }
>>> $unot->profile;                                                                                                                                                                                                     
=> null
>>> $unot->profile()->exists();                                                                                                                                                                                         
=> false

```

```
>>> $p = \App\Models\Profile::find(1)                                                                                                                                                                                   
=> App\Models\Profile {#3530
     id: 1,
     user_id: 1,
     about: "Sobre Mim",
     phone: "9999999",
     social_networks: "facebook, google, twitter",
     created_at: "2022-07-02 01:43:02",
     updated_at: "2022-07-02 01:43:02",
   }

>>> $p->user()->first();                                                                                                                                                                                                
=> App\Models\User {#4466
     id: 1,
     name: "Sibyl Runolfsson",
     email: "tmohr@example.net",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "0YP0lcIM4e",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }

>>> $p->user                                                                                                                                                                                                            
=> App\Models\User {#4468
     id: 1,
     name: "Sibyl Runolfsson",
     email: "tmohr@example.net",
     email_verified_at: "2022-07-01 02:06:50",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "0YP0lcIM4e",
     created_at: "2022-07-01 02:06:50",
     updated_at: "2022-07-01 02:06:50",
   }

>>> $p->user->name                                                                                                                                                                                                      
=> "Sibyl Runolfsson"

```


- 46 Migração 1:N

```
$ php artisan make:model Photo -m
Model created successfully.
Created Migration: 2022_07_02_202521_create_photos_table

```

```php
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            $table->string('photo');

            $table->timestamps();
        });
    }
```



- 47 Mapeando 1:N Models

```php
class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
```

```php
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'start_event'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);// event_id
    }
}
```

- 48 Salvando 1:N

```
>>> $photo = ['photo'=> 'imagem.jpg'];                                                                                                                                                                                  
=> [
     "photo" => "imagem.jpg",
   ]
>>> \App\Models\Event::find(1);                                                                                                                                                                                         
=> App\Models\Event {#3847
     id: 1,
     title: "Nisi error quia voluptas modi.",
     description: "quibusdam a voluptates animi vel consequatur expedita",
     body: "Sunt nam magnam tempora dicta iure enim. Soluta harum qui expedita sed repellendus. Repellat veniam hic qui asperiores ratione voluptas sint et.",
     start_event: "2022-07-02 20:35:49",
     created_at: "2022-07-02 20:35:49",
     updated_at: "2022-07-02 20:35:49",
     slug: "nisi-error-quia-voluptas-modi",
   }

>>> \App\Models\Event::find(1)->photos()->create($photo);                                                                                                                                                               
=> App\Models\Photo {#4454
     photo: "imagem.jpg",
     event_id: 1,
     updated_at: "2022-07-02 20:51:54",
     created_at: "2022-07-02 20:51:54",
     id: 1,
   }

```

```
>>> $photo = new \App\Models\Photo();                                                                                                                                                                                   
=> App\Models\Photo {#4457}

>>> $photo->photo = 'imagem2.jpg';                                                                                                                                                                                      
=> "imagem2.jpg"

>>> \App\Models\Event::find(1)->photos()->save($photo);                                                                                                                                                                 
=> App\Models\Photo {#4457
     photo: "imagem2.jpg",
     event_id: 1,
     updated_at: "2022-07-02 20:55:52",
     created_at: "2022-07-02 20:55:52",
     id: 2,
   }

```

```
>>> namespace App\Models                                                                                                                                                                                                
>>> $photo1 = new Photo();                                                                                                                                                                                              
=> App\Models\Photo {#4458}
>>> $photo1->photo = 'exemplo-1.jpg'                                                                                                                                                                                    
=> "exemplo-1.jpg"
>>> $photo2 = new Photo();                                                                                                                                                                                              
=> App\Models\Photo {#4456}
>>> $photo2->photo = 'exemplo-2.jpg'                                                                                                                                                                                    
=> "exemplo-2.jpg"
>>> $photos = [$photo1, $photo2];                                                                                                                                                                                       
=> [
     App\Models\Photo {#4458
       photo: "exemplo-1.jpg",
     },
     App\Models\Photo {#4456
       photo: "exemplo-2.jpg",
     },
   ]

>>> Event::find(2)->photos()->saveMany($photos);                                                                                                                                                                        
=> [
     App\Models\Photo {#4458
       photo: "exemplo-1.jpg",
       event_id: 2,
       updated_at: "2022-07-02 21:00:57",
       created_at: "2022-07-02 21:00:57",
       id: 3,
     },
     App\Models\Photo {#4456
       photo: "exemplo-2.jpg",
       event_id: 2,
       updated_at: "2022-07-02 21:00:57",
       created_at: "2022-07-02 21:00:57",
       id: 4,
     },
   ]

```

```
>>> $photo1 = ['photo' => 'foto-ok-01.jpg'];                                                                                                                                                                            
=> [
     "photo" => "foto-ok-01.jpg",
   ]
>>> $photo2 = ['photo' => 'foto-ok-02.jpg'];                                                                                                                                                                            
=> [
     "photo" => "foto-ok-02.jpg",
   ]
>>> $photos = [$photo1, $photo2];                                                                                                                                                                                       
=> [
     [
       "photo" => "foto-ok-01.jpg",
     ],
     [
       "photo" => "foto-ok-02.jpg",
     ],
   ]

>>> Event::find(3)->photos()->createMany($photos);                                                                                                                                                                      
=> Illuminate\Database\Eloquent\Collection {#4459
     all: [
       App\Models\Photo {#4466
         photo: "foto-ok-01.jpg",
         event_id: 3,
         updated_at: "2022-07-02 21:18:22",
         created_at: "2022-07-02 21:18:22",
         id: 5,
       },
       App\Models\Photo {#4462
         photo: "foto-ok-02.jpg",
         event_id: 3,
         updated_at: "2022-07-02 21:18:22",
         created_at: "2022-07-02 21:18:22",
         id: 6,
       },
     ],
   }
                                               
```


- 49 Recuperando 1:N

```
>>> $event = Event::find(1);                                                                                                                                                                                            
=> App\Models\Event {#4458
     id: 1,
     title: "Nisi error quia voluptas modi.",
     description: "quibusdam a voluptates animi vel consequatur expedita",
     body: "Sunt nam magnam tempora dicta iure enim. Soluta harum qui expedita sed repellendus. Repellat veniam hic qui asperiores ratione voluptas sint et.",
     start_event: "2022-07-02 20:35:49",
     created_at: "2022-07-02 20:35:49",
     updated_at: "2022-07-02 20:35:49",
     slug: "nisi-error-quia-voluptas-modi",
   }

>>> $event->photos                                                                                                                                                                                                      
=> Illuminate\Database\Eloquent\Collection {#4462
     all: [
       App\Models\Photo {#4468
         id: 1,
         event_id: 1,
         photo: "imagem.jpg",
         created_at: "2022-07-02 20:51:54",
         updated_at: "2022-07-02 20:51:54",
       },
       App\Models\Photo {#4473
         id: 2,
         event_id: 1,
         photo: "imagem2.jpg",
         created_at: "2022-07-02 20:55:52",
         updated_at: "2022-07-02 20:55:52",
       },
     ],
   }

>>> $event->photos()                                                                                                                                                                                                    
=> Illuminate\Database\Eloquent\Relations\HasMany {#4459}

>>> $event->photos()->get();                                                                                                                                                                                            
=> Illuminate\Database\Eloquent\Collection {#4472
     all: [
       App\Models\Photo {#4478
         id: 1,
         event_id: 1,
         photo: "imagem.jpg",
         created_at: "2022-07-02 20:51:54",
         updated_at: "2022-07-02 20:51:54",
       },
       App\Models\Photo {#4481
         id: 2,
         event_id: 1,
         photo: "imagem2.jpg",
         created_at: "2022-07-02 20:55:52",
         updated_at: "2022-07-02 20:55:52",
       },
     ],
   }

>>> $event->photos()->limit(1)->get();                                                                                                                                                                                  
=> Illuminate\Database\Eloquent\Collection {#4474
     all: [
       App\Models\Photo {#4476
         id: 1,
         event_id: 1,
         photo: "imagem.jpg",
         created_at: "2022-07-02 20:51:54",
         updated_at: "2022-07-02 20:51:54",
       },
     ],
   }

>>> $event->photos()->orderBy('id', 'desc')->get();                                                                                                                                                                     
=> Illuminate\Database\Eloquent\Collection {#3525
     all: [
       App\Models\Photo {#4472
         id: 2,
         event_id: 1,
         photo: "imagem2.jpg",
         created_at: "2022-07-02 20:55:52",
         updated_at: "2022-07-02 20:55:52",
       },
       App\Models\Photo {#4456
         id: 1,
         event_id: 1,
         photo: "imagem.jpg",
         created_at: "2022-07-02 20:51:54",
         updated_at: "2022-07-02 20:51:54",
       },
     ],
   }
>>>                                          
```

```
>>> $photos = $event->photos;                                                                                                                                                                                           
=> Illuminate\Database\Eloquent\Collection {#4462
     all: [
       App\Models\Photo {#4468
         id: 1,
         event_id: 1,
         photo: "imagem.jpg",
         created_at: "2022-07-02 20:51:54",
         updated_at: "2022-07-02 20:51:54",
       },
       App\Models\Photo {#4473
         id: 2,
         event_id: 1,
         photo: "imagem2.jpg",
         created_at: "2022-07-02 20:55:52",
         updated_at: "2022-07-02 20:55:52",
       },
     ],
   }

>>> $photos->count();                                                                                                                                                                                                   
=> 2

>>> $photos->map(function($model) {return $model->photo;})                                                                                                                                                              
=> Illuminate\Support\Collection {#4459
     all: [
       "imagem.jpg",
       "imagem2.jpg",
     ],
   }


```

```
>>> Photo::find(1)                                                                                                                                                                                                      
=> App\Models\Photo {#4481
     id: 1,
     event_id: 1,
     photo: "imagem.jpg",
     created_at: "2022-07-02 20:51:54",
     updated_at: "2022-07-02 20:51:54",
   }
>>> Photo::find(1)->event;                                                                                                                                                                                              
=> App\Models\Event {#4476
     id: 1,
     title: "Nisi error quia voluptas modi.",
     description: "quibusdam a voluptates animi vel consequatur expedita",
     body: "Sunt nam magnam tempora dicta iure enim. Soluta harum qui expedita sed repellendus. Repellat veniam hic qui asperiores ratione voluptas sint et.",
     start_event: "2022-07-02 20:35:49",
     created_at: "2022-07-02 20:35:49",
     updated_at: "2022-07-02 20:35:49",
     slug: "nisi-error-quia-voluptas-modi",
   }

```

- 50 Migração N:N

```
$ php artisan make:model Category -m
Model created successfully.
Created Migration: 2022_07_02_214924_create_categories_table

```

```php
public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('description')->nullable();
            $table->string('slug');

            $table->timestamps();
        });
    }
```

```
$ php artisan make:migration create_category_event_table
Created Migration: 2022_07_02_215434_create_category_event_table

```

```php
  public function up()
    {
        Schema::create('category_event', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

        });
    }
```

```
$ php artisan migrate
Migrating: 2022_07_02_214924_create_categories_table
Migrated:  2022_07_02_214924_create_categories_table (14.65ms)
Migrating: 2022_07_02_215434_create_category_event_table
Migrated:  2022_07_02_215434_create_category_event_table (81.11ms)

```

- 51 Gerando Algumas Categories

```
$ php artisan make:factory CategoryFactory
Factory created successfully.

```

```php
 public function definition()
    {
        $categoryName = $this->faker->word;
        return [
            'name' => $categoryName,
            'description' => $this->faker->sentence,
            'slug' => Str::slug($categoryName),
            
        ];
    }
```

```
>>> \App\Models\Category::factory(5)->create();                                                                                                                                                                         
=> Illuminate\Database\Eloquent\Collection {#3557
     all: [
       App\Models\Category {#3560
         nome: "ipsum",
         description: "Commodi mollitia voluptatem nihil sit est nihil perferendis id.",
         slug: "ipsum",
         updated_at: "2022-07-02 22:05:23",
         created_at: "2022-07-02 22:05:23",
         id: 1,
       },
       App\Models\Category {#3561
         nome: "alias",
         description: "Similique ducimus neque at suscipit aut.",
         slug: "alias",
         updated_at: "2022-07-02 22:05:23",
         created_at: "2022-07-02 22:05:23",
         id: 2,
       },
       App\Models\Category {#3562
         nome: "error",
         description: "Quam ex vitae commodi quia accusantium.",
         slug: "error",
         updated_at: "2022-07-02 22:05:23",
         created_at: "2022-07-02 22:05:23",
         id: 3,
       },
       App\Models\Category {#3563
         nome: "cum",
         description: "Sed ut eius ut velit nemo sapiente ut autem.",
         slug: "cum",
         updated_at: "2022-07-02 22:05:23",
         created_at: "2022-07-02 22:05:23",
         id: 4,
       },
       App\Models\Category {#3564
         nome: "ipsa",
         description: "Eum et non quam ex blanditiis.",
         slug: "ipsa",
         updated_at: "2022-07-02 22:05:23",
         created_at: "2022-07-02 22:05:23",
         id: 5,
       },
     ],
   }

```


- 52 Mapeando N:N Models

```php
class Category extends Model
{
// (...)
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}

```

```php
class Event extends Model
{
// (...)

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

```

- 53 Salvando N:N

```
>>> namespace App\Models;                                                                                                                                                                                               
>>> $e = Event::find(1);                                                                                                                                                                                                
=> App\Models\Event {#3850
     id: 1,
     title: "Nisi error quia voluptas modi.",
     description: "quibusdam a voluptates animi vel consequatur expedita",
     body: "Sunt nam magnam tempora dicta iure enim. Soluta harum qui expedita sed repellendus. Repellat veniam hic qui asperiores ratione voluptas sint et.",
     start_event: "2022-07-02 20:35:49",
     created_at: "2022-07-02 20:35:49",
     updated_at: "2022-07-02 20:35:49",
     slug: "nisi-error-quia-voluptas-modi",
   }

>>> $e->categories()->attach([1,2,3]);                                                                                                                                                                                  
=> null

>>> $e->categories()->attach([4]);                                                                                                                                                                                      
=> null

>>> $e->categories()->detach([1,3]);                                                                                                                                                                                    
=> 2

```

```
>>> $e->categories()->sync([2]);                                                                                                                                                                                        
=> [
     "attached" => [],
     "detached" => [
       1 => 4,
     ],
     "updated" => [],
   ]

>>> $e->categories()->sync([1,3,5]);                                                                                                                                                                                    
=> [
     "attached" => [
       5,
     ],
     "detached" => [],
     "updated" => [],
   ]

```

```
>>> $e->categories()->toggle([1,3,5]);                                                                                                                                                                                  
=> [
     "attached" => [],
     "detached" => [
       1,
       3,
       5,
     ],
   ]

>>> $e->categories()->toggle([1,3,5]);                                                                                                                                                                                  
=> [
     "attached" => [
       1,
       3,
       5,
     ],
     "detached" => [],
   ]

>>> $e->categories()->toggle([2]);                                                                                                                                                                                      
=> [
     "attached" => [
       2,
     ],
     "detached" => [],
   ]
>>> $e->categories()->toggle([2]);                                                                                                                                                                                      
=> [
     "attached" => [],
     "detached" => [
       2,
     ],
   ]

>>> $e->categories()->sync([4]);                                                                                                                                                                                        
=> [
     "attached" => [
       4,
     ],
     "detached" => [
       1,
       3,
       5,
     ],
     "updated" => [],
   ]

```

- 54 Recuperando N:N

```
>>> $e->categories                                                                                                                                                                                                      
=> Illuminate\Database\Eloquent\Collection {#4475
     all: [
       App\Models\Category {#4477
         id: 4,
         nome: "cum",
         description: "Sed ut eius ut velit nemo sapiente ut autem.",
         slug: "cum",
         created_at: "2022-07-02 22:05:23",
         updated_at: "2022-07-02 22:05:23",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#3521
           event_id: 1,
           category_id: 4,
         },
       },
     ],
   }

>>> $e->categories->count();                                                                                                                                                                                            
=> 1

>>> $e->categories();                                                                                                                                                                                                   
=> Illuminate\Database\Eloquent\Relations\BelongsToMany {#4492
     +withTimestamps: false,
   }

```

```
>>> $cat = Category::find(4);                                                                                                                                                                                           
=> App\Models\Category {#4314
     id: 4,
     nome: "cum",
     description: "Sed ut eius ut velit nemo sapiente ut autem.",
     slug: "cum",
     created_at: "2022-07-02 22:05:23",
     updated_at: "2022-07-02 22:05:23",
   }

>>> $cat->events                                                                                                                                                                                                        
=> Illuminate\Database\Eloquent\Collection {#4488
     all: [
       App\Models\Event {#4480
         id: 1,
         title: "Nisi error quia voluptas modi.",
         description: "quibusdam a voluptates animi vel consequatur expedita",
         body: "Sunt nam magnam tempora dicta iure enim. Soluta harum qui expedita sed repellendus. Repellat veniam hic qui asperiores ratione voluptas sint et.",
         start_event: "2022-07-02 20:35:49",
         created_at: "2022-07-02 20:35:49",
         updated_at: "2022-07-02 20:35:49",
         slug: "nisi-error-quia-voluptas-modi",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4470
           category_id: 4,
           event_id: 1,
         },
       },
     ],
   }

>>> $cat->events()->toggle([1,2,3,4]);                                                                                                                                                                                  
=> [
     "attached" => [
       2,
       3,
       4,
     ],
     "detached" => [
       1,
     ],
   ]

>>> $cat->events()->count();                                                                                                                                                                                            
=> 3

>>> $cat = Category::find(4);                                                                                                                                                                                           
=> App\Models\Category {#4498
     id: 4,
     nome: "cum",
     description: "Sed ut eius ut velit nemo sapiente ut autem.",
     slug: "cum",
     created_at: "2022-07-02 22:05:23",
     updated_at: "2022-07-02 22:05:23",
   }

>>> $cat->events                                                                                                                                                                                                        
=> Illuminate\Database\Eloquent\Collection {#4500
     all: [
       App\Models\Event {#3533
         id: 2,
         title: "A consequatur laboriosam numquam doloribus harum molestiae.",
         description: "quam quidem quasi provident rem ea animi",
         body: "Magni vel amet nam dolorem. Molestiae autem laudantium illum et nihil odio. Cumque rem sed expedita dignissimos aliquam distinctio. Minus consectetur minima quisquam dicta amet ut.",
         start_event: "2022-07-02 20:35:49",
         created_at: "2022-07-02 20:35:49",
         updated_at: "2022-07-02 20:35:49",
         slug: "a-consequatur-laboriosam-numquam-doloribus-harum-molestiae",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4491
           category_id: 4,
           event_id: 2,
         },
       },
       App\Models\Event {#4478
         id: 3,
         title: "Similique porro modi dolorem qui quia quibusdam molestias officia.",
         description: "laudantium enim esse et cupiditate ex fugit",
         body: "Similique sed occaecati quasi aut sit illo incidunt qui. Aliquam ea et neque dolor ut accusamus nulla hic. Natus reprehenderit quia sed tempore optio quo pariatur.",
         start_event: "2022-07-02 20:35:49",
         created_at: "2022-07-02 20:35:49",
         updated_at: "2022-07-02 20:35:49",
         slug: "similique-porro-modi-dolorem-qui-quia-quibusdam-molestias-officia",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4492
           category_id: 4,
           event_id: 3,
         },
       },
       App\Models\Event {#4503
         id: 4,
         title: "Dicta id nulla aut omnis ut praesentium aspernatur.",
         description: "ipsum qui ut optio rerum possimus voluptate",
         body: "Velit debitis quae aut iure harum ut. Atque temporibus minima velit dolorem velit. Cum enim cumque et distinctio sequi. Atque quia qui asperiores natus vel accusamus fugiat.",
         start_event: "2022-07-02 20:35:49",
         created_at: "2022-07-02 20:35:49",
         updated_at: "2022-07-02 20:35:49",
         slug: "dicta-id-nulla-aut-omnis-ut-praesentium-aspernatur",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#3520
           category_id: 4,
           event_id: 4,
         },
       },
     ],
   }

>>> $e->categories()->count()                                                                                                                                                                                           
=> 0
>>> $cat->events()->count();                                                                                                                                                                                            
=> 3

```


- 55 Manipulando BelongsTo

```
>>> $profile = \App\Models\Profile::find(1)                                                                                                                                                                             
=> App\Models\Profile {#4468
     id: 1,
     user_id: 2,
     about: "Sobre Mim",
     phone: "9999999",
     social_networks: "faceboo",
     created_at: "2022-07-03 11:50:54",
     updated_at: "2022-07-03 11:50:54",
   }

>>> $profile->user()->dissociate()                                                                                                                                                                                      
=> App\Models\Profile {#4468
     id: 1,
     user_id: null,
     about: "Sobre Mim",
     phone: "9999999",
     social_networks: "faceboo",
     created_at: "2022-07-03 11:50:54",
     updated_at: "2022-07-03 11:50:54",
     user: null,
   }

>>> $profile->save();                                                                                                                                                                                                   
Illuminate\Database\QueryException with message 'SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'user_id' cannot be null (SQL: update `profiles` set `user_id` = ?, `profiles`.`updated_at` = 2022-07-03 11:55:44 where `id` = 1)'     
```

```
>>> $profile->user()->associate(3)                                                                                                                                                                                      
=> App\Models\Profile {#4468
     id: 1,
     user_id: 3,
     about: "Sobre Mim",
     phone: "9999999",
     social_networks: "faceboo",
     created_at: "2022-07-03 11:50:54",
     updated_at: "2022-07-03 11:55:44",
   }

>>> $profile->save();                                                                                                                                                                                                   
=> true
                                                

```

- 56 Conclusão

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Factories com Relacionamentos</a>

- 57 Iniciando Factories: Profile e Photo

```
$ php artisan make:factory PhotoFactory
Factory created successfully.

$ php artisan make:factory ProfileFactory
Factory created successfully.

```

- 58 Factories com Relacionamento HasMany

Model Populado não executado:

```
>>> \App\Models\Event::factory(5)->make()                                                                                                                                                                               
=> Illuminate\Database\Eloquent\Collection {#3557
     all: [
       App\Models\Event {#3561
         title: "Nesciunt et doloribus temporibus iure qui soluta fugiat.",
         description: "facere laudantium et quos fugiat corrupti omnis",
         body: "Voluptatem eos unde dolor. Ab ut omnis doloribus eos officiis tenetur omnis. Hic quo officia dolore qui. Doloribus eius rerum non. Sed non odit cumque omnis eos quam.",
         start_event: Illuminate\Support\Carbon @1656959674 {#3560
           date: 2022-07-04 18:34:34.271960 UTC (+00:00),
         },
         slug: "nesciunt-et-doloribus-temporibus-iure-qui-soluta-fugiat",
       },

>>> namespace App\Models;                                                                                                                                                                                               

>>> Photo::factory()->make();                                                                                                                                                                                           
=> App\Models\Photo {#3555
     photo: "https://via.placeholder.com/640x480.png/0088ff?text=sint",
   }

>>> Event::factory()->has(Photo::factory(3))->create();                                                                                                                                                                 
=> App\Models\Event {#4287
     title: "Aut quos delectus cupiditate qui sed et omnis.",
     description: "temporibus accusantium ex magni expedita enim velit",
     body: "Rerum culpa qui blanditiis et iure culpa. Distinctio placeat nihil est nihil atque et eius et.",
     start_event: Illuminate\Support\Carbon @1656959996 {#4288
       date: 2022-07-04 18:39:56.615143 UTC (+00:00),
     },
     slug: "aut-quos-delectus-cupiditate-qui-sed-et-omnis",
     updated_at: "2022-07-04 18:39:56",
     created_at: "2022-07-04 18:39:56",
     id: 7,
   }

>>> Event::factory(3)->hasPhotos(3)->create();                                                                                                                                                                          
=> Illuminate\Database\Eloquent\Collection {#3560
     all: [
       App\Models\Event {#4509
         title: "Voluptatibus mollitia aspernatur omnis ut dicta velit expedita.",
         description: "ut repellat sapiente doloremque dicta error itaque",
         body: "Aspernatur quas assumenda at molestias eaque occaecati ex eius. Ipsa ab numquam aspernatur ducimus excepturi totam aspernatur. Unde laborum et dolorum quis soluta et.",
         start_event: Illuminate\Support\Carbon @1656960134 {#4504
           date: 2022-07-04 18:42:14.627647 UTC (+00:00),
         },


```

- 59 Factories com Relacionamento HasOne

```
>>> User::factory()->has(Profile::factory())->create();                                                                                                                                                                 
=> App\Models\User {#3889
     name: "Ms. Anais Ankunding MD",
     email: "erika35@example.com",
     email_verified_at: "2022-07-04 19:02:47",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "ZbEtne4DrJ",
     updated_at: "2022-07-04 19:02:47",
     created_at: "2022-07-04 19:02:47",
     id: 11,
   }

>>> User::factory(3)->has(Profile::factory())->create();                                                                                                                                                                
=> Illuminate\Database\Eloquent\Collection {#3524
     all: [
       App\Models\User {#4286
         name: "Destinee Bahringer",
         email: "julie.krajcik@example.com",
         email_verified_at: "2022-07-04 19:09:21",
         #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
         #remember_token: "uo45KbLosf",
         updated_at: "2022-07-04 19:09:21",
         created_at: "2022-07-04 19:09:21",
         id: 12,
       },
  // (....)
  
  >>> User::factory(3)->hasProfile()->create();                                                                                                                                                                           
=> Illuminate\Database\Eloquent\Collection {#4511
     all: [
       App\Models\User {#4520
         name: "Kianna Ankunding",
         email: "vkemmer@example.net",
         email_verified_at: "2022-07-04 19:10:58",
         #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
         #remember_token: "6N7z6RBXWa",
         updated_at: "2022-07-04 19:10:58",
         created_at: "2022-07-04 19:10:58",
         id: 15,
       },
  / (....)
  
```

- 60 Factories com BelongsTo

```
>>> Profile::factory()->for(user::factory())->create();                                                                                                                                                                 
=> App\Models\Profile {#3577
     about: "Reiciendis eos sapiente praesentium optio debitis sunt hic. Neque suscipit excepturi quia iusto tenetur officia excepturi. Error sit neque corrupti quia impedit.",
     phone: "(44) 32964-1512",
     social_networks: "facebook-twitter",
     user_id: 18,
     updated_at: "2022-07-04 19:49:46",
     created_at: "2022-07-04 19:49:46",
     id: 10,
   }

>>> Profile::factory()->forUser()->create();                                                                                                                                                                            
=> App\Models\Profile {#3575
     about: "Ut quod consequatur nostrum. Earum exercitationem quibusdam et vel rerum. Ducimus voluptatum inventore asperiores sunt qui modi velit. Quis facilis dicta molestiae dolores.",
     phone: "(76) 88288-7048",
     social_networks: "facebook-twitter",
     user_id: 19,
     updated_at: "2022-07-04 19:50:30",
     created_at: "2022-07-04 19:50:30",
     id: 11,
   }

```

- 61 Executando as Factories via Seed

```php
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)
            ->hasProfile()
            ->create();
    }
}
```

```php
class EventsTableSeeder extends Seeder
{
    public function run()
    {
        Event::factory(6)
            ->hasPhotos(4)
            ->hasCategories(3)
            ->create();
    }
}
```

```
$ php artisan migrate:fresh
Dropped all tables successfully.
Migration table created successfully.
Loading stored database schema: C:\Users\josem\Documents\workspaces\Laravel-Mastery-CodeExperts\03-PrimeirosPassosVisaoGeral\projMeusEventos\database\schema/mysql-schema.dump
Loaded stored database schema. (694.86ms)
Migrating: 2022_07_01_181916_create_profiles_table
Migrated:  2022_07_01_181916_create_profiles_table (89.22ms)
Migrating: 2022_07_02_202521_create_photos_table
Migrated:  2022_07_02_202521_create_photos_table (51.99ms)
Migrating: 2022_07_02_214924_create_categories_table
Migrated:  2022_07_02_214924_create_categories_table (15.03ms)
Migrating: 2022_07_02_215434_create_category_event_table
Migrated:  2022_07_02_215434_create_category_event_table (81.06ms)


$ php artisan db:seed
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (143.85ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (136.14ms)
Database seeding completed successfully.

```


[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - View: Laravel Blade</a>

- 62 Introdução
- 63 Relembrando as Views
- 64 Loop e Passagem de Dados View

```php
Route::get('/', function () {
    $events = \App\Models\Event::all();
    
    //return view('welcome', ['events'=> $events]);
    return view('welcome', compact('events'));
});
```

```php
<ul>
    @foreach($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
</ul>
```


- 65 Diretiva ForElse

```php
<ul>
@forelse($events as $event)
    <li>{{$event->title}}</li>
@empty
    <h3>Nenhum evento encontrado neste site....</h3>
@endforelse
</ul>

<hr>
@if(count($events))
<ul>
    @foreach($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
@else
    <h3>Nenhum evento cadastrado</h3>
@endif
</ul>


```

- 66 O print do Blade

```
{!! //sem escape !!}
{{ //com escape }}
```

- 67 Herança de Templates

```php
    <title>@yield('title') Eventos Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    @yield('content'){{--Todas as views que extender, colocaram seu conteudo nestas área--}}

```

```php
@extends('layouts.site')

@section('title')
    Principais Eventos
@endsection

@section('content')
    <h2>Eventos</h2>
    <hr>
    <ul>
        @forelse($events as $event)
            <li>{{$event->title}}</li>
        @empty
            <h3>Nenhum evento encontrado neste site....</h3>
        @endforelse
    </ul>

    <hr>
    @if(count($events))
        <ul>
            @foreach($events as $event)
                <li>{{$event->title}}</li>
            @endforeach
    @else
                <h3>Nenhum evento cadastrado</h3>
    @endif
        </ul>
@endsection

```

- 68 Incrementando Views de Eventos
- 69 Melhorias Home e Inicio de Single

```php
<strong>Acontece em: {{$event->start_event->format('d/m/Y H:i:s')}}</strong>
```

```php
class Event extends Model
{
    protected $dates = ['start_event']; // CARBON 
```

```php
Route::get('/eventos/{slug}', function ($slug){

    // $event = \App\Models\Event::where('slug', $slug)->first();
    $event = \App\Models\Event::whereSlug($slug)->first();

    return view('event', compact('event'));
});
```

```php
// 03-PrimeirosPassosVisaoGeral/projMeusEventos/resources/views/event.blade.php
@extends('layouts.site')

@section('title')
Evento - {{$event->title}}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            Evento: {{$event->title}}
        </div>
    </div>

@endsection

```

- 70 Compondo View Single Evento
- 71 Exibindo Fotos Evento se Existirem
- 72 Organizando com HomeController

[03-PrimeirosPassosVisaoGeral/projMeusEventos/app/Http/Controllers/HomerController.php](03-PrimeirosPassosVisaoGeral/projMeusEventos/app/Http/Controllers/HomerController.php)

- 73 Conclusões


[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - View: Manipulação de Formulários</a>

- 74 Introdução
- 75 Organizando Rotas Painel Eventos
- 76 Listagem de Eventos
- 77 Paginando Dados

```php
 public function index()
    {
        $events = Event::paginate(3);

        return view('admin.events.index', compact('events'));
    }
```

```php
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

```

```html
            </table>
            {{$events->links()}}
        </div>
```

- 78 Tela de Criação de Evento
- 79 Entendendo CSRF no Laravel
- 80 Manipulando Dados da Request

```php

// Recuperar uma instancia do request
request()

// Recuperar todo conteudo do form enviado como arrau associativo
dd(\request()->all());

// Recuperar uma chave especifica do envio do form 
request('title') || request()->get('title')

// E recuperar uma chave especifica do envio como propriedade
dd(request()->title())
```

- 81 Editando Eventos
- 82 Linkando Edição e Remoção de Evento
- 83 Melhorias Manipulação de Request
- 84 Conclusões

[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Laravel Router</a>

- 85 Introdução
- 86 Relembrando Rotas

```php
// GET | POST | PUT | DELETE | OPTIONS | HEAD
// Route::get(), ...

// any a qualquer verbo ou match
Route::any('/teste-any', fn()=> 'Rota Any'); // Match com qualquer verbo, sendo um dos verbos permitidos acima
// para fazer match com post ou put
Route::match(['post', 'put'], '/teste-match', fn() => 'Rota Match');
```

- 87 Organizando Rotas com Prefixo e Grupo

```php

Route::prefix('/admin')->group(function () {
    Route::prefix('/events')->group(function () {
        Route::get('/index', [\App\Http\Controllers\Admin\EventController::class, 'index']);

        Route::get('/create', [\App\Http\Controllers\Admin\EventController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\EventController::class, 'store']);

        Route::get('/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit']);
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update']);

        Route::get('/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy']);

    });
});

```

- 88 Usando Apelido de Rotas

```php

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/events')->name('events')->group(function () {
        Route::get('/index', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('store');

        Route::get('/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('edit');
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('update');

        Route::get('/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('destroy');

    });
});

```

- 89 Refatorando Links nas Views
- 90 Refatorando Redirecionamentos
- 91 Dando um Tapa no Painel de Eventos
- 92 Conclusões

[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Manipulando Validações</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Controllers como Recurso</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Primeiro Starter Point: Laravel UI</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Melhorias Projeto Eventos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Upload de Arquivos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - Melhorias & Encerramento Bloco 1</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - ACL & Autorização</a>



[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - Bloco 2 - Iniciando</a>



[Voltar ao Índice](#indice)

---


## <a name="parte18">18 - Primeiros Passos com Livewire</a>



[Voltar ao Índice](#indice)

---

## <a name="parte19">9. Conhecendo o Tailwind</a>



[Voltar ao Índice](#indice)

---


## <a name="parte20">20. Iniciando Projeto de Fato</a>



[Voltar ao Índice](#indice)

---

## <a name="parte21">21. Upload e Processamento de Video</a>



[Voltar ao Índice](#indice)

---


## <a name="parte22">22. Trabalhando com Filas</a>



[Voltar ao Índice](#indice)

---


## <a name="parte23">23. Notificações & Player</a>



[Voltar ao Índice](#indice)

---


## <a name="parte24">24. Relações Polimórficas & Incrementos Projeto</a>



[Voltar ao Índice](#indice)

---


