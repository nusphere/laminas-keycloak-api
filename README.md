# laminas-keycloak-api
===

is a laminas module for administrate a keycloak instance via REST Api
Key feature is the usage of https://github.com/MohammadWaleed/keycloak-admin-client which allows to access the KeyCloak REST API via guzzle.

This module tries to wrap this client to a laminas module and brings some additional features:

- full service-manager support for [`MohammadWaleed/keycloak-admin-client`](https://github.com/MohammadWaleed/keycloak-admin-client) via `$container->get(\Keycloak\Admin\KeycloakClient::class)` 
- add some laminas-cli commands
  - `keycloak:client:create` -> create a client to a given realm
  - `keycloak:realms:create` -> create a realm without configuration
  - `keycloak:realms:delete` -> delete a realm with given realm name
  - `keycloak:realms:import` -> import a realm by a given exported realm json file
- adds some Service classes for usage in your code
- etc.
