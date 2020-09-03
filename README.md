# hexo-stripepay-deployer-heroku

(modified Fork of hexo-deployer-heroku Upstream)

[![Build Status](https://travis-ci.org/hexojs/hexo-deployer-heroku.svg?branch=master)](https://travis-ci.org/hexojs/hexo-deployer-heroku)
[![NPM version](https://badge.fury.io/js/hexo-deployer-heroku.svg)](https://www.npmjs.com/package/hexo-deployer-heroku)
[![Coverage Status](https://coveralls.io/repos/hexojs/hexo-deployer-heroku/badge.svg)](https://coveralls.io/r/hexojs/hexo-deployer-heroku)
[![Build status](https://ci.appveyor.com/api/projects/status/github/hexojs/hexo-deployer-heroku?branch=master&svg=true)](https://ci.appveyor.com/project/tommy351/hexo-deployer-heroku/branch/master)

Heroku deployer plugin for [Hexo].

## Installation

``` bash
$ npm install hexo-stripepay-deployer-heroku --save
```

## Options

You can configure this plugin in `_config.yml`.

``` yaml
# You can use this:
deploy:
  type: heroku
  repo: <repository url>
  message: [message]
```

- **repo**: Repository URL
- **message**: Commit message. The default commit message is `Site updated: {{ now('YYYY-MM-DD HH:mm:ss') }}`.

## Reset

Remove `.deploy_heroku` folder.

``` bash
$ rm -rf .deploy_heroku
```

## Stripe payment integration

pay.php is added in .deploy_heroku target for credit card processing in the heroku nginx PHP container in which hexo-generated static html/css/js assets reside. Also, a simple custom nginx.conf with heroku Procfile mod is added so as to redirect all site traffic to SSL/HTTPS. This is configured to work with Heroku ACM (Automatic Certificate Management). Simply substitute heroku-stripepay-deployer-heroku for the original hexo-deployer-heroku Hexo Plugin, and point a Stripe Checkout form action in your Hexo content to /pay.php/ so as to enable your hexo -powered site with eCommerce payment processing via Stripe!

## License

MIT

[Hexo]: http://hexo.io/
