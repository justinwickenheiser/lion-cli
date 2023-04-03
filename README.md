# Lion CLI

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/justinwickenheiser/lion-cli.svg?style=flat-square)](https://packagist.org/packages/justinwickenheiser/lion-cli)

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


If you wish to clone the repo and do a local build, then you can run the following commands:

```bash
php lion app:build --build-version=0.0.0
ln -s ./builds/lion /usr/local/lib/lion-cli/bin/lion
sudo ln -s ../lib/lion-cli/bin/lion /usr/local/bin/lion
```
