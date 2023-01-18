@props(['title','name','dropItems', 'setItem'=>[]])

<label for="{{ $name }}">{{ $title }}</label>


<select name="name" class="block w-full mt-1 rounded-md">
    @foreach ($dropItems as $item)
    <option @selected($item->id == $setItem->id)
        value="{{$item->id}}" @endselected>{{$item->title}}</option>
    @endforeach
</select>