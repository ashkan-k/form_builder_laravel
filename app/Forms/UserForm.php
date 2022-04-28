<?php

namespace App\Forms;

class User extends Form
{
    public function form_builder()
    {
        return [Array
(
    [id] => Array
        (
            [type] => bigint unsigned
            [null] => 
            [default] => 
        )

    [name] => Array
        (
            [type] => varchar(255)
            [null] => 
            [default] => 
        )

    [email] => Array
        (
            [type] => varchar(255)
            [null] => 
            [default] => 
        )

    [email_verified_at] => Array
        (
            [type] => timestamp
            [null] => 1
            [default] => 
        )

    [password] => Array
        (
            [type] => varchar(255)
            [null] => 
            [default] => 
        )

    [two_factor_secret] => Array
        (
            [type] => text
            [null] => 1
            [default] => 
        )

    [two_factor_recovery_codes] => Array
        (
            [type] => text
            [null] => 1
            [default] => 
        )

    [two_factor_confirmed_at] => Array
        (
            [type] => timestamp
            [null] => 1
            [default] => 
        )

    [remember_token] => Array
        (
            [type] => varchar(100)
            [null] => 1
            [default] => 
        )

    [current_team_id] => Array
        (
            [type] => bigint unsigned
            [null] => 1
            [default] => 
        )

    [profile_photo_path] => Array
        (
            [type] => varchar(2048)
            [null] => 1
            [default] => 
        )

    [created_at] => Array
        (
            [type] => timestamp
            [null] => 1
            [default] => 
        )

    [updated_at] => Array
        (
            [type] => timestamp
            [null] => 1
            [default] => 
        )

)
];
    }
}

        