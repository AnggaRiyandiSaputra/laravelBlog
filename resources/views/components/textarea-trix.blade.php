@props(['value','id','name'])
<input id="{{$id}}" type="hidden" name="{{$name}}" value="{{$value}}" />
<trix-editor input="{{$id}}" class="min-h-80"></trix-editor>