# Changelog

All notable changes to `laravel-jormall-sms-channel` will be documented in this file.

## v0.1.2 - 2023-05-31

Disable SSL verification because JorMall's certificates sometimes fails verification.

## v0.1.1 - 2022-07-22

### What's Changed

- Loosen composer dependancies to support Laravel 9.9 and up because this is where they introduced the `throw()` method on the `PendingRequest` class by @Yazan-Stash in https://github.com/thecodestash/laravel-jormall-sms-channel/pull/2

**Full Changelog**: https://github.com/thecodestash/laravel-jormall-sms-channel/compare/v0.1.0...v0.1.1

## v0.1.0 - 2022-07-21

- Implement the integration with JorMall's API.
- Implement a notification channel to send sms updates to a notifiable.
