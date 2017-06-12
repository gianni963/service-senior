<div class="form-group{{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="zone" class="control-label">Categories</label>
    <select name="category_id"  id="category" class="form-control"{{isset($annonce) && $annonce->live ? 'disabled = "disabled"' : ''}} >
        @foreach($categories as $category)

            <optgroup label="{{$category->name}}">
                @foreach ($category->children as $subcategory)

                    @if (isset($annonce) && $annonce->category->id == $subcategory->id || old('category_id') == $subcategory->id )
                    
                    <option value="{{ $subcategory->id }}" selected="selected" >{{ $subcategory->name }}</option>

                    @else
                        <option value="{{ $subcategory->id}}">{{ $subcategory->name }} </option>
                    @endif

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

