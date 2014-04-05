Emails/Strings Validator
========================

Goal
----

Analyze list of emails (can be any string) and determine if it's good or bad string regarding various checkers/rules


Configurations
--------------
1. In run.php define which checkers are necessary for testing

   by default: 'valid','domain','words','characters','patterns';
  (adding 'existingEmail' checker is optional but will slow processing significantly)

2. in test file - define your emails.

   optional - define other path in Checker instantiate

3. output will be printed out and in result file


How to use ?
------------

php run.php
