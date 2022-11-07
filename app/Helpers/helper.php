<?php

/**
 *
 * 1) setup basic quotation values
 *
 */

use App\QuoteOption;

if (!function_exists('addDefaultQuotation')) {
    function addDefaultQuotation($userId)
    {
        $detail = [
            'name' => [
                'Home Size',
                'Townhouse',
                'Condo',
                'Age Fee',
                'Pool or Spa',
                'Termite',
                'Trip Charge',
                'Re-Inspection',
            ],
            'price' => [
                '100',
                '90',
                '50',
                '10',
                '30',
                '55',
                '120',
                '150',
            ],
            'type' => [
                '1',
                '2',
                '1',
                '2',
                '2',
                '1',
                '2',
                '2',
            ],
            'visibility' => [
                '1',
                '1',
                '1',
                '1',
                '1',
                '1',
                '1',
                '1',
            ]
        ];

        $quotationOption = new QuoteOption();
        $quotationOption->user_id = $userId;
        $quotationOption->detail = $detail;
        $quotationOption->save();
        if($quotationOption) return true;
        else return false;
    }

}

if (!function_exists('currency')) {
    function currency($amount = null)
    {
        return '$'.$amount;
    }
}

if (!function_exists('adminRequest')) {
    function adminRequest($userRole)
    {
        if(in_array($userRole, config('constants.builtin_role_id'))) return true;
        else return false;
    }
}
