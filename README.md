<p align="center"><img src="https://pbs.twimg.com/profile_images/1369592297340407813/DeRAm4tC_400x400.png" width="400"></p>

## How to start

### Windows

1. Configure your project by copying config example. 
   Insert any credentials for authorization in order to get access to user panel
```
cp .env.example .env
```
2. You have to have [WSL](https://docs.microsoft.com/en-us/windows/wsl/install-win10) installed
3. Open the project folder and start [sail](https://laravel.com/docs/8.x/sail) 
```bash
./vendor/bin/sail up
```
You can add alias to avoid full path typing
```bash
alias sail='bash vendor/bin/sail'
sail up
```
4. Run DB migrations in order to get database structure
```bash
sail artisan migrate
```
5. Point ```laravel.test``` and ```survey.laravel.test``` to ```127.0.0.1``` in hosts.
    Please, keep in mind, ```laravel.test``` comes from ```.env``` file and is default network name for container.

## Standards

### PHP

1. Codestyle - PSR12
2. Services and repositories. Services are providing inserting/deleting. Repositories are providing only the obtaining.
3. Abstractions instead of primitive types.
4. Enums instead of string values. For sets of Enums, use Helpers.

### JS

1. Linting, defined in config ```.eslintrc.js```
2. Google JS code style. If you are using IDE from JetBrains, like phpstorm or webstorm, 
   you can choose it in settings by clicking "set styleguide from..."
3. Abstraction over composition. If there is a component for special purpose, which uses other components, 
   consider to use ```<slot/>``` or configure the behaviour with props instead of creating of the new component. 


## Contributing

All processes should correspond to Gitflow standard.

All commits related to tickets have to include [#ticket_number] at the beginning of commit message, in order
to be automatically fetched by Github, all commits will be displayed in corresponding ticket.

```[#255] added signup survey```

## Security Vulnerabilities

If you discover a security vulnerability within project, please contact the responsible person.
