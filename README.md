WordPress backend installation that serves JSON data to the parisleaf.com frontend. Data is exposed via a REST API using WP-API.

# Requirements

* Mac OSX (setup has not been tested on Windows)
* iTerm with Oh My Zsh installed (makes life easier)
* Composer

# Conventions

There are two long-term branches - **master** and **develop** - that should never be removed. New branches should only come from **develop**. Stable changes can then be merged into **master** with a new version tag.

**1 Topic = 1 Commit.** Each commit should be attributed to one change.

**Never commit half-done work.** Commits are made to wrap up something completed, no matter how small the change.

### Branches

**Master** contains production-ready code only, and corresponds to the production version of the WordPress backend at [production-wp.parisleaf.com/wp-admin](http://production-wp.parisleaf.com/wp-admin) ([wp.parisleaf.com/wp-admin](http://wp.parisleaf.com/wp-admin) also redirects here)

**Develop** contains potentially unstable code and is deployed to [staging-wp.parisleaf.com/wp-admin](http://staging-wp.parisleaf.com/wp-admin).

These two versions of the backend are hosted on the same Droplet in Digital Ocean, and deployed via [dokku-alt](https://github.com/dokku-alt/dokku-alt).

# Setup

1. Open up terminal and switch into your projects directory `cd ~/Documents/my-projects-directory`
2. Run `git clone git@github.com:parisleaf/wp.parisleaf.com.git`
3. Run `composer install` to install dependencies. Refer to next section for configuration.

# Configuration

Rather than editing `wp-config.php`, use [environment variables](http://12factor.net/config). Any variables set in `.env` will be loaded automatically. `.env.example` is provided as an example.

Required env vars:

- `DB_USER`
- `DB_PASSWORD`
- `DB_HOST`
- `DB_NAME`

(You can also provide `DATABASE_URL` as a url in the form `protocol://username@password:host/path` and it will be expanded to the variables above. This is to support database linking with dokku-alt.)

Optional env vars:

- `WP_TABLE_PREFIX`

# WP-API

WP-API is activated automatically, but in order for it to work, switch to pretty permalinks (Admin > Settings > Permalinks).

# Deployment

In staging and production, this app is deployed via dokku-alt and linked to a MariaDB container. Refer to dokku-alt's [documentation](https://github.com/dokku-alt/dokku-alt) for more information.

Pushing to dokku will automatically build the container based on the whatever git commit you pushed.

### Push to staging

1. `git remote add dokku-staging dokku@parisleaf.com:staging-wp`
2. Commit or stash your changes
3. `git checkout` the desired branch (master or develop)
4. `git push dokku-staging`

### Push to production

1. `git remote add dokku-production dokku@parisleaf.com:production-wp`
2. Commit or stash your changes
3. `git checkout master`
4. `git push dokku-production`

# Troubleshooting Tips

## Refresh permalinks after deploy

If you're experiencing problems accessing WP-API routes after a new deploy, try clearing the permalink cache.
