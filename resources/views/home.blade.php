@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Demande de congé</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/demande') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('raison') ? ' has-error' : '' }}">
                            <label for="raison" class="col-md-4 control-label">Raison</label>

                            <div class="col-md-6">
                                <input id="raison" type="text" class="form-control" name="raison" value="{{ old('raison') }}" autofocus>

                                @if ($errors->has('raison'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('raison') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('debut') ? ' has-error' : '' }}">
                            <label for="debut" class="col-md-4 control-label">Date de début</label>

                            <div class="col-md-6">
                                <input id="debut" type="date" class="form-control" name="debut" value="{{ old('debut') }}" autofocus>

                                @if ($errors->has('debut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('debut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
                            <label for="fin" class="col-md-4 control-label">Date de fin</label>

                            <div class="col-md-6">
                                <input id="fin" type="date" class="form-control" name="fin" value="{{ old('fin') }}" autofocus>

                                @if ($errors->has('fin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type de congé</label>

                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="sans-solde" value="sans-solde" {{ old('type') == 'sans-solde' ? 'checked' : '' }}>
                                        Sans solde
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="conge-paye" value="conge-paye" {{ old('type') == 'conge-paye' ? 'checked' : '' }}>
                                        Congé payé
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="ctf" value="ctf" {{ old('type') == 'ctf' ? 'checked' : '' }}>
                                        CTF
                                    </label>
                                </div>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
