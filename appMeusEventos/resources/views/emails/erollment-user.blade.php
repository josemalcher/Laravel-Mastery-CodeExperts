<div>
    <p>
        Olá <strong>{{ $user->name }}</strong>!
        <br><br>
        Sua inscrição no evento <strong>{{$event->title}}</strong> foi realizada com sucesso!
        <br><br>
        Obrigado pela Inscrição
    </p>
    <hr>
    Email Enviado em {{ date('d/m/Y H:i') }}
</div>
