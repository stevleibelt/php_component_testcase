# Testcase Component

The test case component is mention to generalize php objects that should represent common test cases.

Furthermore, this component provides interfaces you can use to create your own test cases.

## What Is A Test Case

A test case is a combination of a question and a type of an answer.

## Types Of Answers

Following types of test cases are supported:
    * Single Answer Test Case
    * Multiple Answer Test Case
    * Free Text Answer Test Case

## What About Suites

Suites to combine available test cases is a feature.

## Format Of A Test Case

The goal is to create a general format of a test case. This leads to the fact, that the format of your test case should be irrelevant. Right now, four formats are supported format factories:
    * JSON
    * XML
    * Php Array
    * YAML

# Historical Notes

This component is a part of the initial test case framework.