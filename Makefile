ifndef BUILD_ENV
BUILD_ENV=7.4
endif

ifndef OPENAPI_DOCKER_COMMAND
OPENAPI_DOCKER_IMAGE=dkarlovi/openapi-generator-php:latest
OPENAPI_DOCKER_COMMAND=docker run --init --interactive --rm --tty --env "COMPOSER_CACHE_DIR=/composer/cache" --user "$(shell id -u):$(shell id -g)" --volume "$(shell pwd):/project" --volume "$(shell pwd)/../openapi-specs:/specs" --volume "${HOME}/.composer:/composer" --workdir /project ${OPENAPI_DOCKER_IMAGE}
endif

ifndef PHPQA_DOCKER_COMMAND
PHPQA_DOCKER_IMAGE=jakzal/phpqa:1.40-php${BUILD_ENV}-alpine
PHPQA_DOCKER_COMMAND=docker run --init --interactive --rm --env "COMPOSER_CACHE_DIR=/composer/cache" --user "$(shell id -u):$(shell id -g)" --volume "$(shell pwd)/var/tmp/phpqa:/tmp" --volume "$(shell pwd):/project" --volume "${HOME}/.composer:/composer" --workdir /project ${PHPQA_DOCKER_IMAGE}
endif

rebuild: build
check: composer-validate cs-check analyze
analyze: phpstan psalm
test: phpunit

build: clean ensure
	sh -c "${OPENAPI_DOCKER_COMMAND} /specs/reddit/v1/index.yaml . .openapi-generator/config.json"

composer-validate: ensure composer-normalize-check
	sh -c "${PHPQA_DOCKER_COMMAND} composer validate"
composer-install: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} composer upgrade"
composer-normalize-check: ensure
	sh -c "${PHPQA_DOCKER_COMMAND} composer normalize --dry-run"

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

ensure:
	mkdir -p ${HOME}/.composer var/tmp/docqa var/tmp/phpqa
clean:
	rm -rf .openapi-generator/FILES .openapi-generator/VERSION docs/ src/ test/ .editorconfig .gitattributes .gitignore .openapi-generator-ignore .php_cs.dist .travis.yml composer.json git_push.sh phpstan.neon.dist phpunit.xml.dist psalm.xml.dist Makefile README.md
