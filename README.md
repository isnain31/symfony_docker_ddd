
This is just a simply demo to show my co-workers how DDD, Hexagonal architecture works. Here as donner lover I expressed my love for donner by designing a few apis those can be used to order a donner. However lets not forget about DDD and Hexagonal architecture.
Here Domains, Application and Infrastructure - these layers have separte responsibility and the first two advertise ports which later infra layer adapters can utilize to finally get the donner. Here all ORM configs are xml just to make domain models/ entities 
free from frameworks annotations. Contollers are treated as Infra layer adapters (there are other ways to do that I simply like this way..hey my donner move on). All frameworks dependencies are limited to infra layer only. 

Disclaimer:
* Test cases are only dummy intetionately
* dockers are pretty much basic. Secrets are all for localhost not encrypted

How to Run:
* clone the repo
* docker-compose up
* use the postman collection to create and enjoy your donner

Future of Donner 
* Soon you will be able to order Donner with CQRS and micro-services
* Change only the infra layer and configs keep Application and Domain as it is to see if it works in laravel
* Convert Domain and Applications POPO to POJO and run it on spring boot :D 
  
