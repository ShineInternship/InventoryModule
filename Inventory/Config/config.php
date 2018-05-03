<?php
     return [
           'name' => 'inventory',
           'icon' => 'fa-archive',
           'roles' => '["Doctor Admin","Admin","Doctor","Nurse","Midwife"]',
           'version' => '1.0',
           'title' => 'Shine Inventory Module',
           'folder' => 'Inventory',
           'table' => 'inventory',
           'sub-table' => ['inventory_reports',
                           'inventory_shipping',
                           'inventory_in_others',
                           'inventory_disposal',
                           'inventory_referral',
                           'inventory_out_others'],
           'description' => 'Test inventory module.',
           'module_user' => 'Inventory',
           'developer' => 'Ateneo ShineLabs',
           'copy' => '2018',
           'url' => 'www.shine.ph'
];
