SHELL := /usr/bin/env bash -e -o pipefail

ENV?=dev

default: data

.PHONY: build # builds project with data and frontend assets
.SILENT: build
build:
	$(info Building project from scratch)
	symfony composer install
	symfony console doctrine:schema:drop --force
	symfony console doctrine:schema:update --force
	symfony console doctrine:fixtures:load --append

.PHONY: data # Rebuilds database and fills it with fixtures
.SILENT: data
data:
	$(info Rebuilding database)
	symfony console doctrine:schema:drop --force
	symfony console doctrine:schema:update --force
	symfony console doctrine:fixtures:load --append


.PHONY: add-data # Rebuilds database and fills it with fixtures
.SILENT: add-data
add-data:
	$(info Appending fixtures)
	symfony console doctrine:fixtures:load --append


.PHONY: help # Displays this list
help:
	@echo -e $$(grep '^.PHONY: .* #' Makefile | sed 's/\.PHONY: \(.*\) # \(.*\)/\\e[32m\1\\e[0m - \2\\n/')