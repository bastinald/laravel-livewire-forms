# No Longer Maintained

Check out my new UI, Auth, & CRUD scaffolding package here: https://github.com/bastinald/laravel-livewire-ui

---

## Laravel Livewire Forms

Laravel Livewire form component with declarative Bootstrap 5 fields and buttons.

## Requirements

- Bootstrap 5

## Installation

```console
composer require bastinald/laravel-livewire-forms
```

## Usage

Make a new form:

```console
php artisan make:form users.create-user-form
```

Declare fields:

```php
public function fields()
{
    return [
        Input::make('name', 'Name'),
        Input::make('email', 'Email')->type('email'),
        Input::make('password', 'Password')->type('password'),
    ];
}
```

Declare buttons:

```php
public function buttons()
{
    return [
        Button::make('Create User')->click('createUser'),
        Button::make('Cancel', 'secondary')->url('/'),
    ];
}
```

Declare rules:

```php
public function rules()
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
    ];
}
```

Declare an action (notice the use of `->click('createUser')` in the button example above:

```php
public function createUser()
{
    $this->validate();

    User::create([
        'name' => $this->data('name'),
        'email' => $this->data('email'),
        'password' => Hash::make($this->data('password')),
    ]);

    return redirect('/');
}
```

## Full Page Forms

Create a full page form by specifying a `title`, `layout` and `route` to use:

```php
class Login extends FormComponent
{
    public $title = 'Login';
    public $layout = 'layouts.card';

    public function route()
    {
        return Route::get('/login', static::class)
            ->name('login')
            ->middleware('guest');
    }
```

The `route` method is made available by using my [laravel-livewire-routes](https://github.com/bastinald/laravel-livewire-routes) package.

## Setting Initial Data

You can set the initial form data / defaults via the `data` array property in your component `mount` method:

```php
class UpdateUserForm extends FormComponent
{
    public $title = 'Update User';
    
    public function route()
    {
        return Route::get('/users/update/{user}', static::class)
            ->name('users.update')
            ->middleware('auth');
    }
    
    public function mount(User $user)
    {
        $this->data = $user->toArray();
    }
```

## Accessing Data

Use the `data` method in the component to access current form data (you can use dot notation for array values):

```php
public function createUser()
{
    User::create([
        'name' => $this->data('name'),
        'email' => $this->data('email'),
        'likes_turtles' => $this->data('answers.likes_turtles'),
    ]);
}
```

## Data Binding

Most fields allow you to change the way livewire binds data via helper methods that are chained to fields e.g.:

```php
Input::make('name', 'Name'), // defaults to defer
Input::make('name', 'Name')->instant(), // bind on keyup 
Input::make('name', 'Name')->defer(), // bind on action 
Input::make('name', 'Name')->lazy(), // bind on change
Input::make('name', 'Name')->debounce(500), // bind after 500ms delay 
```

## Sizing

Many fields also allow you to specify a size for the input e.g.:

```php
Input::make('name', 'Name'), // defaults to normal sizing
Input::make('name', 'Name')->small(), // small sizing
Input::make('name', 'Name')->large(), // large sizing
```

## Disabling

Some fields allow you to disable or set them to readonly, and even plaintext for inputs:

```php
Input::make('name', 'Name')->disabled(),
Input::make('name', 'Name')->readonly(),
Input::make('name', 'Name')->plaintext(),
```

## Helper Text

Specify helper text for a field by using the `help` method:

```php
Input::make('name', 'Name')->help('Please tell us your name!'),
```

## Available Fields

### Alert `($message, $style = 'success')`

An alert box.

```php
Alert::make('It worked!'),
Alert::make('Something bad happened.', 'danger'),
Alert::make('Something else happened.')->dismissible(),
```

The `$style` parameter accepts a bootstrap alert style e.g. `success`, `danger`, `primary`, etc. Use the `dismissible` method to make the alert dismissible.

Available methods: `dismissible`

### Arrayable `($name, $label = null)`

An array of fields.

```php
Arrayable::make('locations', 'Locations')->fields([
    Input::make('city')->placeholder('City'),
    Select::make('state')->placeholder('State')->options(['FL', 'TX']),
]),
```

Available methods: `fields`, `help`, `disabled`

### Button `($label = 'Submit', $style = 'primary')`

A button used for actions and links.

```php
Button::make('Register')->click('register'),
Button::make('Already registered?', 'secondary')->route('login'),
Button::make('Go back home', 'link')->url('/'),
```

The `$style` parameter accepts a bootstrap button style e.g. `primary`, `outline-secondary`, `link`, etc. Use the `block` method to make a button full width.

Available methods: `block`, `click`, `href`, `route`, `url`

### Checkbox `($name, $label)`

A checkbox field.

```php
Checkbox::make('accept', 'I accept the terms'),
Checkbox::make('accept', 'I accept')->help('Please accept our terms'),
Checkbox::make('active', 'This user is active')->switch(),
```

Use the `switch` method to style the checkbox as a switch.

Available methods: `switch`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`

### Checkboxes `($name, $label = null)`

An array of checkbox fields.

```php
Checkboxes::make('colors', 'Colors')->options(['Red', 'Green', 'Blue']),
```

Available methods: `options`, `switch`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`

### Color `($name, $label = null)`

A color picker field.

```php
Color::make('hair_color', 'Hair Color'),
```

Available methods: `small`, `large`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`, `readonly`

### Conditional

A statement used to conditionally show fields.

```php
Conditional::if($this->data('color') == 'green', [
    Input::make('green', 'Green'),
])->elseif($this->data('color') == 'blue', [
    Input::make('blue', 'Blue'),
])->else([
    Input::make('red', 'Red'),
]),
```

Available methods: `if`, `elseif`, `else`

### DynamicComponent `($name, $attrs = [])`

A field used to display dynamic third-party components.

```php
DynamicComponent::make('honey'),
DynamicComponent::make('honey', ['recaptcha' => true]),
```

This would translate to `<x-honey/>` and `<x-honey recaptcha="recaptcha"/>` in your form.

### File `($name, $label = null)`

A file upload field.

```php
File::make('avatar', 'Avatar'),
File::make('photos', 'Photos')->multiple(),
File::make('documents', 'Documents')->multiple()->disk('s3'),
```

Use the `multiple` method to allow multiple file uploads. Optionally specify the filesystem disk to use via the `disk` method (used for linking to files, defaults to the filesystem config `default`).

Available methods: `disk`, `multiple`, `help`, `disabled`

### Input `($name, $label = null)`

An input field.

```php
Input::make('name', 'Name'),
Input::make('phone')->placeholder('Phone')->type('tel'),
Input::make('email', 'Email')->type('email')->large(),
Input::make('price', 'Price')->type('number')->append('$')->prepend('.00'),
```

The `type` method accepts a standard HTML input type. As with other inputs, use `small` or `large` to resize an input. Input fields also support appends/prepends, and even plaintext.

Available methods: `small`, `large`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`, `readonly`, `placeholder`, `type`, `append`, `prepend`, `plaintext`

### Radio `($name, $label = null)`

A radio field.

```php
Radio::make('gender', 'Gender')->options(['Male', 'Female']),
```

Available methods: `options`, `switch`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`

### Select `($name, $label = null)`

A select dropdown field.

```php
Select::make('color', 'Color')->options(['Red', 'Green', 'Blue']),
Select::make('color', 'Color')->options([
    '#ff0000' => 'Red',
    '#00ff00' => 'Green',
    '#0000ff' => 'Blue',
])->instant(),
Select::make('user_id', 'User')->options(User::pluck('name', 'id')->toArray()),
```

Available methods: `options`, `small`, `large`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`, `placeholder`

### Textarea `($name, $label = null)`

A textarea field.

```php
Input::make('bio', 'Biography'),
Input::make('bio', 'Biography')->rows(5),
```

Available methods: `small`, `large`, `help`, `instant`, `defer`, `lazy`, `debounce`, `disabled`, `readonly`, `placeholder`, `rows`

### View `($name, $data = [])`

Used to render a custom Blade view inside the form.

```php
View::make('custom-view', ['hello' => 'world']),
```
