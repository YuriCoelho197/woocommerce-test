# Woocommerce Tests CodeCeption

## Instale o Wordpress e plugins com o composer

```
 composer install
 edite o wp-config.php
```

## Instale o Selenium Standalone com o yarn

```
 yarn install
```

## Instale os Selenium Standalone drives

```
 yarn selenium-standalone install
```

## Inicie o Standalone

```
 yarn selenium-standalone start
```

## Instale o CodeCeption 

```
 php ./vendor/bin/codecept bootstrap
```

## Execute o build CodeCeption 

```
 php ./vendor/bin/codecept build
```

## Execute o teste de exemplo

```
 php ./vendor/bin/codecept run acceptance --debug
```