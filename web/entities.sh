#!/bin/bash
php ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:convert-mapping --namespace="Admin\\Model\\" --force  --from-database annotation ./module/Admin/src/

php ./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/Admin/src/ --generate-annotations=true

rm -r  module/Admin/src/Admin/Model/*.php~
