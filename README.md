### Laravel Logging Research Sandbox

- Logging is an important feature of a website with authorization and roles.  We want to see who modified which database model and when.

- This project is looking into the feasibility of having a base model that controls all the loggging of a model's access, updating, deleting, and creating.


- Findings: possible to log create/update/delete inside a base model, but retrieval access logging needs to be done in each specific view as there is no way to determine if a model is being retrieved as part of a collection or by itself


---
This project out of the box will have browsersync and tailwind jit running.

install composer first

[Composer Download](https://getcomposer.org/download/)

Then use composer to install Laravel:

[Install Laravel with Composer](https://laravel.com/docs/8.x#installation-via-composer)

We are going to use the tall stack: https://tallstack.dev/, follow the instructions for Installation **(without auth)**

to use tailwind jit add this to _tailwind.config.js_

```
    mode: 'jit',
```

we can also have the browser hot reload add this line to the end of the _webpack.mix.js_
```
mix.browserSync('localhost:8000');
```

then run **npx mix watch** and leave it running

then to run the php server open another terminal and run:

_php artisan serve_

non-tailwind, non-scss styles can be put in resources/css/styles.css this will be copied over by mix and is referenced in base.blade.php
