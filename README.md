# Services

## Commands & Events

This package includes a system for creating and running arbitrary RPCs from SSO to services using the concepts of Commands
and Events. SSO sends Commands and the services respond with Events. All available commands and events are stored in 
`src/Commands` and `src/Events`, respectively.

Modeling the write interaction between SSO and the services decouples the SSO data model from the service data model so
 the service can decide the best way to create or modify the resource while still using SSO as the single source of truth.
 In this way, business logic is used to drive what happens instead of trying to create specific API endpoints for calls 
 or created complex conditionals in REST endpoints.
 
### Creating Commands

Commands extend the `LHP\Services\Contracts\ServiceCommand` abstract class. The command needs to define a method `expects()` that
returns the class name of the expected event to receive when the command is successful, a method `payload` that returns the payload 
of the command, and optionally, though you probably shouldn't overwrite it, a `toArray()` method.

The command constructor receives any arguments you wish to pass into it. Try to pass as little data into the command as possible, usually
the SSO email or user ID is enough, as the service should be responsible for getting the data it needs from SSO. The less SSO needs to know
about the internal workings of the service the easier commands are to test, write, and change when needed.

Commands should be created in the namespace of their service in `LHP\Services\Commands`. Even if there are two commands 
that are named the same, put them into their service's namespace. For instance, all services could have a version of a `CreateAccount` 
command. By namespacing the commands, it is easy to track what type of account is being created and it is easy to update commands
if one needs to change for some reason.

> Commands should always be named using the imperative mood - you are telling the service to do something
>
>Good command names:
> - CreateAccount
> - UpdateUser
> - AddLoanOfficer
>
>Bad command names:
>
>- TryToEnableAccount
>- UpdatingUserName
>- AddedLoanOfficer

### Creating Events

Events extend the `LHP\Services\Contracts\ServiceEvent` interface. The event needs to define a `toArray()` method that returns
the payload, or result, of the event. 

The event constructor receives any arguments you wish to pass it. It should receive the minimum amount of information to
communicate the state change of the event.

Events should be created in the namespace of their service in `LHP\Services\Events`. As with commands, it is preferable to
duplicate similar event names in different namespaces as it makes it easier to trace what has happened and reduces fat events.

> Events should always be named in the past tense - they describe what has happened.
> 
>Good event names:
> - AccountCreated
> - UserUpdated
> - LoanOfficerAdded
>
>Bad event names:
> - AccountCreationSuccess
> - UpdateUser

### Creating Command Handlers

Command handlers are created in the service, preferably in the `App\CommandHandler` namespace. The naming convention is
`${CommandName}Handler`. The `CreateUser` command would be handled by the `CreateUserHandler` class. Each handler should extend
the `LHP\Services\Contracts\ExecutesCommand` abstract class and define the event it emits as a static property and a method
`executeCommand` that receives the payload of the command.

### Sending Commands from SSO

The `LHP\Services\Contracts\SendsCommands` interface needs to be implemented on whichever `ServiceApi` child class needs to send commands.
Eventually the functionality will move to be included in this package and the interface will be depreciated. 
There is an example on the `App\Services\Loanzify` class.

### Receiving Commands on the Service

Each service needs to implement an endpoint to receive commands, preferably named `commands`. For instance:

`http://lhp-smartapp.test/api/v1/sso/commands`

It will receive a `POST` request and return a `201` status code as well as the event payload as a success response.

The controller will pass the command to the command handler, then return the success or error response.

### Executing Commands on the Service

The class `LHP\Services\Commands\ServiceCommandHandler` is provided to use as a handler.

The `LHP\Services\Contracts\ServiceCommandHandler` contract can be implemented to create a custom handler, but this should not be necessary.

The `ServiceCommandHandler` should receive an array whose keys are `ServiceCommmand` classes and whose values are the
class name of the command handler that will execute the command.



