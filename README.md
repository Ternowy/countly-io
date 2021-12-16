<p align="center"><img src="https://pbs.twimg.com/profile_images/1369592297340407813/DeRAm4tC_400x400.png" width="400"></p>

## How to start

### Windows

1. Configure your project by copying the config example. 
   Insert any credentials for authorization in order to get access to user panel
```
cp .env.example .env
```
2. You have to have [WSL](https://docs.microsoft.com/en-us/windows/wsl/install-win10) installed
3. Install dependencies with ```composer install``` in order to get [sail](https://laravel.com/docs/8.x/sail) 
Open the project folder and start sail
```bash
composer install
./vendor/bin/sail up
```
You can add an alias to avoid full path typing
```bash
alias sail='bash vendor/bin/sail'
sail up
```
4. Run DB migrations to get database structure
```bash
sail artisan migrate
```
5. Point ```laravel.test``` and ```survey.laravel.test``` to ```127.0.0.1``` in hosts.
    Please, keep in mind, ```laravel.test``` comes from ```.env``` file and is the default network name for the container.

## Standards

### PHP

1. Codestyle - PSR12
2. Services and repositories. Services are providing operations like insert/delete. Repositories provide only the obtaining.
3. Abstractions over the primitive types.
4. Enums instead of string values.

### JS

1. Linting, defined in config ```.eslintrc.js```
2. Google JS code style. If you are using IDE from JetBrains, like phpstorm or webstorm, 
   you can choose it in settings by clicking "set styleguide from..."
3. Abstraction over composition. If there is a component for special purpose, which uses other components, 
   consider to use ```<slot/>``` or configure the behaviour with props instead of creating the new component. 


## Contributing

All processes should correspond to Gitflow standard.

All commits related to tickets should include [#ticket_number] at the beginning of the commit message, in order
to be automatically fetched by Github, all commits will be displayed in the corresponding ticket.

```[#255] added signup survey```

## Security Vulnerabilities

If you discover any security vulnerability within the project, please contact the responsible person.
