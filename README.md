# Laravel Mastery - CodeExperts

https://codeexperts.com.br/curso/laravel-mastery



## <a name="indice">Índice</a>

1. [1. Boas Vindas](#parte1)     
2. [2. Ambiente](#parte5)     
3. [3. Primeiros Passos Visão Geral](#parte10)     
4. [4. Migrations, Seeders e Factories](#parte26)     
5. [5. Eloquent](#parte37)     
6. [6. Factories com Relacionamentos](#parte62)     
7. [7. View: Laravel Blade](#parte68)     
8. [8. View: Manipulação de Formulários](#parte81)     
9. [9. Laravel Router](#parte93)     
10. [10. Manipulando Validações](#parte102)     
11. [11. Controllers como Recurso](#parte112)     
12. [12. Primeiro Starter Point: Laravel UI](#parte123)     
13. [13. Melhorias Projeto Eventos](#parte134)     
14. [14. Upload de Arquivos](#parte148)     
15. [15. Melhorias & Encerramento Bloco 1 --atualizando](#parte163)     
16. [16. ACL & Autorização](#parteb16)     
17. [17. Bloco 2 - Iniciando](#parteb17)     
---


## <a name="parte1">1 - 1. Boas Vindas</a>



[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - 01 - Seja Bem-Vindo</a>



[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - 02 - Quem Sou Eu</a>



[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - 03 - Ferramentas</a>

- PHP Storm
Para estudantes, solicite em https://www.jetbrains.com/student/

Para open source, caso você contribua, solicite em https://www.jetbrains.com/community/opensource/

Visual Studio Code: https://code.visualstudio.com/

[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - 2. Ambiente</a>

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

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - 04 - Formas de Iniciar Projeto</a>



[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - 05 - Laravel Installer OS X</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - 06 - Laravel Installer Linux</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - 07 - Laravel Installer Windows</a>

```
$ composer global require laravel/installer

add PATH Composer e /laravel/bin/

laravel new projeto01

php artisan serve

```

[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - 3. Primeiros Passos Visão Geral</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel)

[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - 08 - Iniciando Projeto</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - 09 - Diretórios Projeto</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - 10 - Panorama Inicial do Laravel</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php)

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function (){
    return view('hello');
});

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php)



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - 11 - Parâmetros Dinâmicos Rota</a>

```php

// ? -> informa que o parâmetro não é obrigatório
Route::get('/hello-name/{name?}', function ($name = 'Anônimo'){
    return 'Hello, ' . $name;
});


```

[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - 12 - Rotas & Controllers</a>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloworld()
    {
        return view('hello');
    }

    public function hello($name = 'Anônimo')
    {
        return 'Hello, ' . $name;
    }
}

```

```php
Route::get('hello', [\App\Http\Controllers\HelloWorldController::class, 'helloworld']);

// ? -> informa que o parâmetro não é obrigatório
Route::get('/hello-name/{name?}', [\App\Http\Controllers\HelloWorldController::class,'hello']);

```

[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - 13 - O Artisan</a>

```
php artisan

php artisan make:controller --help

php artisan help make:controller
```

[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - 14 - Entendendo as Configurações</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/.env](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/.env)




[Voltar ao Índice](#indice)

---


## <a name="parte18">18 - 15 - Migrations</a>

```
php artisan migrate:status

php artisan migrate:install

php artisan migrate
```

[Voltar ao Índice](#indice)

---


## <a name="parte19">19 - 16 - Executando Migrations</a>



[Voltar ao Índice](#indice)

---


## <a name="parte20">20 - 17 - Criando Primeira Migração</a>

```
$ php artisan make:migration create_events_table

public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
```

```
    php artisan migrate
```

[Voltar ao Índice](#indice)

---


## <a name="parte21">21 - 18 - Os Models</a>

```
php artisan make:model Event -m // -m cria a migration junto
```

[Voltar ao Índice](#indice)

---


## <a name="parte22">22 - 19 - O Eloquent e Queries</a>

```php

Route::get('/queries/{event}', function ($event) {

    //$events = \App\Models\Event::all();
    //$events = \App\Models\Event::all(['title', 'description']);

    //$event =  \App\Models\Event::where('id', 1)->get();

    //$event =  \App\Models\Event::where('id', 1)->first();
    $events = \App\Models\Event::find($event);

    return $events;

}); 
```

[Voltar ao Índice](#indice)

---


## <a name="parte23">23 - 20 - O Tinker</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman

>>> \App\Models\Event::all()
=> Illuminate\Database\Eloquent\Collection {#4125
     all: [
       App\Models\Event {#4127
         id: 1,
         title: "Evento 1",
         description: "Evento teste descrição 1",
         created_at: "2021-06-29 10:46:19",
         updated_at: "2021-06-29 10:46:21",
       },

```

[Voltar ao Índice](#indice)

---


## <a name="parte24">24 - 21 - Assets Frontend</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/public](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/public)

```
yarn install

yarn run dev
```

[Voltar ao Índice](#indice)

---


## <a name="parte25">25 - 22 - Conclusões</a>



[Voltar ao Índice](#indice)

---


## <a name="parte26">26 - 4. Migrations, Seeders e Factories</a>



[Voltar ao Índice](#indice)

---


## <a name="parte27">27 - 23 - Introdução</a>



[Voltar ao Índice](#indice)

---


## <a name="parte28">28 - 24 - Seeders e Factories</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php)

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/UserFactory.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/UserFactory.php)

[Voltar ao Índice](#indice)

---


## <a name="parte29">29 - 25 - Executando Seeds e Factories</a>

- [https://github.com/fzaninotto/Faker](https://github.com/fzaninotto/Faker)



[Voltar ao Índice](#indice)

---


## <a name="parte30">30 - 26 - Primeira Factory e Seeds</a>

```
$ php artisan make:factory EventFactory
Factory created successfully.

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/EventFactory.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/EventFactory.php)

```php 
public function definition()
    {
        return [
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php)

```php
\App\Models\Event::factory(30)->create();
```

```
$ php artisan db:seed
Database seeding completed successfully.

```

```
$ php artisan make:seeder UsersTableSeeder
Seeder created successfully.

$ php artisan make:seeder EventsTableSeeder
Seeder created successfully.

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/DatabaseSeeder.php)

```php
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
    }
```

[Voltar ao Índice](#indice)

---


## <a name="parte31">31 - 27 - Comandos Fresh e Refresh</a>

```
$ php artisan migrate:status
+------+------------------------------------------------+-------+
| Ran? | Migration                                      | Batch |
+------+------------------------------------------------+-------+
| Yes  | 2014_10_12_000000_create_users_table           | 1     |
| Yes  | 2014_10_12_100000_create_password_resets_table | 1     |
| Yes  | 2019_08_19_000000_create_failed_jobs_table     | 1     |
| Yes  | 2021_06_29_132248_create_events_table          | 2     |
+------+------------------------------------------------+-------+

```

```
$ php artisan migrate:refresh
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (80.99ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (13.60ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (21.34ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (16.71ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (55.51ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (36.81ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (38.55ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (18.94ms)

```

```
$ php artisan migrate:refresh --seed
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (13.37ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (8.78ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (7.29ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (9.22ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (41.09ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (36.27ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (40.78ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (18.09ms)
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (347.65ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (76.90ms)
Database seeding completed successfully.

```

```
$ php artisan migrate:fresh

Dropped all tables successfully. // <<<<<<---------------------

Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (57.18ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (65.08ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (56.45ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (35.60ms)

```

[Voltar ao Índice](#indice)

---


## <a name="parte32">32 - 28 - Comando Rollback e Reset</a>

```
$ php artisan migrate:rollback
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (14.14ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (5.54ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (6.83ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (5.04ms)
```

```
$ php artisan migrate:rollback --step=2

```

```
$ php artisan migrate:reset
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (13.18ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (7.49ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (8.24ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (9.76ms)

```

[Voltar ao Índice](#indice)

---


## <a name="parte33">33 - 29 - Falando Sobre Migrações</a>

```
$ php artisan migrate:refresh --step=1
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (12.88ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (15.55ms)

```

```
$ php artisan migrate:refresh --seed
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (9.54ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (5.81ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (5.73ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (6.25ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (30.65ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (27.50ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (87.49ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (49.43ms)
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (119.07ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (58.96ms)
Database seeding completed successfully.

```

[Voltar ao Índice](#indice)

---


## <a name="parte34">34 - 30 - Uma Migração de Edição</a>

- [https://laravel.com/docs/8.x/migrations#available-column-types](https://laravel.com/docs/8.x/migrations#available-column-types)

```
$ php artisan make:migration alter_events_table_add_column_slug --table=events

Created Migration: 2021_06_29_234605_alter_events_table_add_column_slug

$ php artisan migrate:status
+------+------------------------------------------------------+-------+
| Ran? | Migration                                            | Batch |
+------+------------------------------------------------------+-------+
| Yes  | 2014_10_12_000000_create_users_table                 | 2     |
| Yes  | 2014_10_12_100000_create_password_resets_table       | 2     |
| Yes  | 2019_08_19_000000_create_failed_jobs_table           | 2     |
| Yes  | 2021_06_29_132248_create_events_table                | 2     |
| No   | 2021_06_30_000514_alter_events_table_add_column_slug |       |
+------+------------------------------------------------------+-------+

$ php artisan migrate
Migrating: 2021_06_30_000514_alter_events_table_add_column_slug
Migrated:  2021_06_30_000514_alter_events_table_add_column_slug (31.86ms)

$ php artisan db:seed
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (140.18ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (53.62ms)
Database seeding completed successfully.

```

[Voltar ao Índice](#indice)

---


## <a name="parte35">35 - 31 - Schema Dump</a>

```
$ php artisan schema:dump

```

[Voltar ao Índice](#indice)

---


## <a name="parte36">36 - 32 - Conclusões</a>



[Voltar ao Índice](#indice)

---


## <a name="parte37">37 - 5. Eloquent</a>



[Voltar ao Índice](#indice)

---


## <a name="parte38">38 - 33 - Introdução</a>



[Voltar ao Índice](#indice)

---


## <a name="parte39">39 - 34 - Relembrando Models</a>



[Voltar ao Índice](#indice)

---


## <a name="parte40">40 - 35 - Active Record Inserção</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/routes/web.php)

```php
    // insert into events(title, description, body, start_event) values(?,?,?,?)
    //Active Record
    $event = new \App\Models\Event();
    $event->title = 'Evento TESTE AR 2';
    $event->description = 'Evento gravado via AR 2';
    $event->body = 'conteudo...';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();
```

[Voltar ao Índice](#indice)

---


## <a name="parte41">41 - 36 - Active Record Atualização</a>

```php
    //update event set title = ? , description = ? (...) where id = ?
    $event = \App\Models\Event::find(32);
    $event->title = 'EVENTO 2 Atualizado';
    $event->slug  = \Illuminate\Support\Str::slug($event->title);

    return $event->save();
```

[Voltar ao Índice](#indice)

---


## <a name="parte42">42 - 37 - Mass Assignment Criação</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php)

```php
    protected $fillable = [
        'title',
        'description',
        'body',
        'start_event',
        'slug'
    ];
```

```php
// Atribuição Massa ou Mass Assingnment
    $event = [
        'title' => 'Titulo add 3',
        'description' => 'Descrição 3',
        'body' => 'Corpo 3',
        'start_event' => date('Y-m-d H:i:s'),
        'slug' => 'titulo-adddddd-3-with-array-3'

    ];
    return \App\Models\Event::create($event);
```

[Voltar ao Índice](#indice)

---


## <a name="parte43">43 - 38 - Update em Massa</a>

```php
    // Update Massa ou Mass Assingnment
    $eventData = [
        //    'title' => 'Titulo add 3',
        'description' => 'Descrição 3333 UPDATE MASS',
        'body' => 'Corpo 3 UPDATE MASS',
        //    'start_event' => date('Y-m-d H:i:s'),
        //    'slug' => 'titulo-adddddd-3-with-array-3'
    ];

    $event = \App\Models\Event::find(33);
    $event->update($eventData);

    return $event;
```

[Voltar ao Índice](#indice)

---


## <a name="parte44">44 - 39 - Removendo Dados</a>

```php
    $event = \App\Models\Event::findOrFail(1);
    return $event->delete();
```

```php
//  Delete Models via ids  [ 2,3,4,5]
    return \App\Models\Event::destroy([2,3,4,5]);
```

```php
    //Select * from events order by id ASC limt 3
    return \App\Models\Event::orderBy('id', 'ASC')->limit(3)->get();
```

[Voltar ao Índice](#indice)

---


## <a name="parte45">45 - 40 - Organizando CRUD</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Http/Controllers/EventController.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Http/Controllers/EventController.php)

```php
<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }
    public function store()
    {
        $eventData = [
            'title' => 'Titulo add 3' . rand(1, 100),
            'description' => 'Descrição 3333 UPDATE MASS',
            'body' => 'Corpo 3 UPDATE MASS',
            'start_event' => date('Y-m-d H:i:s'),
            'slug' => 'titulo-adddddd-3-with-array-3'
        ];
        return Event::create($eventData);
    }
    public function update($event)
    {
        $eventData = [
            'title' => 'Titulo add 3' . rand(1, 100),
        ];
        $event = \App\Models\Event::find($event);

        $event->update($eventData);

        return $event;
    }
    public function destroy($event)
    {
        $event = \App\Models\Event::findOrFail($event);
        return $event->delete();
    }
}

```

[Voltar ao Índice](#indice)

---


## <a name="parte46">46 - 41 - Prelúdio Relacionamentos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte47">47 - 42 - Migração Tabela Perfil</a>

```
$ php artisan make:model Profile -m
Model created successfully.
Created Migration: 2021_07_01_123354_create_profiles_table

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_01_123354_create_profiles_table.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_01_123354_create_profiles_table.php)

```php
public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            /*
             user_id (conter a chave estrangeira) && a chave estrangeira
                ela tem um padrão: profiles_user_id_foreign
            */
            $table
                ->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('about')->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('social_networks')->nullable();

            $table->timestamps();

            //Definindo chave estrangeira anteriormente ao laravel 7
           /* $table
                ->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');*/
        });
    }
```

```
$ php artisan migrate
Migrating: 2021_07_01_123354_create_profiles_table
Migrated:  2021_07_01_123354_create_profiles_table (118.53ms)

```

![42 - Migração Tabela Perfil](/imgs/42-table-profile.png)

[Voltar ao Índice](#indice)

---


## <a name="parte48">48 - 43 - Mapeando 1:1 Models</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/User.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/User.php)

```php
    // Representa a ligação entre o MODEL User e o MODEL Profile
    // e indica que User tem um Profile
    public function profile()
    {
        // automaticamente procura por esta coluna: user_id, em profile
        return $this->hasOne(Profile::class);
    }
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Profile.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Profile.php)

```php
    public function user()
    {
        //por conta do nome do método que a coluna é user_id
        return $this->belongsTo(User::class);
    }
```

[Voltar ao Índice](#indice)

---


## <a name="parte49">49 - 44 - Salvando 1:1</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> $p = new \App\Models\Profile();
=> App\Models\Profile {#3404}
>>> $p-> about = 'Sobre Mim';
=> "Sobre Mim"
>>> $p-> phone = '99999888';
=> "99999888"
>>> $p->social_networks = 'facebook, google, twitte';
=> "facebook, google, twitte"
>>> $u = \App\Models\User::find(1);
=> App\Models\User {#4195
     id: 1,
     name: "Miss Yvette Blick",
     email: "brent79@example.com",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "hBxAvcgCOW",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }
>>> $u->profile()->save($p)
=> App\Models\Profile {#3404
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     user_id: 1,
     updated_at: "2021-07-01 18:38:36",
     created_at: "2021-07-01 18:38:36",
     id: 1,
   }
```

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> $user = \App\Models\User::find(2);
=> App\Models\User {#4194
     id: 2,
     name: "Colt Howell",
     email: "iparisian@example.com",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "Pzddxu1xeg",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }
>>> $p = [
... 'about' => 'Sobre mim 2',
... 'phone' => '7777777',
... 'social_networks' => 'twitter'
... ];
=> [
     "about" => "Sobre mim 2",
     "phone" => "7777777",
     "social_networks" => "twitter",
   ]

>>> $user->profile()->create($p);
=> App\Models\Profile {#4339
     about: "Sobre mim 2",
     phone: "7777777",
     social_networks: "twitter",
     user_id: 2,
     updated_at: "2021-07-01 18:55:06",
     created_at: "2021-07-01 18:55:06",
     id: 2,
   }
```


[Voltar ao Índice](#indice)

---


## <a name="parte50">50 - 45 - Recuperando 1:1</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman

>>> $u = \App\Models\User::find(1)
=> App\Models\User {#4196
     id: 1,
     name: "Miss Yvette Blick",
     email: "brent79@example.com",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "hBxAvcgCOW",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }

>>> $u->profile();
=> Illuminate\Database\Eloquent\Relations\HasOne {#3409}

>>> $u->profile;
=> App\Models\Profile {#4129
     id: 1,
     user_id: 1,
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     created_at: "2021-07-01 18:38:36",
     updated_at: "2021-07-01 18:38:36",
   }

```

```
>>> $user3 = \App\Models\User::find(3);
=> App\Models\User {#4131
     id: 3,
     name: "Bessie Bode",
     email: "orath@example.org",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "ZGczeoXU85",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }
>>> $user3->profile;
=> null

>>> $user3->profile()->exists();
=> false

```

```
>>> $perfil1 = \App\Models\Profile::find(1);
=> App\Models\Profile {#3405
     id: 1,
     user_id: 1,
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     created_at: "2021-07-01 18:38:36",
     updated_at: "2021-07-01 18:38:36",
   }
>>> $perfil1->user()->first();
=> App\Models\User {#4344
     id: 1,
     name: "Miss Yvette Blick",
     email: "brent79@example.com",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "hBxAvcgCOW",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }
>>> $perfil1->user;
=> App\Models\User {#4345
     id: 1,
     name: "Miss Yvette Blick",
     email: "brent79@example.com",
     email_verified_at: "2021-06-30 00:08:08",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "hBxAvcgCOW",
     created_at: "2021-06-30 00:08:08",
     updated_at: "2021-06-30 00:08:08",
   }
>>> $perfil1->user->name;
=> "Miss Yvette Blick"

```

[Voltar ao Índice](#indice)

---


## <a name="parte51">51 - 46 - Migração 1:N</a>

```
$ php artisan make:model Photo -m
Model created successfully.
Created Migration: 2021_07_01_225814_create_photos_table

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

```php
class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo'];
}

```

```
$ php artisan migrate
Migrating: 2021_07_01_225814_create_photos_table
Migrated:  2021_07_01_225814_create_photos_table (98.31ms)

```

[Voltar ao Índice](#indice)

---


## <a name="parte52">52 - 47 - Mapeando 1:N Models</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php)

```php
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Photo.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Photo.php)

```php
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
```

[Voltar ao Índice](#indice)

---


## <a name="parte53">53 - 48 - Salvando 1:N</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> $photo = ['photo'=> 'imagem.png'];
=> [
     "photo" => "imagem.png",
   ]
>>> \App\Models\Event::find(35)->photos()->create($photo);
=> App\Models\Photo {#4284
     photo: "imagem.png",
     event_id: 35,
     updated_at: "2021-07-02 11:56:30",
     created_at: "2021-07-02 11:56:30",
     id: 1,
   }
>>>

```

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> $photoModel = new \App\Models\Photo();
=> App\Models\Photo {#3404}
>>> $photoModel->photo = 'imagem2.png';
=> "imagem2.png"
>>> \App\Models\Event::find(35)->photos()->save($photoModel);
=> App\Models\Photo {#3404
     photo: "imagem2.png",
     event_id: 35,
     updated_at: "2021-07-02 12:00:21",
     created_at: "2021-07-02 12:00:21",
     id: 2,
   }

```

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> namespace App\Models
>>> $photo1 = new Photo();
=> App\Models\Photo {#3397}
>>> $photo1->photo = 'fotoexemplo1.jpg';
=> "fotoexemplo1.jpg"
>>> $photo2 = new Photo();
=> App\Models\Photo {#3400}
>>> $photo2->photo = 'fotoexemplo2.jpg';
=> "fotoexemplo2.jpg"
>>> $photosarray = [$photo1, $photo2];
=> [
     App\Models\Photo {#3397
       photo: "fotoexemplo1.jpg",
     },
     App\Models\Photo {#3400
       photo: "fotoexemplo2.jpg",
     },
   ]
>>> Event::find(34)->photos()->saveMany($photosarray);
=> [
     App\Models\Photo {#3397
       photo: "fotoexemplo1.jpg",
       event_id: 34,
       updated_at: "2021-07-02 12:06:13",
       created_at: "2021-07-02 12:06:13",
       id: 3,
     },
     App\Models\Photo {#3400
       photo: "fotoexemplo2.jpg",
       event_id: 34,
       updated_at: "2021-07-02 12:06:13",
       created_at: "2021-07-02 12:06:13",
       id: 4,
     },
   ]

```

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> $photo11 = ['photo'=>'foto11.png'];
=> [
     "photo" => "foto11.png",
   ]
>>> $photo22 = ['photo'=>'foto22.png'];
=> [
     "photo" => "foto22.png",
   ]
>>> $photo1122array = [$photo11, $photo22];
=> [
     [
       "photo" => "foto11.png",
     ],
     [
       "photo" => "foto22.png",
     ],
   ]

>>> \App\Models\Event::find(33)->photos()->createMany($photo1122array);
=> Illuminate\Database\Eloquent\Collection {#4283
     all: [
       App\Models\Photo {#3411
         photo: "foto11.png",
         event_id: 33,
         updated_at: "2021-07-02 12:10:23",
         created_at: "2021-07-02 12:10:23",
         id: 5,
       },
       App\Models\Photo {#4128
         photo: "foto22.png",
         event_id: 33,
         updated_at: "2021-07-02 12:10:23",
         created_at: "2021-07-02 12:10:23",
         id: 6,
       },
     ],
   }

```

[Voltar ao Índice](#indice)

---


## <a name="parte54">54 - 49 - Recuperando 1:N</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> namespace App\Models;
>>> $event = Event::find(35);
=> App\Models\Event {#4195
     id: 35,
     title: "Titulo add 363",
     description: "Descrição 3333 UPDATE MASS",
     body: "Corpo 3 UPDATE MASS",
     start_event: "2021-07-01 12:04:44",
     created_at: "2021-07-01 12:04:44",
     updated_at: "2021-07-01 12:05:08",
     slug: "titulo-adddddd-3-with-array-3",
   }
>>> $event->photos;
=> Illuminate\Database\Eloquent\Collection {#4338
     all: [
       App\Models\Photo {#4091
         id: 1,
         event_id: 35,
         photo: "imagem.png",
         created_at: "2021-07-02 11:56:30",
         updated_at: "2021-07-02 11:56:30",
       },
       App\Models\Photo {#4128
         id: 2,
         event_id: 35,
         photo: "imagem2.png",
         created_at: "2021-07-02 12:00:21",
         updated_at: "2021-07-02 12:00:21",
       },
     ],
   }

```

```
>>> $event->photos();
=> Illuminate\Database\Eloquent\Relations\HasMany {#3723}

>>> $event->photos()->get();
=> Illuminate\Database\Eloquent\Collection {#4284
     all: [
       App\Models\Photo {#3410
         id: 1,
         event_id: 35,
         photo: "imagem.png",
         created_at: "2021-07-02 11:56:30",
         updated_at: "2021-07-02 11:56:30",
       },
       App\Models\Photo {#4346
         id: 2,
         event_id: 35,
         photo: "imagem2.png",
         created_at: "2021-07-02 12:00:21",
         updated_at: "2021-07-02 12:00:21",
       },
     ],
   }
>>> $event->photos()->limit(1)->get();
=> Illuminate\Database\Eloquent\Collection {#4285
     all: [
       App\Models\Photo {#4341
         id: 1,
         event_id: 35,
         photo: "imagem.png",
         created_at: "2021-07-02 11:56:30",
         updated_at: "2021-07-02 11:56:30",
       },
     ],
   }

>>> $event->photos()->orderBy('id', 'desc')->get();
=> Illuminate\Database\Eloquent\Collection {#3400
     all: [
       App\Models\Photo {#3410
         id: 2,
         event_id: 35,
         photo: "imagem2.png",
         created_at: "2021-07-02 12:00:21",
         updated_at: "2021-07-02 12:00:21",
       },
       App\Models\Photo {#4346
         id: 1,
         event_id: 35,
         photo: "imagem.png",
         created_at: "2021-07-02 11:56:30",
         updated_at: "2021-07-02 11:56:30",
       },
     ],
   }

```

```
>>> $photos = $event->photos;
=> Illuminate\Database\Eloquent\Collection {#4338
     all: [
       App\Models\Photo {#4091
         id: 1,
         event_id: 35,
         photo: "imagem.png",
         created_at: "2021-07-02 11:56:30",
         updated_at: "2021-07-02 11:56:30",
       },
       App\Models\Photo {#4128
         id: 2,
         event_id: 35,
         photo: "imagem2.png",
         created_at: "2021-07-02 12:00:21",
         updated_at: "2021-07-02 12:00:21",
       },
     ],
   }
>>> $photos->count();
=> 2

>>> $photos->map(function($model){return $model->photo;});
=> Illuminate\Support\Collection {#4341
     all: [
       "imagem.png",
       "imagem2.png",
     ],
   }

```

```
>>> Photo::find(1);
=> App\Models\Photo {#4347
     id: 1,
     event_id: 35,
     photo: "imagem.png",
     created_at: "2021-07-02 11:56:30",
     updated_at: "2021-07-02 11:56:30",
   }
>>> Photo::find(1)->event;
=> App\Models\Event {#4285
     id: 35,
     title: "Titulo add 363",
     description: "Descrição 3333 UPDATE MASS",
     body: "Corpo 3 UPDATE MASS",
     start_event: "2021-07-01 12:04:44",
     created_at: "2021-07-01 12:04:44",
     updated_at: "2021-07-01 12:05:08",
     slug: "titulo-adddddd-3-with-array-3",
   }
>>> Photo::find(1)->event->title;
=> "Titulo add 363"

```

[Voltar ao Índice](#indice)

---


## <a name="parte55">55 - 50 - Migração N:N</a>

```
$ php artisan make:model Category -m
Model created successfully.
Created Migration: 2021_07_02_140211_create_categories_table

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_02_140211_create_categories_table.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_02_140211_create_categories_table.php)

```php
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug');

            $table->timestamps();
        });
    }

```

```
$ php artisan make:migration create_category_event_table
Created Migration: 2021_07_02_141405_create_category_event_table

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_02_141405_create_category_event_table.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/migrations/2021_07_02_141405_create_category_event_table.php)

```php
    public function up()
    {
        Schema::create('category_event', function (Blueprint $table) {

            //event_id e category_id
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

        });
    }
```

```
$ php artisan migrate
Migrating: 2021_07_02_140211_create_categories_table
Migrated:  2021_07_02_140211_create_categories_table (28.44ms)
Migrating: 2021_07_02_141405_create_category_event_table
Migrated:  2021_07_02_141405_create_category_event_table (114.40ms)

```

[Voltar ao Índice](#indice)

---


## <a name="parte56">56 - 51 - Gerando Algumas Categories</a>

```
$ php artisan make:factory CategoryFactory
Factory created successfully.

```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/CategoryFactory.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/CategoryFactory.php)

```php
public function definition()
    {
        $categoryName = $this->faker->word;
        return [
            'name' => $categoryName,
            'description' => $this->faker->sentence,
            'slug' => Str::slug($categoryName)
        ];
    }
}
```

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> \App\Models\Category::factory(5)->create();
=> Illuminate\Database\Eloquent\Collection {#3441
     all: [
       App\Models\Category {#3439
         name: "nihil",
         description: "Dignissimos tempora soluta in totam qui et debitis.",
         slug: "nihil",
         updated_at: "2021-07-03 23:24:05",
         created_at: "2021-07-03 23:24:05",
         id: 1,
       },
       App\Models\Category {#3442
         name: "eius",
         description: "Culpa consectetur pariatur et quidem.",
         slug: "eius",
         updated_at: "2021-07-03 23:24:05",
         created_at: "2021-07-03 23:24:05",
         id: 2,
       },
       App\Models\Category {#3443
         name: "voluptas",
         description: "Quidem velit velit exercitationem natus vero error quisquam error.",
         slug: "voluptas",
         updated_at: "2021-07-03 23:24:05",
         created_at: "2021-07-03 23:24:05",
         id: 3,
       },
       App\Models\Category {#3444
         name: "accusamus",
         description: "Voluptas vel aut soluta in et nobis ducimus.",
         slug: "accusamus",
         updated_at: "2021-07-03 23:24:05",
         created_at: "2021-07-03 23:24:05",
         id: 4,
       },
       App\Models\Category {#3445
         name: "quisquam",
         description: "Ut consequatur ducimus similique sunt et.",
         slug: "quisquam",
         updated_at: "2021-07-03 23:24:05",
         created_at: "2021-07-03 23:24:05",
         id: 5,
       },
     ],
   }

```



[Voltar ao Índice](#indice)

---


## <a name="parte57">57 - 52 - Mapeando N:N Models</a>

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Category.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Category.php)

```php
 public function events()
    {
        return $this->belongsToMany(Event::class);
    }
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/app/Models/Event.php)

```php
 public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
```

[Voltar ao Índice](#indice)

---


## <a name="parte58">58 - 53 - Salvando N:N</a>

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman
>>> namespace App\Models;
>>> $e = Event::find(35)
=> App\Models\Event {#4195
     id: 35,
     title: "Titulo add 363",
     description: "Descrição 3333 UPDATE MASS",
     body: "Corpo 3 UPDATE MASS",
     start_event: "2021-07-01 12:04:44",
     created_at: "2021-07-01 12:04:44",
     updated_at: "2021-07-01 12:05:08",
     slug: "titulo-adddddd-3-with-array-3",
   }

>>> $e->categories()->attach([1,2,3]);
=> null

>>> $e->categories()->attach([4]);
=> null

>>> $e->categories()->detach([4]);
=> 1

>>> $e->categories()->detach([1,2]);
=> 2

```

```
>>> $e->categories()->sync([1,2,4])
=> [
     "attached" => [
       1,
       2,
       4,
     ],
     "detached" => [
       3,
     ],
     "updated" => [],
   ]

```

```
>>> $e->categories()->toggle([1,2,4])
=> [
     "attached" => [],
     "detached" => [
       1,
       2,
       4,
     ],
   ]
>>> $e->categories()->toggle([1,2,4])
=> [
     "attached" => [
       1,
       2,
       4,
     ],
     "detached" => [],
   ]

```


[Voltar ao Índice](#indice)

---


## <a name="parte59">59 - 54 - Recuperando N:N</a>

```
>>> $e->categories
=> Illuminate\Database\Eloquent\Collection {#3400
     all: [
       App\Models\Category {#3723
         id: 1,
         name: "nihil",
         description: "Dignissimos tempora soluta in totam qui et debitis.",
         slug: "nihil",
         created_at: "2021-07-03 23:24:05",
         updated_at: "2021-07-03 23:24:05",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4353
           event_id: 35,
           category_id: 1,
         },
       },
       App\Models\Category {#4347
         id: 2,
         name: "eius",
         description: "Culpa consectetur pariatur et quidem.",
         slug: "eius",
         created_at: "2021-07-03 23:24:05",
         updated_at: "2021-07-03 23:24:05",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4352
           event_id: 35,
           category_id: 2,
         },
       },
       App\Models\Category {#4354
         id: 4,
         name: "accusamus",
         description: "Voluptas vel aut soluta in et nobis ducimus.",
         slug: "accusamus",
         created_at: "2021-07-03 23:24:05",
         updated_at: "2021-07-03 23:24:05",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4343
           event_id: 35,
           category_id: 4,
         },
       },
     ],
   }

>>> $e->categories->count();
=> 3

>>> $e->categories();
=> Illuminate\Database\Eloquent\Relations\BelongsToMany {#4345
     +withTimestamps: false,
   }

```

```
>>> $cat = Category::find(4);
=> App\Models\Category {#4338
     id: 4,
     name: "accusamus",
     description: "Voluptas vel aut soluta in et nobis ducimus.",
     slug: "accusamus",
     created_at: "2021-07-03 23:24:05",
     updated_at: "2021-07-03 23:24:05",
   }
>>>

>>> $cat->events
=> Illuminate\Database\Eloquent\Collection {#4355
     all: [
       App\Models\Event {#4348
         id: 35,
         title: "Titulo add 363",
         description: "Descrição 3333 UPDATE MASS",
         body: "Corpo 3 UPDATE MASS",
         start_event: "2021-07-01 12:04:44",
         created_at: "2021-07-01 12:04:44",
         updated_at: "2021-07-01 12:05:08",
         slug: "titulo-adddddd-3-with-array-3",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4366
           category_id: 4,
           event_id: 35,
         },
       },
     ],
   }

```

```
>>> $cat->events()->count();
=> 1

>>> $cat->events;
=> Illuminate\Database\Eloquent\Collection {#4355
     all: [
       App\Models\Event {#4348
         id: 35,
         title: "Titulo add 363",
         description: "Descrição 3333 UPDATE MASS",
         body: "Corpo 3 UPDATE MASS",
         start_event: "2021-07-01 12:04:44",
         created_at: "2021-07-01 12:04:44",
         updated_at: "2021-07-01 12:05:08",
         slug: "titulo-adddddd-3-with-array-3",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#4366
           category_id: 4,
           event_id: 35,
         },
       },
     ],
   }

```

[Voltar ao Índice](#indice)

---


## <a name="parte60">60 - 55 - Manipulando BelongsTo</a>

```
>>> $profile = \App\Models\Profile::find(1);
=> App\Models\Profile {#4194
     id: 1,
     user_id: 1,
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     created_at: "2021-07-01 18:38:36",
     updated_at: "2021-07-01 18:38:36",
   }

>>> $profile->user()->dissociate();
=> App\Models\Profile {#4194
     id: 1,
     user_id: null,
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     created_at: "2021-07-01 18:38:36",
     updated_at: "2021-07-01 18:38:36",
     user: null,
   }
>>> $profile->save();
Illuminate\Database\QueryException with message 'SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'user_id' cannot be null (SQL: update `profiles` set `user_id` = ?, `profiles`.`updated_at` = 2021-07-04 00:54:35 where `id` = 1)'
>>>

```

```
>>> $profile->user()->associate(3)
=> App\Models\Profile {#4194
     id: 1,
     user_id: 3,
     about: "Sobre Mim",
     phone: "99999888",
     social_networks: "facebook, google, twitte",
     created_at: "2021-07-01 18:38:36",
     updated_at: "2021-07-04 00:54:35",
   }
>>> $profile->save();
=> true

```

[Voltar ao Índice](#indice)

---


## <a name="parte61">61 - 56 - Conclusão</a>



[Voltar ao Índice](#indice)

---


## <a name="parte62">6. Factories com Relacionamentos</a>

- 57 - Iniciando Factories: Profile e Photo

```
$ php artisan make:factory PhotoFactory
Factory created successfully.
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/PhotoFactory.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/PhotoFactory.php)

```
public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl()
        ];
    }
```

```
$ php artisan make:factory ProfileFactory
Factory created successfully.
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/ProfileFactory.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/factories/ProfileFactory.php)

```
 public function definition()
    {
        return [
            'about' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'social_networks' => 'facebook-twitter-instagran'
        ];
    }
```


- 58 - Factories com Relacionamento HasMany

```
$ php artisan tinker
Psy Shell v0.10.8 (PHP 7.4.19 — cli) by Justin Hileman

>>> \App\Models\Event::factory(2)->make();
=> Illuminate\Database\Eloquent\Collection {#3436
     all: [
       App\Models\Event {#3440
         title: "Et sapiente ut quisquam sed.",
         description: "voluptatem",
         body: "Ut laboriosam omnis magnam ea quos expedita autem culpa. Libero quo error maxime saepe et adipisci qui. Dolores velit est optio rerum quae id minus. Eum eligendi quae saepe doloremque qui aliquid dolorem.",
         slug: "et-sapiente-ut-quisquam-sed",
         start_event: Illuminate\Support\Carbon @1625445861 {#3439
           date: 2021-07-05 00:44:21.593325 UTC (+00:00),
         },
       },
       App\Models\Event {#3442
         title: "Sit unde aliquid odio omnis consectetur quisquam.",
         description: "nam",
         body: "Nihil eligendi mollitia voluptatem unde. Ut quae quisquam nisi dolore. Laborum error nihil qui error unde.",
         slug: "sit-unde-aliquid-odio-omnis-consectetur-quisquam",
         start_event: Illuminate\Support\Carbon @1625445861 {#3441
           date: 2021-07-05 00:44:21.593493 UTC (+00:00),
         },
       },
     ],
   }
```

```
>>> Event::factory()->has(Photo::factory(3))->create();
=> App\Models\Event {#4237
     title: "Quis eos ut adipisci.",
     description: "eos",
     body: "Quae quibusdam iusto rem quae omnis quidem rerum eum. Est blanditiis quo rem ducimus aut perspiciatis hic. Nesciunt perspiciatis reprehenderit repellendus id est accusamus. Ut dolorem repudiandae porro quia fugiat.",
     slug: "quis-eos-ut-adipisci",
     start_event: Illuminate\Support\Carbon @1625447636 {#4235
       date: 2021-07-05 01:13:56.586102 UTC (+00:00),
     },
     updated_at: "2021-07-05 01:13:56",
     created_at: "2021-07-05 01:13:56",
     id: 36,
   }

>>> Event::factory(2)->has(Photo::factory(3))->create();
=> Illuminate\Database\Eloquent\Collection {#3436
     all: [
       App\Models\Event {#4381
         title: "Assumenda aliquam nisi consequuntur ipsam eum cupiditate ad laboriosam.",
         description: "quibusdam",
         body: "Incidunt cupiditate optio quasi voluptatem culpa eos dicta et. Qui quisquam doloremque quam dolor voluptatem rerum velit. Eum dolores repellendus ut accusamus adipisci esse.",
         slug: "assumenda-aliquam-nisi-consequuntur-ipsam-eum-cupiditate-ad-laboriosam",
         start_event: Illuminate\Support\Carbon @1625448483 {#4171
           date: 2021-07-05 01:28:03.062581 UTC (+00:00),
         },
         updated_at: "2021-07-05 01:28:03",
         created_at: "2021-07-05 01:28:03",
         id: 37,
       },
       App\Models\Event {#4382
         title: "Distinctio deleniti sint quis voluptas est aliquam.",
         description: "eos",
         body: "Autem sunt odio dolor quae. A at quia dolores aperiam maiores magni dolores. Tempora et quisquam labore ut et omnis ipsum eaque. Repellendus modi molestias hic.",
         slug: "distinctio-deleniti-sint-quis-voluptas-est-aliquam",
         start_event: Illuminate\Support\Carbon @1625448483 {#4169
           date: 2021-07-05 01:28:03.062818 UTC (+00:00),
         },
         updated_at: "2021-07-05 01:28:03",
         created_at: "2021-07-05 01:28:03",
         id: 38,
       },
     ],
   }


```

```
>>> Event::factory(2)->hasPhotos(2)->create();
=> Illuminate\Database\Eloquent\Collection {#3402
     all: [
       App\Models\Event {#4389
         title: "Non mollitia odit porro sunt commodi cum odio.",
         description: "et",
         body: "Optio doloribus accusantium ullam assumenda et et. Voluptas sint quia cupiditate dignissimos molestiae. Quam fugiat dolorem est aut.",
         slug: "non-mollitia-odit-porro-sunt-commodi-cum-odio",
         start_event: Illuminate\Support\Carbon @1625450260 {#4383
           date: 2021-07-05 01:57:40.465122 UTC (+00:00),
         },
         updated_at: "2021-07-05 01:57:40",
         created_at: "2021-07-05 01:57:40",
         id: 39,
       },
       App\Models\Event {#4388
         title: "Qui quos perspiciatis ullam aspernatur rerum qui.",
         description: "et",
         body: "Dolor atque accusamus ut ut natus maiores omnis. Quaerat id cupiditate dolorum modi voluptas at laboriosam sint. Voluptas placeat rem ipsa.",
         slug: "qui-quos-perspiciatis-ullam-aspernatur-rerum-qui",
         start_event: Illuminate\Support\Carbon @1625450260 {#4386
           date: 2021-07-05 01:57:40.465292 UTC (+00:00),
         },
         updated_at: "2021-07-05 01:57:40",
         created_at: "2021-07-05 01:57:40",
         id: 40,
       },
     ],
   }

```

- 59 - Factories com Relacionamento HasOne
  
```
>>> User::factory()->has(Profile::factory())->create();

=> App\Models\User {#4236
     name: "Marjorie Shanahan MD",
     email: "yfarrell@example.com",
     email_verified_at: "2021-07-05 11:22:02",
     #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     #remember_token: "OyPdhAoD5S",
     updated_at: "2021-07-05 11:22:02",
     created_at: "2021-07-05 11:22:02",
     id: 51,
   }

```

```
>>> User::factory(2)->hasProfile()->create();

=> Illuminate\Database\Eloquent\Collection {#4406
     all: [
       App\Models\User {#4417
         name: "Margarette Romaguera",
         email: "schimmel.earline@example.net",
         email_verified_at: "2021-07-05 11:26:36",
         #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
         #remember_token: "2BaYfSobu8",
         updated_at: "2021-07-05 11:26:36",
         created_at: "2021-07-05 11:26:36",
         id: 52,
       },
       App\Models\User {#4418
         name: "Demarco Kautzer",
         email: "moises.feil@example.org",
         email_verified_at: "2021-07-05 11:26:36",
         #password: "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
         #remember_token: "ICITRjOegc",
         updated_at: "2021-07-05 11:26:36",
         created_at: "2021-07-05 11:26:36",
         id: 53,
       },
     ],
   }

```


- 60 - Factories com BelongsTo

```
>>> Profile::factory()->for(User::factory())->create()

=> App\Models\Profile {#3459
     about: "Dolorum sunt quia nihil maiores sed. Et quo eaque totam consequatur. Non nihil sed neque voluptas repellendus iusto quis quia. Impedit quaerat mollitia consequatur vero ipsum quis.",
     phone: "(05) 8530-4726",
     social_networks: "facebook-twitter-instagran",
     user_id: 54,
     updated_at: "2021-07-05 11:36:00",
     created_at: "2021-07-05 11:36:00",
     id: 6,
   }

>>> Profile::factory()->forUser()->create()

=> App\Models\Profile {#3460
     about: "Consequatur et itaque mollitia et vel. Ut dolorem rerum non voluptatem amet. Recusandae laboriosam sit amet.",
     phone: "(86) 1991-7718",
     social_networks: "facebook-twitter-instagran",
     user_id: 55,
     updated_at: "2021-07-05 11:36:47",
     created_at: "2021-07-05 11:36:47",
     id: 7,
   }

```


- 61 - Executando as Factories via Seed

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/UsersTableSeeder.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/UsersTableSeeder.php)

```php
  public function run()
    {
         User::factory(50)
             ->hasProfile()
             ->create();
    }
```

- [3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/EventsTableSeeder.php](3-Primeiros-Passos-Visao-Geral/10-Panorama-Inicial-do-Laravel/database/seeders/EventsTableSeeder.php)

```php
public function run()
    {
          Event::factory(30)
              ->hasPhotos(4)
              ->hasCategories(3)
              ->create();
    }
```

```
$ php artisan migrate:fresh
Dropped all tables successfully.
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (36.94ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (27.41ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (26.37ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (13.16ms)
Migrating: 2021_06_30_000514_alter_events_table_add_column_slug
Migrated:  2021_06_30_000514_alter_events_table_add_column_slug (26.87ms)
Migrating: 2021_07_01_123354_create_profiles_table
Migrated:  2021_07_01_123354_create_profiles_table (55.27ms)
Migrating: 2021_07_01_225814_create_photos_table
Migrated:  2021_07_01_225814_create_photos_table (41.61ms)
Migrating: 2021_07_02_140211_create_categories_table
Migrated:  2021_07_02_140211_create_categories_table (18.11ms)
Migrating: 2021_07_02_141405_create_category_event_table
Migrated:  2021_07_02_141405_create_category_event_table (77.06ms)

```

```
$ php artisan db:seed
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (265.87ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (473.01ms)
Database seeding completed successfully.

```

```
$ php artisan migrate:refresh --seed
Rolling back: 2021_07_02_141405_create_category_event_table
Rolled back:  2021_07_02_141405_create_category_event_table (8.11ms)
Rolling back: 2021_07_02_140211_create_categories_table
Rolled back:  2021_07_02_140211_create_categories_table (4.95ms)
Rolling back: 2021_07_01_225814_create_photos_table
Rolled back:  2021_07_01_225814_create_photos_table (5.24ms)
Rolling back: 2021_07_01_123354_create_profiles_table
Rolled back:  2021_07_01_123354_create_profiles_table (4.76ms)
Rolling back: 2021_06_30_000514_alter_events_table_add_column_slug
Rolled back:  2021_06_30_000514_alter_events_table_add_column_slug (78.79ms)
Rolling back: 2021_06_29_132248_create_events_table
Rolled back:  2021_06_29_132248_create_events_table (5.06ms)
Rolling back: 2019_08_19_000000_create_failed_jobs_table
Rolled back:  2019_08_19_000000_create_failed_jobs_table (5.86ms)
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table (5.38ms)
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table (7.26ms)
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (34.75ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (30.58ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (27.42ms)
Migrating: 2021_06_29_132248_create_events_table
Migrated:  2021_06_29_132248_create_events_table (15.05ms)
Migrating: 2021_06_30_000514_alter_events_table_add_column_slug
Migrated:  2021_06_30_000514_alter_events_table_add_column_slug (27.60ms)
Migrating: 2021_07_01_123354_create_profiles_table
Migrated:  2021_07_01_123354_create_profiles_table (61.20ms)
Migrating: 2021_07_01_225814_create_photos_table
Migrated:  2021_07_01_225814_create_photos_table (53.49ms)
Migrating: 2021_07_02_140211_create_categories_table
Migrated:  2021_07_02_140211_create_categories_table (14.52ms)
Migrating: 2021_07_02_141405_create_category_event_table
Migrated:  2021_07_02_141405_create_category_event_table (77.81ms)
Seeding: Database\Seeders\UsersTableSeeder
Seeded:  Database\Seeders\UsersTableSeeder (222.38ms)
Seeding: Database\Seeders\EventsTableSeeder
Seeded:  Database\Seeders\EventsTableSeeder (473.98ms)
Database seeding completed successfully.

```

[Voltar ao Índice](#indice)

---


## <a name="parte68">7. View: Laravel Blade</a>

- 62 - Introdução

- 63 - Relembrando as Views

- [7-View-Laravel-Blade/resources/views/teste/index.blade.php](7-View-Laravel-Blade/resources/views/teste/index.blade.php)

```php
Route::get('/view-teste', fn() => view('teste.index'));
```

- 64 - Loop e Passagem de Dados View

```php
Route::get('/', function () {
    $events = \App\Models\Event::all();

    //return view('welcome', ['events'=>$events]);
    // compac('event') => \App\Models\Event::all();
    return view('welcome', compact('events'));
});
```

```blade
<ul>
    @foreach($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
</ul>

```


- 65 - Diretiva ForElse

```blade
<h2>Eventos</h2>
<hr>
<ul>
    @forelse($events as $event)
        <li>{{$event->title}}</li>
    @empty
        <li>Nenhum evento encotrado nesse site...</li>
    @endforelse
</ul>
<hr>
@if(count($events))
    <ul>
        @foreach($events as $event)
            <li>{{$event->title}}</li>
        @endforeach
    </ul>
@else
    <h3>Nenhum evento encotrado nesse site...</h3>
@endif

```

- 66 - O print do Blade

- 67 - Herança de Templates

- [7-View-Laravel-Blade/resources/views/layout/site.blade.php](7-View-Laravel-Blade/resources/views/layout/site.blade.php)

```blade
@yield('content')
```

- [7-View-Laravel-Blade/resources/views/welcome.blade.php](7-View-Laravel-Blade/resources/views/welcome.blade.php)

```blade
@extends('layout.site')

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
            <li>Nenhum evento encotrado nesse site...</li>
        @endforelse
    </ul>
    <hr>
@endsection

```

- 68 - Incrementando Views de Eventos

- 69 - Melhorias Home e Inicio de Single

- 70 - Compondo View Single Evento

- 71 - Exibindo Fotos Evento se Existirem

- 72 - Organizando com HomeController

- 73 - Conclusões

[Voltar ao Índice](#indice)

---


## <a name="parte81"> 8. View: Manipulação de Formulários</a>

- 74 - Introdução

- 75 - Organizando Rotas Painel Eventos

- 76 - Listagem de Eventos

- 77 - Paginando Dados

- [7-View-Laravel-Blade/app/Http/Controllers/Admin/EventController.php](7-View-Laravel-Blade/app/Http/Controllers/Admin/EventController.php)

```php
    public function index()
    {
        //$events = Event::all();
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events')); //admin.events.index
    }
```

- [7-View-Laravel-Blade/app/Providers/AppServiceProvider.php](7-View-Laravel-Blade/app/Providers/AppServiceProvider.php)

```php

use Illuminate\Pagination\Paginator;

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

- [7-View-Laravel-Blade/resources/views/admin/events/index.blade.php](7-View-Laravel-Blade/resources/views/admin/events/index.blade.php)


```php
        {{$events->links()}}
```


- 78 - Tela de Criação de Evento

- 79 - Entendendo CSRF no Laravel

- [7-View-Laravel-Blade/resources/views/admin/events/create.blade.php](7-View-Laravel-Blade/resources/views/admin/events/create.blade.php)

```php
 <form action="/admin/events/store" method="post">

                @csrf

                <div class="form-group">
```

- 80 - Manipulando Dados da Request

```php 
public function store()
    {
        // Recuperando uma instância do Request
        // request()

        // Recuperar todos os conteúdos do form enviado como array
        //request()->all()

        // Recuperar uma chave específica do envio do form
        //request('title') || request()->get('title')

        // Recuperar uma chave espefífica do envio como propriedade
        // dd(request()->title)

        //dd('chegamos no controller e no método ' . __METHOD__);
//        $eventData = [
//            'title' => 'Titulo add 3' . rand(1, 100),
//            'description' => 'Descrição 3333 UPDATE MASS',
//            'body' => 'Corpo 3 UPDATE MASS',
//            'start_event' => date('Y-m-d H:i:s'),
//            'slug' => 'titulo-adddddd-3-with-array-3'
//        ];
        $event = request()->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->to('/admin/events/index');
    }
```

- 81 - Editando Eventos

- 82 - Linkando Edição e Remoção de Evento

- 83 - Melhorias Manipulação de Request

- 84 - Conclusões


[Voltar ao Índice](#indice)

---

## <a name="parte93">9. Laravel Router</a>

- 85 - Introdução
  
- 86 - Relembrando Rotas

```php
// GET | POST | PUT | DELETE | OPTIONS | HEAD

// any a qualquer verbo ou match
//Route::any('/teste-any', fn() => 'Rota Any'); // Match com qualquer verbo, sendo um dos verbos permitidos acima

//para fazer match com post e put
//Route::match(['post', 'post'], '/teste-match', fn => 'Tora Mach');

```

- 87 - Organizando Rotas com Prefixo e Grupo
  
```php
Route::prefix('/admin')->group(function () {
    Route::prefix('events')->group(function () {
        Route::get ('/index',          [\App\Http\Controllers\Admin\EventController::class, 'index']);
        Route::get ('/create',         [\App\Http\Controllers\Admin\EventController::class, 'create']);
        Route::post('/store',          [\App\Http\Controllers\Admin\EventController::class, 'store']);
        Route::get ('/{event}/edit',   [\App\Http\Controllers\Admin\EventController::class, 'edit']);
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update']);
        Route::get ('/destroy/{event}',[\App\Http\Controllers\Admin\EventController::class, 'destroy']);
    });
});

```
- 88 - Usando Apelido de Rotas

```php
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('events')->name('events.')->group(function () {
    Route::get ('/',          [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');
    Route::get ('/create',         [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('create');
    Route::post('/store',          [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('store');
    Route::get ('/{event}/edit',   [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('edit');
    Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('update');
    Route::get ('/destroy/{event}',[\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('destroy');
    });
});
```

- 89 - Refatorando Links nas Views
  
- 90 - Refatorando Redirecionamentos
  
- 91 - Dando um Tapa no Painel de Eventos
  
- 92 - Conclusões


[Voltar ao Índice](#indice)

---



## <a name="parte102">10. Manipulando Validações</a>

- 93 - Introdução
  
- 94 - Usando Validação Controller
  
```php
public function store(Request $request)
    {
        $request->validate([
                'title' => 'required|min:30',
                'description' => 'required',
                'body' => 'required',
                'start_event' => 'required'
            ]
        );
        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->route('admin.events.index');
    }
```

- 95 - Exibindo Todas as Validações na View

- [7-View-Laravel-Blade/resources/views/admin/events/create.blade.php](7-View-Laravel-Blade/resources/views/admin/events/create.blade.php)

```blade
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
```

- 96 - Exibindo Validações POr Input
  
- 97 - Diretiva @error
  
```blade
<div class="form-group">
    <label for="">Título do Evento</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
    @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>
```

- 98 - Traduzindo Mensagens de Validação

```php
$request->validate([
                'title' =>       'required|min:30',
                'description' => 'required',
                'body' =>        'required',
                'start_event' => 'required'
            ],
            [
                'title.required' => 'Este campo Título é obrigatorio' ,
                'required' => 'Este campo é Obrigatório' ,
                'min' => 'Este campo não aninte o mínimo de caracteres permitidos. Minho = :min' ,
            ]
        );
```

- 99 - Melhorando Para Form Requests

```
$ php artisan make:request EventRequest
Request created successfully.

```

- [7-View-Laravel-Blade/app/Http/Requests/EventRequest.php](7-View-Laravel-Blade/app/Http/Requests/EventRequest.php)

```php
public function rules()
    {
        return [
            'title' =>       'required|min:30',
            'description' => 'required',
            'body' =>        'required',
            'start_event' => 'required'
        ];
    }

    public function messages()
    {
     return [
         'title.required' => 'Este campo Título é obrigatorio' ,
         'required' => 'Este campo é Obrigatório' ,
         'min' => 'Este campo não aninte o mínimo de caracteres permitidos. Minho = :min' ,
     ];
    }
```

- 100 - Validação na Edição do Evento
  
- 101 - Conclusões


[Voltar ao Índice](#indice)

---


## <a name="parte112">11. Controllers como Recurso</a>

- 102 - Introdução
  
- 103 - O que são Controllers como Recurso
  
- 104 - Criando Controllers como Recurso
  
- 105 - Controller como Recurso em Eventos
  
- 106 - Tomando Nota dos Ganhos
  
- 107 - Recursos Aninhados
  
- 108 - Recursos Aninhados no Projeto e Mais
  
- 109 - Registrando Vários Recursos
  
- 110 - DI nos Controllers
  
- 111 - Conclusões


[Voltar ao Índice](#indice)

---


## <a name="parte123">12. Primeiro Starter Point: Laravel UI</a>



[Voltar ao Índice](#indice)

---


## <a name="parte134">13. Melhorias Projeto Eventos</a>



[Voltar ao Índice](#indice)

---



## <a name="parte148">14. Upload de Arquivos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte163">15. Melhorias & Encerramento Bloco 1 --atualizando</a>



[Voltar ao Índice](#indice)

---

## <a name="parteb16">16. ACL & Autorização</a>


[Voltar ao Índice](#indice)

---

## <a name="parteb17">17. Bloco 2 - Iniciando</a>


[Voltar ao Índice](#indice)

---
