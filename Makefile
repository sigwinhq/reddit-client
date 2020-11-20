ifndef BUILD_ENV
BUILD_ENV=7.4
endif

ifndef OPENAPI_DOCKER_COMMAND
OPENAPI_DOCKER_IMAGE=dkarlovi/openapi-generator-php:latest
OPENAPI_DOCKER_COMMAND=docker run --init --interactive --rm --tty --env "COMPOSER_CACHE_DIR=/composer/cache" --user "$(shell id -u):$(shell id -g)" --volume "$(shell pwd):/project" --volume "$(shell pwd)/../openapi-specs:/specs" --volume "${HOME}/.composer:/composer" --workdir /project ${OPENAPI_DOCKER_IMAGE}
endif

ifndef DOCQA_DOCKER_COMMAND
DOCQA_DOCKER_IMAGE=dkarlovi/docqa:latest
DOCQA_DOCKER_COMMAND=docker run --init --interactive --rm --user "$(shell id -u):$(shell id -g)"  --volume "$(shell pwd)/var/tmp/docqa:/.cache" --volume "$(shell pwd):/project" --workdir /project ${DOCQA_DOCKER_IMAGE}
endif

ifndef PHPQA_DOCKER_COMMAND
PHPQA_DOCKER_IMAGE=jakzal/phpqa:1.41-php${BUILD_ENV}-alpine
PHPQA_DOCKER_COMMAND=docker run --init --interactive --rm --env "COMPOSER_CACHE_DIR=/composer/cache" --user "$(shell id -u):$(shell id -g)" --tmpfs /tmp --volume "$(shell pwd):/project" --volume "${HOME}/.composer:/composer" --workdir /project ${PHPQA_DOCKER_IMAGE}
endif

default: help
docs: markdownlint textlint vale
run/check: composer-validate cs-check run/analyze ## Run a suite of checks (code style, static analysis)
run/analyze: phpstan psalm ## Run static analysis
run/test: phpunit ## Run a suite of tests

help: ## Prints commands help
	@grep --no-filename --extended-regexp '^ *[-a-zA-Z0-9_/]+ *:.*## ' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[45m%-15s\033[0m %s\n", $$1, $$2}'

build: ensure ## Rebuild the repo
	sh -c "${OPENAPI_DOCKER_COMMAND} /specs/reddit/v1/index.yaml"

composer-validate: ensure composer-normalize-check
	sh -c "${PHPQA_DOCKER_COMMAND} composer validate"
composer-install: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} composer upgrade"
composer-normalize-check: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} composer normalize --dry-run --no-check-lock --no-update-lock"

cs-check: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} php-cs-fixer fix --using-cache=false --dry-run --diff -vvv"

phpstan: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} phpstan analyse"

psalm: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} psalm --show-info=false --threads max"

phpunit:
	sh -c "${PHPQA_DOCKER_COMMAND} vendor/bin/phpunit --verbose"
phpunit-coverage: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} php -d pcov.enabled=1 vendor/bin/phpunit --verbose --coverage-text --log-junit=var/junit.xml --coverage-xml var/coverage-xml/"

markdownlint: ensure
	sh -c "${DOCQA_DOCKER_COMMAND} markdownlint *.md docs/"
textlint: ensure
	sh -c "${DOCQA_DOCKER_COMMAND} textlint -c docs/.textlintrc.dist *.md docs/"
vale: ensure
	sh -c "${DOCQA_DOCKER_COMMAND} vale --config docs/.vale.ini.dist README.md docs/Api/ docs/Model/"

ensure:
	mkdir -p ${HOME}/.composer var/tmp/docqa var/tmp/phpqa
