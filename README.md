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
- 46 Migração 1:N
- 47 Mapeando 1:N Models
- 48 Salvando 1:N
- 49 Recuperando 1:N
- 50 Migração N:N
- 51 Gerando Algumas Categories
- 52 Mapeando N:N Models
- 53 Salvando N:N
- 54 Recuperando N:N
- 55 Manipulando BelongsTo
- 56 Conclusão

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Factories com Relacionamentos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - View: Laravel Blade</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - View: Manipulação de Formulários</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Laravel Router</a>



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


