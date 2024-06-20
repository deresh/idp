SHELL := /usr/bin/env bash -e -o pipefail

ENV?=dev

default: build

.PHONY: build # Reboots a docker environment and builds project with data and frontend assets
.SILENT: build
build:
	$(info Building project from scratch)
	symfony console doctrine:schema:drop --force
	symfony console doctrine:schema:update --force
	symfony console doctrine:fixtures:load --append

.PHONY: help # Displays this list
help:
	@echo -e $$(grep '^.PHONY: .* #' Makefile | sed 's/\.PHONY: \(.*\) # \(.*\)/\\e[32m\1\\e[0m - \2\\n/')