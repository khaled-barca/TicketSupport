<?php
/**
 * Created by PhpStorm.
 * User: Hossiny
 * Date: 4/2/16
 * Time: 5:10 AM
 */
namespace App\Enums;

abstract class TicketStatus {
    const Opened = 'Opened';
    const Closed = 'Closed';
    const InProgress = 'In Progress';
}