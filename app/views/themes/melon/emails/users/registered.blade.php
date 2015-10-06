<h2>Bienvenid{{($candidate->gender=='male')?'o':'a'}} a nuestro sistema de inventarios y facturación.</h2>
<h3>Sr. {{$candidate->user->full_name}} su contrase&ntilde;a nueva es: {{$password}}</h3>
<p>
    Para acceder, haga <a href="{{Route('home')}}">click</a>
</p>