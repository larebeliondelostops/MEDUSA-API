<?php

namespace App\Strategies;

interface ReportsInterface
{
    //reportes de eventos
    
    public function EventsForMonth();
    public function EventsForType();
    public function EventsByAuthorizingEntity();
    public function EventsByCapacityRange();
    public function EventsPastAndFuture();
    public function EventsByTypeAndAuthorizingEntity();

    //reportes de criminalidad

    public function MostOccurrencesDateOfTheMonth();
    public function HourMostOccurrencesOfTheMonth();
    public function DayWeekMostOccurrencesOfMonth();
    public function MostFrequentCrime();
    public function CrimeLessFrequent();
    public function MostFrequentCrimeByZone();
}