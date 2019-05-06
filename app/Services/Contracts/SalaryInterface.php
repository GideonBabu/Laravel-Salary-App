<?php

namespace App\Services\Contracts;

interface SalaryInterface
{

    /**
     * Calculate salary payment date of a given date/month/year
     *
     * @param $date
     * @return string
     */
    public function getSalaryPaymentDate($date);

    /**
     * Calculate bonus payment date of a given date/month/year
     *
     * @param $date
     * @return string
    */
    public function getBonusPaymentDate($date);

    /**
     * Check if given string is valid date or not
     *
     * @param $date
     * @param $format
     * @return bool
     */
    public function isValidDateFormat($date, $format = 'm.d.Y');

    /**
     * Calculate the difference in months between two dates
     *
     * @param \DateTime $date1
     * @param \DateTime $date2
     * @return int
     */
    public function diffInMonths(\DateTime $date1, \DateTime $date2);

    /**
     * iterate through months and map the dates into array
     * @param $startMonth
     * @param $numMonths
     * @return array
     */
    public function generateDatesData($startMonth, $numMonths);
}
