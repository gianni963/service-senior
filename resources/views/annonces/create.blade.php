@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Poster une annonce</div>
            <div class="panel-body">
                <form action="{{ route('annonce.store') }}" method="post">
            
                    <div class="form-group {{ $errors->has('titre')? 'has-error' : '' }}">
                        <label for="titre" class="control-label">Titre:</label>
                        <input type="text"  name="titre" id="titre" class="form-control"> 

                        @if($errors->has('titre'))
                            <span class="help-block">
                                {{ $errors->first('titre') }}
                            <s/span>
                        @endif
                    </div>

                    @include('annonces.partials.form_zone')

                     <div class="form-group {{ $errors->has('price')? 'has-error' : '' }}">
                        <label for="Prix" class="control-label">Prix de l'heure: (optionnel)</label>
                       <input type="number" step=".01" name="price" id="price" class="form-control"> 

                        @if($errors->has('price'))
                            <span class="help-block">
                                {{ $errors->first('price') }}
                            <s/span>
                        @endif
                    </div>
                    @include('annonces.partials.form_category')

                    <div class="form-group {{ $errors->has('contenu')? 'has-error' : '' }}">
                        <label for="contenu" class="control-label">Contenu de l'annonce:</label>
                        <textarea name="contenu" id="contenu" cols="30" rows="8" class="form-control"></textarea>

                        @if($errors->has('contenu'))
                            <span class="help-block">
                                {{ $errors->first('contenu') }}
                            </span>
                        @endif
                    </div>

                     <div class="form-group">
                            <label for="tag_list" class="control-label">Ajouter des mots clés:</label>
                            <select class="form-control" multiple="multiple" name="tags[]" id="tags">
                                @foreach($tags as $key => $tag)
                                    <option value="{{$key}}" >{{$tag}} </option>
                                @endforeach
                            </select>
                            @if($errors->has('tags'))
                                <span class="help-block">
                                    {{ $errors->first('tags') }}
                                </span>
                            @endif
                        </div> 

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Poster</button>
                    </div>

                    {{ csrf_field() }}

                </form>
            </div>
        </div>
    </div>
 

</div>

@endsection

@section('footer')

@endsection