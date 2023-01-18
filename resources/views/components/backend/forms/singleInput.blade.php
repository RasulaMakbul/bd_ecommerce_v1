@props(['name','title','type','id','value'=>''])

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" {{ $attributes->merge(['class'=>'form-control'])}} id="{{ $id }}">


</div>