# zf-sms
Zend Framework 2+ library to send sms. Supported providers are currently:
- 46elks

# Setup
Copy the `interactivesolutions.sms.global.php.dist` file into your autoload and specify your `apiUsername`, `apiPassword`
in 46elks dashboard. `number` specifies which sender should the sms should be sent from, this can be a phone number
(created through 46elks) or a string between 3-11 characters.

## Delivery reports
If you want to receive delivery reports, specify the `callbackUrl` in the `SmsOptions`. This lib provides you with a finished
`DeliveryReportCollectionController` or you can write your own. Using the existing controller allows you to update
the `DeliveryReportEntity` created by this lib without doing anything.

# Usage
Just import the `SmsService` and call it with a valid `SmsMessage` and you're all done!
