<?php

return [
    [
        'key' => 'leads',
        'name' => 'admin::app.layouts.leads',
        'route' => 'admin.leads.index',
        'sort' => 2,
        'icon-class' => 'newquotes-icon',
    ], [
        'key' => 'quotes',
        'name' => 'admin::app.layouts.quotes',
        'route' => 'admin.quotes.index',
        'sort' => 3,
        'icon-class' => 'newquotes2-icon',
    ], [
        'key' => 'mail',
        'name' => 'admin::app.layouts.mail.title',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'inbox'],
        'sort' => 4,
        'icon-class' => 'newmail-icon',
    ], [
        'key' => 'mail.compose',
        'name' => 'admin::app.layouts.mail.compose',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'compose'],
        'sort' => 1,
    ], [
        'key' => 'mail.inbox',
        'name' => 'admin::app.layouts.mail.inbox',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'inbox'],
        'sort' => 2,
    ], [
        'key' => 'mail.draft',
        'name' => 'admin::app.layouts.mail.draft',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'draft'],
        'sort' => 3,
    ], [
        'key' => 'mail.outbox',
        'name' => 'admin::app.layouts.mail.outbox',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'outbox'],
        'sort' => 4,
    ], [
        'key' => 'mail.sent',
        'name' => 'admin::app.layouts.mail.sent',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'sent'],
        'sort' => 4,
    ], [
        'key' => 'mail.trash',
        'name' => 'admin::app.layouts.mail.trash',
        'route' => 'admin.mail.index',
        'params' => ['route' => 'trash'],
        'sort' => 5,
    ]
    // , [
    //     'key'        => 'mail.setting',
    //     'name'       => 'admin::app.layouts.mail.setting',
    //     'route'      => 'admin.mail.index',
    //     'params'     => ['route' => 'setting'],
    //     'sort'       => 5,
    // ]
    , [
        'key' => 'activities',
        'name' => 'admin::app.layouts.activities',
        'route' => 'admin.activities.index',
        'sort' => 5,
        'icon-class' => 'newactivities-icon',
    ], [
        'key' => 'contacts',
        'name' => 'admin::app.layouts.contacts',
        'route' => 'admin.contacts.persons.index',
        'sort' => 6,
        'icon-class' => 'newphone-icon',
    ], [
        'key' => 'contacts.persons',
        'name' => 'admin::app.layouts.persons',
        'route' => 'admin.contacts.persons.index',
        'sort' => 1,
    ], [
        'key' => 'contacts.organizations',
        'name' => 'admin::app.layouts.organizations',
        'route' => 'admin.contacts.organizations.index',
        'sort' => 2,
    ], [
        'key' => 'products',
        'name' => 'admin::app.layouts.products',
        'route' => 'admin.products.index',
        'sort' => 7,
        'icon-class' => 'products-icon',
    ], [
        'key' => 'settings',
        'name' => 'admin::app.layouts.settings',
        'route' => 'admin.settings.index',
        'sort' => 8,
        'icon-class' => 'newsettings-icon',
    ], [
        'key' => 'settings.user',
        'name' => 'admin::app.layouts.user',
        'route' => 'admin.settings.groups.index',
        'info' => 'admin::app.layouts.user-info',
        'sort' => 1,
    ], [
        'key' => 'settings.user.groups',
        'name' => 'admin::app.layouts.groups',
        'info' => 'admin::app.layouts.groups-info',
        'route' => 'admin.settings.groups.index',
        'sort' => 1,
        'icon-class' => 'group-icon',
    ], [
        'key' => 'settings.user.roles',
        'name' => 'admin::app.layouts.roles',
        'info' => 'admin::app.layouts.roles-info',
        'route' => 'admin.settings.roles.index',
        'sort' => 2,
        'icon-class' => 'role-icon',
    ], [
        'key' => 'settings.user.users',
        'name' => 'admin::app.layouts.users',
        'info' => 'admin::app.layouts.users-info',
        'route' => 'admin.settings.users.index',
        'sort' => 3,
        'icon-class' => 'user-icon',
    ], [
        'key' => 'settings.lead',
        'name' => 'admin::app.layouts.lead',
        'info' => 'admin::app.layouts.lead-info',
        'route' => 'admin.settings.pipelines.index',
        'sort' => 2,
    ], [
        'key' => 'settings.lead.pipelines',
        'name' => 'admin::app.layouts.pipelines',
        'info' => 'admin::app.layouts.pipelines-info',
        'route' => 'admin.settings.pipelines.index',
        'sort' => 1,
        'icon-class' => 'pipeline-icon',
    ], [
        'key' => 'settings.lead.sources',
        'name' => 'admin::app.layouts.sources',
        'info' => 'admin::app.layouts.sources-info',
        'route' => 'admin.settings.sources.index',
        'sort' => 2,
        'icon-class' => 'source-icon',
    ], [
        'key' => 'settings.lead.types',
        'name' => 'admin::app.layouts.types',
        'info' => 'admin::app.layouts.types-info',
        'route' => 'admin.settings.types.index',
        'sort' => 3,
        'icon-class' => 'type-icon',
    ], [
        'key' => 'settings.automation',
        'name' => 'admin::app.layouts.automation',
        'info' => 'admin::app.layouts.automation-info',
        'route' => 'admin.settings.attributes.index',
        'sort' => 3,
    ], [
        'key' => 'settings.automation.attributes',
        'name' => 'admin::app.layouts.attributes',
        'info' => 'admin::app.layouts.attributes-info',
        'route' => 'admin.settings.attributes.index',
        'sort' => 1,
        'icon-class' => 'attribute-icon',
    ], [
        'key' => 'settings.automation.email_templates',
        'name' => 'admin::app.layouts.email-templates',
        'info' => 'admin::app.layouts.email-templates-info',
        'route' => 'admin.settings.email_templates.index',
        'sort' => 2,
        'icon-class' => 'email-template-icon',
    ], [
        'key' => 'settings.automation.workflows',
        'name' => 'admin::app.layouts.workflows',
        'info' => 'admin::app.layouts.workflows-info',
        'route' => 'admin.settings.workflows.index',
        'sort' => 3,
        'icon-class' => 'workflow-icon',
    ], [
        'key' => 'settings.other_settings',
        'name' => 'admin::app.layouts.other-settings',
        'info' => 'admin::app.layouts.other-settings-info',
        'route' => 'admin.settings.tags.index',
        'sort' => 4,
        'icon-class' => 'newSettings-icon',
    ], [
        'key' => 'settings.other_settings.tags',
        'name' => 'admin::app.layouts.tags',
        'info' => 'admin::app.layouts.tags-info',
        'route' => 'admin.settings.tags.index',
        'sort' => 1,
        'icon-class' => 'tag-icon',
    ], [
        'key' => 'configuration',
        'name' => 'admin::app.layouts.configuration',
        'route' => 'admin.configuration.index',
        'sort' => 9,
        'icon-class' => 'newtools-icon',
    ],


    [
        'key' => 'Tickets',
        'name' => 'Tickets',
        'route' => 'admin.tickets.index',
        'sort' => 11,
        'icon-class' => 'newtickets-icon',
    ],

    [
        'key' => 'Invoices',
        'name' => 'Invoices',
        'route' => 'admin.invoices',
        'sort' => 12,
        'icon-class' => 'newinvoices-icon ',
    ]


];
