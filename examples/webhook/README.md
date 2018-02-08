# RingCentral PHP Webhook Demo App

This is a small demo app to demonstrate webhooks

## Installation

```bash
$ git clone https://github.com/grokify/ringcentral-sdk-php-lite
$ cd ringcentral-sdk-php-lite/examples/webhook
$ cp rc-credentials-sample.json .rc-credentials.json
$ php -S localhost:8080
```

Open a web browser and go to:

* http://localhost:8080/listhooks.php
* http://localhost:8080/createhook.php
* http://localhost:8080/listhooks.php

Now send a SMS message to the extension you specified in the `.rc-credentials.json` file and then look in the error log and you will see an entry for the SMS. RingCentral will send the SMS event to the `hook.php` end point which will be logged.

## Notes

On some system the PHP development server (`php -S localhost:8080`) may be too slow to respond. For testing purposes, you may want to use a faster webserver that pre-loads PHP, e.g. Apache. On MacOS, the native Apache2 can be used.