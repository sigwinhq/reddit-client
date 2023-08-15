.SILENT:
include vendor/sigwin/infra/resources/PHP/library.mk

ifndef OPENAPI_DOCKER_COMMAND
OPENAPI_DOCKER_IMAGE=dkarlovi/openapi-generator-php:latest
OPENAPI_DOCKER_COMMAND=docker run --init --interactive --rm --tty --env "COMPOSER_CACHE_DIR=/composer/cache" --user "$(shell id -u):$(shell id -g)" --volume "$(shell pwd):/project" --volume "$(shell pwd)/../openapi-specs:/specs" --volume "${HOME}/.composer:/composer" --workdir /project ${OPENAPI_DOCKER_IMAGE}
endif

build: ## Rebuild the repo
	sh -c "${OPENAPI_DOCKER_COMMAND} /specs/reddit/v1/index.yaml"

vendor/sigwin/infra/resources/PHP/library.mk:
	mv composer.json composer.json~ && rm -f composer.lock
	docker run --rm --user '$(shell id -u):$(shell id -g)' --volume '$(shell pwd):/app' --workdir /app composer:2 require sigwin/infra
	mv composer.json~ composer.json && rm -f composer.lock
