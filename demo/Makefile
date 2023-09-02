.PHONY: test infection

test:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html=tests/coverage

infection:
	./vendor/bin/infection

coverage-report:
	firefox tests/coverage/index.html

infection-report:
	firefox tests/infection.html
