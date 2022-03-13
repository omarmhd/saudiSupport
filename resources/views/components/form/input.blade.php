@props(['id','label','name','value','type'=>'text','placeholder'])
<input type="{{$type}}"
       id="{{$id}}"
       name="{{$name}}"
       value="{{old($name,$value)}}"
       placeholder="{{$placeholder}}"
       {{$attributes->class(['form-control'])}}

>
