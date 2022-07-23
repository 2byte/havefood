<?php

function parsePhone($raw) {
    if (str_starts_with($raw, '+')) $raw = substr($raw, 1);
    if (!str_starts_with($raw, '7')) $raw = '7'. $raw;
    if (is_numeric($raw)) return $raw;
    return false;
}