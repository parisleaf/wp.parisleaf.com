# wp.parisleaf.com

An admin-only WordPress installation. Data is exposed via a REST API using WP-API.

## Set-up

Run `composer install` to install dependencies. Refer to next section for configuration.

## Configuration

Rather than editing `wp-config.php`, use [environment variables](http://12factor.net/config). Any variables set in `.env` will be loaded automatically. `.env.example` is provided as an example.

Required env vars:

- `DB_USER`
- `DB_PASSWORD`
- `DB_HOST`
- `DB_NAME`

(You can also provide `DATABASE_URL` as a url in the form `protocol://username@password:host/path` and it will be expanded to the variables above. This is to support database linking with dokku-alt.)

Optional env vars:

- `WP_TABLE_PREFIX`

## WP-API

WP-API is activated automatically, but in order for it to work, switch to pretty permalinks (Admin > Settings > Permalinks).

## Deploy via dokku-alt

In staging and production, this app is deployed via dokku-alt and linked to a MariaDB container. Refer to dokku-alt's [documentation](https://github.com/dokku-alt/dokku-alt) for more information.

### Refresh permalinks after deploy

If you're experiencing problems accessing WP-API routes after a new deploy, try clearing the permalink cache.
