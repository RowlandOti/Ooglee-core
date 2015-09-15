<?php

BreadCrumbs::register('membership', function($breadcrumbs) 
{
    $breadcrumbs->push('Membership', route('membership'));
});

BreadCrumbs::register('membership-standing', function($breadcrumbs) 
{
    $breadcrumbs->parent('membership');
    $breadcrumbs->push('IQSK Members In Good Standing', route('membership-standing'));
});

BreadCrumbs::register('list-of-arbitrators', function($breadcrumbs) 
{
    $breadcrumbs->parent('membership');
    $breadcrumbs->push('List of Arbitrators', route('list-of-arbitrators'));
});

BreadCrumbs::register('membership-fee', function($breadcrumbs) 
{
    $breadcrumbs->parent('membership');
    $breadcrumbs->push('Membership Fee', route('membership-fee'));
});

BreadCrumbs::register('listed-qs-firms', function($breadcrumbs) 
{
    $breadcrumbs->parent('membership');
    $breadcrumbs->push('Listed QS Firms', route('listed-qs-firms'));
});


