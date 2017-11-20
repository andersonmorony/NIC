<div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
	    	<label for="title" class="col-12 control-label">{{ 'Title' }}</label>
	        <input class="form-control" name="title" type="text" id="title" value="{{ $exemplo2->title or ''}}" >
	        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	    </div>
	</div>
</div><div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
	    	<label for="content" class="col-12 control-label">{{ 'Content' }}</label>
	        <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ $exemplo2->content or ''}}</textarea>
	        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
	    </div>
	</div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
