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

Suites are combining available test cases is a feature.

## Supported Formats

I am using the [configuration converter component](https://github.com/stevleibelt/php_net_bazzline_component_converter "configuration converter component") to create test cases from different formats. This leads to the fact, that the format of your test case should be irrelevant. Right now, three formats are supported format factories:
    * JSON
    * Php Array
    * YAML

The XML support is currently lacked implemented since xml needs a root tag/dom object. I have to adapt the configuration converter component for that.

# Historical Notes

This component is a part of the initial test case framework.
