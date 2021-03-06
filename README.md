# JSON to TeX maker
[![Build Status](https://travis-ci.org/mikron-ia/json2tex.svg?branch=master)](https://travis-ci.org/mikron-ia/json2tex)
[![Code Climate](https://codeclimate.com/github/mikron-ia/json2tex/badges/gpa.svg)](https://codeclimate.com/github/mikron-ia/json2tex)
[![Test Coverage](https://codeclimate.com/github/mikron-ia/json2tex/badges/coverage.svg)](https://codeclimate.com/github/mikron-ia/json2tex/coverage)

**Please note:** this project was something else before, a JSON to DOC converter. I realised this makes very little sense, thus altered its purpose before more could be written. It is still a dedicated project for dedicated purpose, unlikely to be developed into something more universal.

## Background
Some resources - in this case, game data - are better stored in simple format of JSON or XML and subsequently processed into more complex formats, like DB records or DOC file containing a game manual. This project is intended to present the case with building a document from JSON. 

Desired functionalities:

- Ability to write down a TeX-formatted text with some respect to hierarchy - *done*
- Ability to apply appropriate styles - *not done*
- Ability to create and insert graphs based on JSON-provided hierarchy - *done but can be improved*

## Installation guide
1. Clone the repo to desired directory - this does not have to be under any web server
1. Run `composer install --no-dev`

## Using the tool
The entry point is the `console/convert.php` file. Run `php console/convert --help` for details on available commands and their parameters.

**Caution:** the system has no safeties: if you type a name of an existing file as target, it will be overwritten. It also has minimal validation of provided JSON and will crash if given garbage.

## Architecture
Originally based on [RPG Silex boilerplate](/mikron-ia/rpg-boilerplate-silex). Intended for command-line use.
