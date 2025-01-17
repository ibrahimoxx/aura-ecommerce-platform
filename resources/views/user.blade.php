<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Ville</th>
            <th>CIN</th>
            <th>Tel</th>
        </tr>
@foreach($client as $X)
        <tr>
            <td>{{$X->name}}</td>
            <td>{{$X->ville}}</td>
            <td>{{$X->CIN}}</td>
            <td>{{$X->tel}}</td>
            <td>
                <a href="{{Route('supprimerUser',['code'=>$X->id])}}" class='btn btn-danger'>suprimer</a>
            </td>
            <td>
                <a href="{{Route('activer',['code'=>$X->id])}}" class='btn btn-success'>activer</a>
                <a href="{{Route('desactiver',['code'=>$X->id])}}" class='btn btn-secondary'>desactiver</a>
            </td>
        </tr>
@endforeach
    </thead>
</table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
