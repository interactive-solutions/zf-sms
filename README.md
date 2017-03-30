# zf-sms
Zend Framework 2+ library to send sms. Supported providers are currently:
- 46elks

# Setup
Copy the `interactivesolutions.sms.global.php.dist` file into your autoload and specify your `apiUsername`, `apiPassword`
from 46elks dashboard. `number` specifies which sender should the sms should be sent from, this can be a phone number
(created through 46elks) or a string between 3-11 characters.

## Delivery reports
If you want to receive delivery reports, specify the `callbackUrl` in the `SmsOptions`. This lib provides you with a finished
`DeliveryReportCollectionController` or you can write your own. Usage of the existing controller allows you to update
the `DeliveryReportEntity` created by this lib by simply adding a route for the controller.

# Usage
Just import the `SmsService` and call it with a valid `SmsMessage` and you're all done!

## Background task
We recommend you to run the send sms in a background task using Bernard due to possible delays with sending the text. 
This lib also provides the a background task for this purpose with the `SendSmsTask` if used in combination with 
[Interactive Solutions Zf-Bernard](https://github.com/interactive-solutions/zf-bernard). For a more detailed guide
to zf-bernard please take a look at that repository.

Code to send sms in background:
```
use InteractiveSolutions\Bernard\Producer;
...
//code to create/config bernard producer
...

$sms = new SmsMessage(
    '+46700000000',,
    'Hello World'
);

$producer->produce($sms);
```

Note: The Interactive Solutions Zf-bernard is not a dependency of this project and would require a manual install to be used.

# License
Copyright (c) 2017 Interactive Solutions Bodama AB

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
