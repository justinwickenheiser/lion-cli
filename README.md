# Lion CLI

[![Latest Stable Version](https://poser.pugx.org/justinwickenheiser/lion-cli/v)](//packagist.org/packages/justinwickenheiser/lion-cli)
[![Total Downloads](https://poser.pugx.org/justinwickenheiser/lion-cli/downloads)](//packagist.org/packages/justinwickenheiser/lion-cli)
[![Latest Unstable Version](https://poser.pugx.org/justinwickenheiser/lion-cli/v/unstable)](//packagist.org/packages/justinwickenheiser/lion-cli)
[![License](https://poser.pugx.org/justinwickenheiser/lion-cli/license)](//packagist.org/packages/justinwickenheiser/lion-cli)

Lion CLI was created to quickly spin up boiler-plate packages for gvsu-webteam development. It was built on [Laravel-Zero](https://laravel-zero.com/).

## Install

```bash
composer global require justinwickenheiser/lion-cli
```

Make sure your composer's global bin directory is in your PATH by adding the following line to your `.bash_profile`:

```bash
export PATH=$(composer global config bin-dir --absolute --quiet):$PATH
```

Check to see if the install worked. You may have to close and reopen the terminal.

```bash
lion -v
```

### Local Build

If you wish to clone the repo and do a local build, then you can run the following commands:

```bash
php lion app:build --build-version=0.0.0
ln -s ./builds/lion /usr/local/lib/lion-cli/bin/lion
sudo ln -s ../lib/lion-cli/bin/lion /usr/local/bin/lion
```
