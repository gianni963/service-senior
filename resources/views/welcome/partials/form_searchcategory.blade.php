<div class="form-group{{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="zone" class="control-label">Categories</label>
    <select name="category_id"  id="category" class="form-control" >
        @foreach($categories as $category)

            <optgroup label="{{$category->name}}">
                @foreach ($category->children as $subcategory)
                    
              <option value="{{ $subcategory->id}}">{{ $subcategory->name }} </option>
                    

                @endforeach
            </optgroup>
        @endforeach
    <select>

    @if ($errors->has('category_id'))
        <span class="help-block">
            {{ $errors->first('category_id') }}
        </span>
    @endif
</div>

