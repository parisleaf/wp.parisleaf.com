[![Build Status](https://travis-ci.org/parisleaf/wp.parisleaf.com.svg?branch=master)](https://travis-ci.org/parisleaf/wp.parisleaf.com)

A WordPress installation that serves JSON formatted data to the parisleaf.com frontend. Data is exposed via a REST API using [WP API v1](http://wp-api.org/).

**Table of Contents**

- [Git Conventions](#)
		- [Branches](#)
- [Tooling](#)
		- [Composer](#)
- [Notable Plugins](#)
		- [JSON REST API](#)
		- [Advanced Custom Fields](#)
		- [Amazon Web Services](#)
		- [WP Offload S3](#)
		- [Parisleaf](#)
- [Setup](#)
- [Configuration](#)
- [Development](#)
- [Deployment](#)
		- [Staging](#)
		- [Production](#)
- [FAQ](#)
		- [Why is the wp-content/themes/parisleaf directory empty?](#)
		- [How do I update the WordPress core?](#)
		- [How do I update the WordPress plugins?](#)
		- [I'm experiencing problems accessing WP API routes after a new deploy.](#)
		- [I pushed a new deploy and now parts of the homepage are missing.](#)

## Git Conventions

**1 Topic = 1 Commit.** Each commit should be attributed to one change.

**Never commit half-done work.** Commits are made to wrap up something completed, no matter how small the change.

#### Branches
There are two long-term branches - **master** and **develop** - that should never be removed. New branches should be merged into **develop** when complete. Once tested and confirmed to be stable, the **develop** branch should be merged into **master** with an updated [semantic versioning](http://semver.org/) tag.

Use NPM to bump the version and automatically stage a commit with the new version tag.
```shell
npm version [major|minor|patch]
```

**Master** contains *production-ready* code only, and is accessed at [wp.parisleaf.com/wp-admin](http://wp.parisleaf.com/wp-admin).

**Develop** contains *potentially unstable* code, and is accessed at [staging-wp.parisleaf.com/wp-admin](http://staging-wp.parisleaf.com/wp-admin).

These two versions of the backend are hosted on the same Droplet in Digital Ocean, and deployed via [dokku-alt](https://github.com/dokku-alt/dokku-alt).

## Tooling

#### Composer

Manages PHP dependencies such as WordPress plugins and [phpdotenv](https://github.com/vlucas/phpdotenv) (loads environment variables).

[Click here for docs.](https://getcomposer.org/doc/)

## Notable Plugins

#### JSON REST API

WP API v1 serves data to the frontend of the website.

**Note: You will need to use pretty permalinks (Admin > Settings > Permalinks) for this to work properly.**

[Click here for docs.](http://wp-api.org/index-deprecated.html)


#### Advanced Custom Fields

Adds custom field support.

[Click here for docs.](http://www.advancedcustomfields.com/resources/)

#### Amazon Web Services

Houses the Amazon Web Services (AWS) PHP libraries and manages access keys. Required by other AWS plugins.

#### WP Offload S3

Copies files to Amazon S3 as they are uploaded to the Media Library. Optionally configure Amazon CloudFront for faster delivery.

#### Parisleaf

Includes custom-built plugins for custom post types, shortcodes, and taxonomies.

## Setup

1. Open up terminal and switch into your local projects directory.
  ```shell
  cd ~/Documents/my-projects-directory
  ```
2. Clone the parisleaf/wp.parisleaf.com repository.
  ```shell
  git clone git@github.com:parisleaf/wp.parisleaf.com.git
  ```
3. Install the project dependencies.
  ```shell
  composer install
  ```

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

## Development

This is still a WordPress installation at its core, and can be edited as such. However, some native WordPress features and functions are not available due the fact that the frontend of the site can only retrieve information provided by the WP API plugin. For instance, WordPress live preview, shortcodes, template files, template functions, and third-party plugin functions may not work as you'd expect in a standard WordPress site.

Consult the [WP API documentation](http://wp-api.org/index-deprecated.html) for more information on the built-in post data that can be accessed via the API. Any additional data will need to be hooked into the API using a custom PHP function. See the [WP API Yoast plugin](https://github.com/jmfurlott/wp-api-yoast/blob/master/plugin.php) for an example of how to do this.

## Deployment

In staging and production, this app was set up to deploy via dokku-alt. `git push`ing to dokku-alt will automatically build a new container based on whatever git commit you just pushed. The new container will link to a MariaDB container that holds the WordPress database specific to each environment.

Refer to [dokku-alt's documentation](https://github.com/dokku-alt/dokku-alt) for more information.

#### Staging

In staging, the `develop` branch is deployed directly to dokku-alt:
```shell
git remote add dokku-staging dokku@parisleaf.com:staging-wp
git push dokku-staging develop:master
```

#### Production

In production, the `master` branch is deployed to [Travis-CI](https://travis-ci.org/), and then Travis deploys to dokku-alt if all tests pass:
```shell
git push
```

Check [Travis-CI](https://travis-ci.org/) for the live deployment status after pushing.

## FAQ

#### Why is the wp-content/themes/parisleaf directory empty?

This repository only serves as a data source for the frontend of the website. The theme is controlled entirely by the Node.js server setup on the [parisleaf.com repository](https://github.com/parisleaf/parisleaf.com).

#### How do I update the WordPress core?

The WordPress core is treated as a dependency, and the permitted versions are defined in composer.json. Run `composer update` to automatically update the core according to those version definitions. See the [composer documentation](https://getcomposer.org/doc/01-basic-usage.md) and [this article](https://roots.io/using-composer-with-wordpress/) for more information.

#### How do I update the WordPress plugins?

Like the WordPress core, WordPress plugins are treated as dependencies, and are managed via composer. Run `composer update` to automatically update all plugins. See [composer documentation](https://getcomposer.org/doc/01-basic-usage.md) for more information.

#### I'm experiencing problems accessing WP API routes after a new deploy.

Try clearing the permalink cache in WordPress. Simply going to the Settings > Permalinks page should do it.

Another possible cause is having incorrect values set in WordPress > Setting > General. The WordPress Address (URL) and Site Address (URL) should be identical, and specific to each deployment environment (production vs staging).

#### I pushed a new deploy and now parts of the homepage are missing.

See previous question.
