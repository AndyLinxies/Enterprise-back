
@extends('home')

@section('content_bo')
<h4 class="text-center"> All the Societies</h4>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">Activité</th>
        <th scope="col">Nr TVA</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($entreprises as $entreprise)
      <tr>
        <th scope="row">{{$entreprise->id}}</th>
        <td>{{$entreprise->nomEntreprise}}</td>
        <td>{{$entreprise->activiteEntreprise}}</td>
        <td>{{$entreprise->nrTVA}}</td>
        <td><a href="/admin/entreprise/{{$entreprise->id}}">
            <i class="fas fa-info-circle">
                
            </i>
        </a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
 
@endsection