<div class="form-group{{ $errors->has('zone_id') ? 'has-error' : ''}}">
    <label for="zone" class="control-label">Lieu</label>
    <select name="zone_id"  id="zone" class="form-control"{{isset($annonce) && $annonce->live ? 'disabled = "disabled"' : ''}} >
        
        @foreach($zones as $zone)

            @if(isset($annonce) && $annonce->zone_id == $zone->id || old('zone_id') == $zone->id )
              <option value="{{ $zone->id}}" selected="selected">{{ $zone->city }} </option>
            
            @else 
                <option value="{{ $zone->id}}">{{ $zone->city }} </option>
            
            @endif
           
        @endforeach
    <select>

    @if ($errors->has('zone_id'))
        <span class="help-block">
            {{ $errors->first('zone_id') }}
        </span>
    @endif
</div>
