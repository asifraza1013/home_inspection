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

if (!function_exists('createNotificationsDetail')) {
    function createNotificationsDetail($user, $message, $userType, $order) // type: 1: admin/company, 2: agent, 3: owner, 4: superadmin
    {
        $details = [
            'greeting' => ($userType == 1) ? 'Hi '.$order->company->company_name : 'Hi '.$user->name,
            'body' => $message,
            'thanks' => 'Thank you for using our services!',
            'actionText' => 'View Order',
            'actionURL' => route('order.detail', $order->id),
            'order_id' => $order->id,
            'user' => [
                'image' => ($user->profile_photo) ? $user->profile_photo : asset('frontend/assets/images/about/profile 1.png'),
                'name' => $user->name,
                'url' => route('order.detail', $order->id)
            ]
        ];
        return $details;
    }

    if (!function_exists('validationMessages')) {
        function validationMessages($messages)
        {
           foreach ($messages as $key => $message) {
            toast($message,'error');
           }
           return true;
        }
    }
}
