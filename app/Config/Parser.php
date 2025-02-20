<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Parser extends BaseConfig
{
    public array $plugins = [
        'academic_status' => 'academic_status_cell',
    ];
}
