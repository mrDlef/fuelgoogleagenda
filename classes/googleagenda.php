<?php

namespace FuelGoogleAgenda;

class GoogleAgenda
{
	public static function get_event_url($start_date, $end_date = null, $text = null, $details = null, $location = null)
	{
		$url = 'https://www.google.com/calendar/event?action=TEMPLATE';

		$build_date = new \DateTime();
		$build_date->setTimestamp($start_date);
		$dates = $build_date->format(\DateTime::W3C);
		$end_date or $end_date = $start_date;
		$build_date->setTimestamp($end_date);
		$dates = '/'.$build_date->format(\DateTime::W3C);

		$url .= '&dates='.$build_date->format(\DateTime::W3C);

		$text     and $url      .= '&text='.$text;
		$details  and $details  .= '&text='.$details;
		$location and $location .= '&location='.$location;

		return $url;
	}
}
