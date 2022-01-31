@extends('home')

@section('content_bo')
<div class="d-flex justify-content-between">
    <a href="/admin/messageList/{{$show->id}}">Messages</a>
    {{-- <a href="/admin/tache/create">Ajouter une tâche</a> --}}
</div>
<div class="card">
    <div class="card-header">
      Nom:  {{$show->nomEntreprise}}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">TVA: {{$show->nrTVA}}</li>
      <li class="list-group-item">Activité: {{$show->activiteEntreprise}}</li>
      <li class="list-group-item">Adresse: {{$show->adresseEntreprise}}</li>
      <li class="list-group-item">Ville: {{$show->villeEntreprise}}</li>
      <li class="list-group-item">Pays: {{$show->paysEntreprise}}</li>
      <li class="list-group-item">Tel: {{$show->phoneEntreprise}}</li>
      <li class="list-group-item">Code postal: {{$show->codePostalEntreprise}}</li>
      <li class="list-group-item">Email de la personne de contact: {{$show->persContactEmail}}</li>
      <li class="list-group-item">Nom de la personne de contact: {{$show->persContactNom}}</li>
      <li class="list-group-item">Telephone de la personne de contact: {{$show->persContactphone}}</li>
    </ul>

</div>
<div class="container mt-3">


<form action="/admin/tache/create/{{$show->id}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Ajoutez une tâche à l'entreprise</label>
      <input type="text" name="tache" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>

</div>

  <div class="container mt-4">
     <p>Taches de l'entreprise</p> 
    @foreach ($show->tache as $tacheEnt)
      <div class="card">
        <div class="card-body">
          {{$tacheEnt->tache}}
        </div>
      </div>
      @endforeach
  </div>
@endsection