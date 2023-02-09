<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:3.13.2|configurator
 * you can change this configuration by importing this file.
 */
$config = new PhpCsFixer\Config();
return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        // Converts backtick operators to `shell_exec` calls.
        'backtick_to_shell_exec' => true,
        // Control structure continuation keyword must be on the configured line.
        'control_structure_continuation_position' => true,
        // Curly braces must be placed as configured.
        'curly_braces_position' => true,
        // The first argument of `DateTime::createFromFormat` method must start with `!`.
        'date_time_create_from_format_call' => true,
        // Class `DateTimeImmutable` should be used instead of `DateTime`.
        'date_time_immutable' => true,
        // There must not be spaces around `declare` statement parentheses.
        'declare_parentheses' => true,
        // All `public` methods of `abstract` classes should be `final`.
        'final_public_method_for_abstract_class' => true,
        // Imports or fully qualifies global classes/functions/constants.
        'global_namespace_import' => true,
        // Ensure there is no code on the same line as the PHP open tag.
        'linebreak_after_opening_tag' => true,
        // List (`array` destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.
        'list_syntax' => true,
        // Replace non multibyte-safe functions with corresponding mb function.
        'mb_str_functions' => true,
        // In method arguments and method call, there MUST NOT be a space before each comma and there MUST be one space after each comma. Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.
        'method_argument_space' => true,
        // There must not be more than one statement per line.
        'no_multiple_statements_per_line' => true,
        // Convert PHP4-style constructors to `__construct`.
        'no_php4_constructor' => true,
        // Unused `use` statements must be removed.
        'no_unused_imports' => true,
        // Adds or removes `?` before type declarations for parameters with a default `null` value.
        'nullable_type_declaration_for_default_null_value' => true,
        // Changes doc blocks from single to multi line, or reversed. Works for class constants, properties and methods only.
        'phpdoc_line_span' => true,
        // Callables must be called without using `call_user_func*` when possible.
        'regular_callable_call' => true,
        // Inside a `final` class or anonymous class `self` should be preferred to `static`.
        'self_static_accessor' => true,
        // Simplify `if` control structures that return the boolean result of their condition.
        'simplified_if_return' => true,
        // Each statement must be indented.
        'statement_indentation' => true,
        // Lambdas not (indirect) referencing `$this` must be declared `static`.
        'static_lambda' => true,
        // Multi-line arrays, arguments list, parameters list and `match` expressions must have a trailing comma.
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arrays',
                'arguments',
                'parameters',
                'match',
            ],
        ],
        // Anonymous functions with one-liner return statement must use arrow functions.
        'use_arrow_functions' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->in(__DIR__.'/src')
    )
;
