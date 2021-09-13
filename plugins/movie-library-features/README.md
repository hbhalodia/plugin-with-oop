# Movie_Library Features

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)


Add site URL here.

Plugin for Movie_Library. All backend functionality will take place in this plugin. Like, registering post type, taxonomy, widget and meta box.

## Notes

- Rename plugin's folder to movie-library-features when you use this skeleton. For example, rtcamp-features.
- Complete [Assets](https://github.com/rtCamp/features-plugin-skeleton#assets) steps to require npm packages.
- Run command `npm run init` from `assets` folder to run the renaming script. This will run an interactive process to set up your plugin.

## Plugin Structure

```markdown
.
├── assets
│   ├── build
│   │   ├── js
│   │   │   ├── blocks.js
│   ├── js
│   │   ├── blocks
│   │   │   ├── example-block
│   │   │   |		├── index.js
│   │   ├── blocks.js
│   ├── .babelrc
│   ├── .eslintignore
│   ├── .eslintrc.json
│   ├── package.json
│   ├── package-lock.json
│   ├── webpack.config.js
├── inc
│   ├── classes
│   │   ├── class-assets.php
│   │   ├── class-cache.php
│   │   ├── class-meta-boxes.php
│   │   ├── class-plugin-configs.php
│   │   ├── class-plugin.php
│   │   ├── class-post-types.php
│   │   ├── class-rewrite.php
│   │   ├── class-seo.php
│   │   ├── class-taxonomies.php
│   │   ├── class-widgets.php
│   │   ├── class-blocks.php
│   │   ├── meta-boxes
│   │   │   ├── class-base.php
│   │   │   └── class-metabox-example.php
│   │   ├── plugin-configs
│   │   │   └── class-fieldmanager.php
│   │   ├── post-types
│   │   │   ├── class-base.php
│   │   │   └── class-post-type-example.php
│   │   ├── taxonomies
│   │   │   ├── class-base.php
│   │   │   └── class-taxonomy-example.php
│   │   └── widgets
│   │   └── blocks
│   ├── helpers
│   │   ├── autoloader.php
│   │   └── custom-functions.php
│   └── traits
│       └── trait-singleton.php
└── movie-library-features.php
```

## Post types

| Label                                     | Slug               | Public | Taxonomies                       |
|-------------------------------------------|--------------------|--------|----------------------------------|
| Post (Default)                            | post               | Yes    | Category, Tag                    |
| Page (Default)                            | page               | Yes    | N/A                              |
| Media (Default)                           | attachment         | Yes    | N/A                              |

## Taxonomies

| Label              | Slug               | Public |
|--------------------|--------------------|--------|
| Category (Default) | category           | No     |
| Tag (Default)      | post_tag           | Yes    |

## Meta Boxes

Registered meta boxes.

```markdown
- Add custom meta boxes details here.
```

## Gutenberg Blocks.
| Label                                     | Type               |
|-------------------------------------------|--------------------|
| Example Block                             | Static             |
| Example Dynamic Block                     | Dynamic            |


## Assets

Assets folder contains webpack setup and can be used for creating blocks or adding any other custom scripts like javascript for admin.

- Run `npm i` from `assets` folder to install required npm packages.
- Use `npm run dev` during development for assets.
- Use `npm run prod` for production.
- Use `npm run eslint:fix js/fileName.js` for fixing and linting eslint errors and warning.
### Reporting a bug 🐞

Before creating a new issue, do browse through the [existing issues](https://github.com/rtCamp/features-plugin-skeleton/issues) for resolution or upcoming fixes. 

If you still need to [log an issue](https://github.com/rtCamp/features-plugin-skeleton/issues/new), making sure to include as much detail as you can, including clear steps to reproduce your issue if possible.

### Creating a pull request

Want to contribute a new feature? Start a conversation by logging an [issue](https://github.com/rtCamp/features-plugin-skeleton/issues).

Once you're ready to send a pull request, please run through the following checklist: 

1. Browse through the [existing issues](https://github.com/rtCamp/features-plugin-skeleton/issues) for anything related to what you want to work on. If you don't find any related issues, open a new one.

1. Fork this repository.

1. Create a branch from `develop` for each issue you'd like to address and commit your changes.

1. Push the code changes from your local clone to your fork.

1. Open a pull request and that's it! We'll with feedback as soon as possible (Isn't collaboration a great thing? 😌)

1. Once your pull request has passed final code review and tests, it will be merged into `develop` and be in the pipeline for the next release. Props to you! 🎉
