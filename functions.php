<?php
function formatCurrency($amount) {
    return '$' . number_format($amount, 2);
}

function getStatusBadge($status) {
    $badges = [
        'Pending' => 'badge-pending',
        'Approved' => 'badge-approved',
        'Rejected' => 'badge-rejected',
        'Present' => 'badge-approved',
        'Absent' => 'badge-rejected',
        'Late' => 'badge-pending'
    ];
    
    $class = $badges[$status] ?? 'badge-secondary';
    return '<span class="badge ' . $class . '">' . $status . '</span>';
}

function calculateLeaveDays($start_date, $end_date) {
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    return $start->diff($end)->days + 1;
}
?>