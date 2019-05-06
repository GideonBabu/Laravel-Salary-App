<?php

namespace App\Services;

use App\Services\Contracts\SalaryInterface;
use Log;

class SalaryService implements SalaryInterface
{

    public function getSalaryPaymentDate($date)
    {
        $salaryDate = new \DateTime($date);
        $salaryDate->modify('last day of this month');
        switch ($salaryDate->format('D')) {
            case 'Sat': // if last day is Sat reduce a day by 1
                $salaryDate->modify('-1 day');
                $salaryPaymentDate = $salaryDate->format('d.m.Y');
                break;
            case 'Sun': // if last day is Sun reduce day by 2
                $salaryDate->modify('-2 day');
                $salaryPaymentDate = $salaryDate->format('d.m.Y');
                break;
            default:
                $salaryPaymentDate = $salaryDate->format('d.m.Y'); // no sat/sun then last day is salary date
        }
        return $salaryPaymentDate;
    }

    public function getBonusPaymentDate($date)
    {
        $bonusDate = new \DateTime($date);
        if ($bonusDate->format('D') == 'Sat' || $bonusDate->format('D') == 'Sun') {
            $bonusDate->modify('next Wednesday');
            return $bonusDate->format('d.m.Y'); // if 15th is Sat, increase by 4 days to get next Wed
        }
        return $bonusDate->format('d.m.Y'); // no Sat and Sun, no changes
    }

    public function isValidDateFormat($date, $format = 'm.d.Y')
    {
        $checkDate = \DateTime::createFromFormat($format, $date);
        return $checkDate && $checkDate->format($format) == $date;
    }

    public function diffInMonths(\DateTime $date1, \DateTime $date2)
    {
        $diff =  $date1->diff($date2);
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;
        return (int) round($months);
    }

    public function generateDatesData($startMonth, $numMonths)
    {
        $dates= [];
        $dates[] = ('Month Name,Salary Payment Date,Bonus Payment Date');
        for ($count = 1; $count <= $numMonths; $count++) {
            $monthYear = '01.'.date('m.Y', strtotime($startMonth.' + '.$count.' Months')); // increase the month by 1
            $salaryMonth = date('M', strtotime($monthYear));
            $salaryPaymentDate = $this->getSalaryPaymentDate($monthYear);
            //set default bonus date
            $bonusDate = '15.'.date('m.Y', strtotime($startMonth.' + '.$count.' Months'));
            $bonusPaymentDate = $this->getBonusPaymentDate($bonusDate);
            
            $monthPaymentDates = $salaryMonth . "," . $salaryPaymentDate .",". $bonusPaymentDate;
            $dates[]= $monthPaymentDates;
        }
        return $dates;
    }
}
