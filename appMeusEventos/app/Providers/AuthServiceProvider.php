<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        VerifyEmail::toMailUsing(function ($notifiable, $url){
            return (new MailMessage)
                ->subject('Verifique seu Email')
                ->line('Por favor clique no link abaixo para verificar seu email')
                ->action('Verifique Seu Email', $url)
                ->line('Se você não criou uma conta, nenhuma ação é necessária');
        });

        ResetPassword::toMailUsing(function ($notifiable, $url){

            $expires = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');

            return (new MailMessage)
                ->subject('Notificação de Resede de senha')
                ->line('Se voce esta recebendo este email, é porque recebemos um pedido de reset de senha')
                ->action('Reset a Senha', $url)
                ->line('Este Link de reset expirará em '. $expires . ' minutos.')
                ->line('Se voce não solicitou, ignore esta mensagem');
        });

    }
}
