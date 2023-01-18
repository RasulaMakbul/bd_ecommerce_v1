@props(['name','title','id','value'=>''])


<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <textarea name="{{ $name }}" rows="3" {{ $attributes->merge(['class'=>'form-control'])}} id="{{ $id }}">{{ $value }}</textarea>
</div>