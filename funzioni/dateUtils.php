<?php
/**=============================================================================
 * PHP 8+ compatible date parsing and formatting functions
 * Handles remote/legacy date data safely
 * ===========================================================================*/

/**
 * Parse date from database (Y-m-d) and format to display (d/m/Y)
 * PHP 8+ compatible - handles remote/legacy date data safely
 */
function parseDbDate($dateStr, $toFormat = 'd/m/Y')
{
    if (empty($dateStr)) {
        return '';
    }
    
    try {
        $date = new DateTime($dateStr);
        return $date->format($toFormat);
    } catch (Exception $e) {
        return '';
    }
}

/**
 * Parse user input date (d/m/Y) and format to database (Y-m-d)
 * PHP 8+ compatible - handles various date formats from user input
 */
function parseInputDate($dateStr, $inputFormat = 'd/m/Y', $toFormat = 'Y-m-d')
{
    if (empty($dateStr)) {
        return '';
    }
    
    try {
        $date = DateTime::createFromFormat($inputFormat, $dateStr);
        if ($date === false) {
            return '';
        }
        return $date->format($toFormat);
    } catch (Exception $e) {
        return '';
    }
}

/**
 * Safe date creation for user-provided dates
 * Attempts to parse with common formats
 */
function createDateFromUserInput($dateStr)
{
    if (empty($dateStr)) {
        return '';
    }
    
    $formats = ['d/m/Y', 'Y-m-d', 'd-m-Y', 'm/d/Y'];
    
    foreach ($formats as $format) {
        try {
            $date = DateTime::createFromFormat($format, $dateStr);
            if ($date !== false) {
                return $date->format('Y-m-d');
            }
        } catch (Exception $e) {
            continue;
        }
    }
    
    return '';
}
?>
