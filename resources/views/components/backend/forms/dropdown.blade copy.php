@props(['title','name','dropItems', 'setItem'=>[]])

<label for="{{ $name }}">{{ $title }}</label>



<select class="btn dropdown-toggle col-6 m-3 btn-outline-secondary" name="{{$name}}">

    <div class="dropdown-menu dropdown-menu-right">
        @foreach($dropItems as $key=>$item)
        <option class="dropdown-item" value="{{$key}}" @if ($setItem==$key) selected @endif>{{ $item }}</option>

        @endforeach
    </div>
</select>


<select name="makeup_id" class="block w-full mt-1 rounded-md">
    @foreach ($makeups as $makeup)
    <option @selected($makeup->id == $makeupSubCategory->makeup_id)
        value="{{$makeup->id}}">{{$makeup->title}}</option>
    @endforeach
</select>