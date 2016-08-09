@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste de demande</div>
                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ url("/demandes?traite=1") }}">Demande traité</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Raison</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Type</th>
                                <th>Approuvé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td class="raison">{{ $demande->raison }}</td>
                                    <td>{{ $demande->debut }}</td>
                                    <td>{{ $demande->fin }}</td>
                                    <td>{{ trans('demande.type.' . $demande->type) }}</td>
                                    <td>
                                        @if (is_null($demande->approuve))
                                            <form class="inline" action="{{ url("/demande/$demande->id") }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="approuve" value="true">
                                                <button class="btn btn-success">Oui</button>
                                            </form>
                                            <form class="inline" action="{{ url("/demande/$demande->id") }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="approuve" value="false">
                                                <button class="btn btn-danger">Non</button>
                                            </form>
                                        @else
                                            {{ $demande->approuve ? 'Oui' : 'Non' }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $demandes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
