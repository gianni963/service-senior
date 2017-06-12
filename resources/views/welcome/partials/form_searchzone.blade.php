<div class="form-group{{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="zone" class="control-label">Province</label>
    <select name="zone_id"  id="zone" class="form-control" >
        @foreach($zones as $zone)

           
              
                    
              <option value="{{ $zone->id}}">{{ $zone->city}} </option>
                    

                
            </optgroup>
        @endforeach
    <select>

    @if ($errors->has('category_id'))
        <span class="help-block">
            {{ $errors->first('category_id') }}
        </span>
    @endif
</div>