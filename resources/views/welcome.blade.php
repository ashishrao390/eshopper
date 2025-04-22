<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <h3>url()->current() => {{url()->current()}}</h3>
    <h3>url()->full() => {{url()->full()}}</h3>
    <h3>url()->previous() => {{url()->previous()}}</h3>
    <h3>URL::current() => {{URL::current()}}</h3>
    <h3>URL::full() => {{URL::full()}}</h3>
    <h3>URL::previous() => {{URL::previous()}}</h3>
    <h3>URL::to('welcome') => <a href="{{URL::to('welcome')}}">{{URL::to('welcome')}}</a></h3>
    <h3>/welcome => <a href="/welcome">/welcome</a></h3>
    <h3>URL::to('welcome',['name']) => <a href="{{URL::to('/welcome',['ashish'])}}">{{URL::to('welcome',['name'])}}</a></h3>
    <h3></h3>
    <h3></h3>
    <h3></h3>
    <h3></h3>
    <h3></h3>
    <h3></h3>
    <h3></h3>
</html>
