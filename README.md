# laravel EasyBlade

You can create a simpler and readable view with EasyBlade

# Install

```
    composer require aminireza-ir/laravel-easy-blade
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