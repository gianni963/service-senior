 <div class="form-group">
 	<label for="tag_list" class="control-label">Ajouter des mots clés:</label>
	<select class="form-control" multiple="multiple" name="tags[]" id="tags">
		@foreach($tags as $key => $tag)
			<option value="{{$key}}" id="tags" >{{$tag}} </option>
		@endforeach
	</select>
</div> 
