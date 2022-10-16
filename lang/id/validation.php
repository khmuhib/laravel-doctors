<?php

/**
 * Translate by Afrizal <https://saweria.co/afrizalmy>
 * Jika ada yang typo, silahkan create issue and pull request
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field is not a valid URL.',
    'after' => 'The :attribute field must be a date after :date.',
    'after_or_equal' => 'The :attribute field must be a date after or equal to :date.',
    'alpha' => 'The :attribute field can only contain letters.',
    'alpha_dash' => 'The :attribute field can only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field can only contain letters and numbers.',
    'array' => 'The :attribute field must be an array.',
    'before' => 'The :attribute field must be before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute field must be between :min and :max.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute field must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute does not match.',
    'current_password' => 'Invalid password.',
    'date' => 'The :attribute field is not a valid date.',
    'date_equals' => 'The :attribute field must be the same date as :date.',
    'date_format' => 'The :attribute field does not match the :format.',
    'declined' => 'The :attribute field must be rejected.',
    'declined_if' => 'The :attribute field must be rejected when :other is :value.',
    'different' => 'The :attribute and :other fields must be different.',
    'digits' => 'The :attribute must be :digits digit.',
    'digits_between' => 'The :attribute field must be between :min and :max digits.',
    'dimensions' => 'The :attribute field has an invalid image dimension.',
    'distinct' => 'The :attribute field has duplicate values.',
    'email' => 'The :attribute field must be a valid email address.',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'The selected :attribute field is invalid.',
    'exists' => 'The selected :attribute field is invalid.',
    'file' => 'The :attribute field must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value character.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute field must be greater than or equal to the :value character.',
        'array' => 'The :attribute field must have :value item or more.',
    ],
    'image' => 'The :attribute field must be an image.',
    'in' => 'The selected :attribute field is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value character.',
        'array' => 'The :attribute field must have less than :value item.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value character.',
        'array' => 'The :attribute field cannot have more than :value items.',
    ],
    'max' => [
        'numeric' => ':Attribute field cannot be greater than :max.',
        'file' => 'The :attribute field cannot be greater than :max kilobytes.',
        'string' => 'The :attribute cannot be greater than :max character.',
        'array' => 'The :attribute field cannot have more than :max items.',
    ],
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min character.',
        'array' => 'The :attribute field must have at least :min item.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute field is invalid.',
    'not_regex' => 'Invalid :attribute format.',
    'numeric' => 'The :attribute field must be a number.',
    'password' => 'Invalid password.',
    'present' => 'The :attribute field must exist.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Invalid :attribute format.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values ​​exists.',
    'required_with_all' => 'The :attribute field is required when :values ​​exists.',
    'required_without' => 'The :attribute field is required if :values ​​does not exist.',
    'required_without_all' => 'The :attribute field is required if no :values ​​exist.',
    'same' => 'The :attribute and :other fields must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute field must be :size character.',
        'array' => 'The :attribute field must contain :size item.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => 'The :attribute field must be a string.',
    'timezone' => 'The :attribute field must be a valid timezone.',
    'unique' => 'The :attribute field already exists.',
    'uploaded' => 'Filling :attribute failed to upload.',
    'url' => 'The :attribute field must be a valid URL.',
    'uuid' => 'The :attribute field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
