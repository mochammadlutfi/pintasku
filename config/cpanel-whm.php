<?php
return [
    'servers' => [
        // Array key not necessary unless you have multiple servers
        'hostingpangeran' => [
            /*
            |--------------------------------------------------------------------------
            | Host of your server
            |--------------------------------------------------------------------------
            |
            | Please provide this by its full URL including its protocol and its port
            |
            */
            'host' => 'https://kirana.hostingpangeran.com:2087',

            /*
            |--------------------------------------------------------------------------
            | Remote Access key
            |--------------------------------------------------------------------------
            |
            | You can find this remote access key on your CPanel/WHM server.
            | Log in to your server using root, and find `Remote Access Key`.
            | Copy and paste all of the string
            |
            */
            'auth' => 'OOU11NBKEKDMAEATNX32R1C30P06P4CY',

            /*
            |--------------------------------------------------------------------------
            | Username
            |--------------------------------------------------------------------------
            |
            | By default, it will use root as its username. If you have another username,
            | make sure it has the same privelege with the root or at least it can access
            | External API which is provided by CPanel/WHM
            |
            */
            'username' => 'pintasku',
        ],
        // More Servers can be listed here as a new array
    ]
];
