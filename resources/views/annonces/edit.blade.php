@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Continuer d'éditer l'annonce

            </div>

            <div class="panel-body">

                @if ($annonce->live())
                    <span><a style="color:blue;" href="{{ route('annonce.show', [$annonce]) }}">Voir l'annonce</a></span>
                    <hr />
                @endif
                <form action="{{ route('annonce.update',$annonce) }}" method="post">
                    
                    
                    <div class="form-group {{ $errors->has('titre')? 'has-error' : '' }}">
                        <label for="titre" class="control-label">Titre:</label>
                        <input type="text"  name="titre" id="titre" class="form-control" value="{{ $annonce->titre}}"> 

                        @if($errors->has('titre'))
                            <span class="help-block">
                                {{ $errors->first('titre') }}
                            </span>
                        @endif
                    </div>

                    @include('annonces.partials.form_zone')
                    
                     <div class="form-group {{ $errors->has('price')? 'has-error' : '' }}">
                        <label for="price" class="control-label">Prix de l'heure: (optionnel)</label>
                       <input type="number" step=".01" name="price" id="price" class="form-control" value="{{ $annonce->price}}" {{isset($annonce) && $annonce->live ? 'disabled = "disabled"' : ''}}> 

                        @if($errors->has('price'))
                            <span class="help-block">
                                {{ $errors->first('price') }}
                            </span>
                        @endif
                    </div>
                    @include('annonces.partials.form_category')
                    <div class="form-group {{ $errors->has('contenu')? 'has-error' : '' }}">
                        <label for="contenu" class="control-label" >Contenu de l'annonce:</label>
                        <textarea name="contenu" id="contenu" cols="30" rows="8" class="form-control" >{{ $annonce->contenu}}</textarea>

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
                                    <option value="{{$key}}" id="tags" 

                                    <?php foreach($annonce->tags as $tagAnnonce){

                                        if($tagAnnonce->pivot->tag_id === $key)
                                        {
                                            ?>
                                            selected="selected"
                                            <?php
                                        }
                                    }
                                    ?>
                                    >{{$tag}} </option>
                                @endforeach
                            </select>
                             @if($errors->has('tags'))
                            <span class="help-block">
                                {{ $errors->first('tags') }}
                            </span>
                            @endif
                    </div> 
                    @if($annonce->user->roles->first()->name == 'senior')
                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-default">Poster</button>
                        <hr />

                    @else
                         <div class="form-group clearfix">
                        <button type="submit" class="btn btn-default">Modifier</button>
                        <hr />
                    @endif
                        @if($annonce->user->roles->first()->name == 'prestataire')

                            @if(!$annonce->live())
                                
                                <button type="submit" class="btn btn-info" name="paypost" value="true">Aller au paiement</button>
                            @endif
                        @endif
                    </div>
                    @if($annonce->live())
                        <input type="hidden" name="category_id" value="{{ $annonce->category_id}}">
                    @endif
               

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}


                </form>

            </div>
        </div>
    </div>
</div>

@endsection