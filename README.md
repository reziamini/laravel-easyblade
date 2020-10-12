# laravel EasyBlade

You can create a simpler and readable view with EasyBlade

# Install

```
composer require aminireza-ir/laravel-easyblade
```

# How to Use

Use EasyBlade is too much easy like its name.

Imagine you want to write a route URL in a href in Blade
You can write this code : 
```html
    <a href="{{ route('home') }}"></a>
```
But We create a simpler way with EasyBlade 
Just write :
```html
    <a href="@route('home')"></a>
```
and don't use any {{ }} in your blade or don't use any PHP Pure code

Blade template engine has created to not code PHP Pure , It has created to code easier
You can do it by EasyBlade :) !

# Current Directive :

- ```@asset('foo')``` Use it instead of ```{{ asset('foo') }}``` 
- ```@url('foo')``` Use it instead of ```{{ url('foo') }}``` 
- ```@route('foo')``` Use it instead of ```{{ route('foo') }}``` 
- ```@isActive('routeName', 'active', 'deactive')``` instead of write lot of code to check current route is equal to route name which passed as string or array

# Features 
 - You can pass a route name or array of route names as first parameters to```@isActive``` directive , second parameter is a string which you want to echo in view and third parameter is a optional param and it will return a null string if nothing passed , It will be showed when current route is not equal to array or string which passed as first param