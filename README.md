# Standalone Totem PHP Client
## Files structures
- src/Entity: contains the DTO (https://en.wikipedia.org/wiki/Data_transfer_object) for the communication with Totem 
    (ex: Entity/Person represents the POST request to create a user into Totem)
- src/Exception: contains the ApiException class and a wrapper to wrap some specific Error (401, 409, etc) 
- src/Handler: used for serialisation of the DTO
- src/HttpClient: abstraction layer for Guzzle Http Client (+ middleware)
- src/Resources: configuration file for the serializer
- src/Security: security layer for authentication (used by HttpClient)
- src/Serializer: contains serializer builder
- src/Service: contains the services that wrap the different calls with the API (Totem) with methods
    (ex: `$servicePerson->createPerson($person);` )
- Client: base class that declare the different services (person atm.)
- ClientBuilder: Builder for Clients

## Usages
For each call we want to wrap/create, we must implements a method and place it in the correct service: 
- If the call is relative to an existing service (like person), it must be placed it into this service. 
- If the call is relative to a new "domain" like "sector", a new service "sector" should be created into the namespace 
  Client\Totem\Service with a method that represents the call in it.

For all new method in service, or new services, the corresponding tests have to be written and placed in the 
/tests directory. 

## Test
To execute the tests, from Tipee root directory we have to `$ cd Client/Totem` and the execute the tests `$ vendors/bin/phpunit`