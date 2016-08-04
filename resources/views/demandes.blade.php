@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste de demande</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Raison</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Approuvé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td class="raison">{{ $demande->raison }}</td>
                                    <td>{{ $demande->debut }}</td>
                                    <td>{{ $demande->fin }}</td>
                                    <td>{{ $demande->approuvé ? 'Oui' : 'Non' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
