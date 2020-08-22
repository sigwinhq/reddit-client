ifndef OPENAPI_DOCKER_COMMAND
OPENAPI_DOCKER_IMAGE=dkarlovi/openapi-generator-php:latest
OPENAPI_DOCKER_COMMAND=docker run --init --interactive --rm --tty --user "$(shell id -u):$(shell id -g)" --volume "$(shell pwd):/project" --volume "$(shell pwd)/../openapi-specs:/specs" --workdir /project ${OPENAPI_DOCKER_IMAGE}
endif

build: clean
	sh -c "${OPENAPI_DOCKER_COMMAND} /specs/reddit/v1/index.yaml . .openapi-generator/config.json"

clean:
	rm -rf .openapi-generator/FILES .openapi-generator/VERSION docs/ src/ test/ .gitignore .openapi-generator-ignore .php_cs .travis.yml composer.json git_push.sh phpunit.xml.dist README.md
